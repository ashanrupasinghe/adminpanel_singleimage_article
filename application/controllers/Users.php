<?php
class Users extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'users_model' );
		$this->load->model ( 'news_model' );
		$this->load->helper ( 'url' );
		$this->load->library ( 'session' );
		$this->load->helper ( array (
				'form',
				'url' 
		) );
	}
	// create new user
	public function createUser() {
		$this->load->helper ( 'form' );
		$this->load->library ( 'form_validation' );
		$data ['title'] = 'Create a User';
		$this->form_validation->set_rules ( 'fname', 'Fname', 'required' );
		$this->form_validation->set_rules ( 'lname', 'Lname', 'required' );
		$this->form_validation->set_rules ( 'email', 'Email', 'required' );
		$this->form_validation->set_rules ( 'pw', 'PassWord', 'required|matches[cpw]' );
		$this->form_validation->set_rules ( 'cpw', 'ConfirmPassWord', 'required' );
		
		if ($this->form_validation->run () === FALSE) {
			$this->load->view ( 'templates/header', $data );
			$this->load->view ( 'users/create', $data );
			$this->load->view ( 'templates/footer' );
		} else {
			// $this->load->view ( 'templates/header' );
			$userdata = $this->users_model->addUser ();
			$msg = '<div class="alert alert-success" style="text-align:center;"><strong>congratulation!</strong> Your account has been created, you can login now.</div>';
			$this->session->set_flashdata ( 'accsccsessmsg', $msg );
			
			redirect ( '/users' );
			// $this->load->view ( 'users',$data );
			// $this->load->view ( 'templates/footer' );
		}
	}
	// check username
	public function checkUser() {
		$usercheck = $this->users_model->checkUser ();
		return $usercheck;
		// $usercheck['user']
	}
	// check password
	public function checkPw() {
		$pwCheck = $this->users_model->checkPw ();
		return $pwCheck;
	}
	// check user name password whether match or not
	public function login() {
		$username = $this->checkUser ();
		
		if ($username ['user']) {
			$pw = $this->checkPw ();
			$userdata = array (
					'pw' => $pw,
					'user' => $username ['username'] 
			);
			return $userdata; // return one, if user name and pw match
		} else {
			return false;
		}
	}
	public function confirmPw() {
	}
	// user lodin section
	public function index() {
		// /$islogin = $_SESSION ['logged_in'];
		if (! isset ( $_SESSION ['logged_in'] )) {
			$this->load->helper ( 'form' );
			$this->load->library ( 'form_validation' );
			$data ['title'] = 'User Login';
			$this->form_validation->set_rules ( 'email', 'Email', 'required' );
			$this->form_validation->set_rules ( 'pw', 'PassWord', 'required' );
			
			if ($this->form_validation->run () === FALSE) {
				$this->load->view ( 'templates/header' );
				$this->load->view ( 'users/login', $data );
				$this->load->view ( 'templates/footer' );
			} else {
				// call db functions
				
				$login = $this->login (); // 0 fore invalid data one for valid data.
				if ($login ['pw']) {
					$username = $login ['user'];
					$newdata = array (
							'username' => $username,
							'logged_in' => TRUE 
					);
					
					$this->session->set_userdata ( $newdata );
					// $this->load->view ( 'templates/header' );
					// $this->load->view ( 'users/userarea', $data );
					$this->loadnews ();
				} else {
					$msg = '<div class="alert alert-danger" style="text-align:center;"><strong>Oops!</strong> Username or Password invalid.</div>';
					$this->session->set_flashdata ( 'accsccsessmsg', $msg );
					redirect ( '/users' );
				}
			}
		} else {
			// $this->load->view ( 'templates/header' );
			// $this->load->view ( 'users/userarea' );
			$this->loadnews ();
		}
	}
	// user logout function
	function logout() {
		$islogin = $_SESSION ['logged_in'];
		if ($islogin) {
			$this->session->sess_destroy ();
			redirect ( '/users' );
		} else {
			redirect ( '/users' );
		}
	}
	// load all news items
	public function loadnews() {
		$data ['news'] = $this->news_model->get_news ();
		$data ['title'] = 'News archive';
		
		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'templates/navbar' );
		$this->load->view ( 'news/index', $data );
		$this->load->view ( 'templates/footer' );
	}
	// view single news item
	public function view($slug = NULL) {
		$data ['news_item'] = $this->news_model->get_news ( $slug );
		
		if (empty ( $data ['news_item'] )) {
			show_404 ();
		}
		
		$data ['title'] = $data ['news_item'] ['title'];
		
		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'templates/navbar' );
		$this->load->view ( 'news/view', $data );
		$this->load->view ( 'templates/footer' );
	}
	// create one news item
	public function create() {
		$this->load->helper ( 'form' );
		$this->load->library ( 'form_validation' );
		
		$data ['title'] = 'Create a news item';
		
		$this->form_validation->set_rules ( 'title', 'Title', 'required' );
		$this->form_validation->set_rules ( 'text', 'text', 'required' );
		
		if ($this->form_validation->run () === FALSE) {
			$this->load->view ( 'templates/header', $data );
			$this->load->view ( 'templates/navbar' );
			$this->load->view ( 'news/create' );
			$this->load->view ( 'templates/footer' );
		} else {
			
			$this->do_uploading();
			$upfilename=$this->upload->data('file_name');		
			$this->news_model->set_news ($upfilename);
			$msg = '<div class="alert alert-success" style="text-align:center;"><strong>Yes!</strong> Your new has been added.</div>';
			$this->session->set_flashdata ( 'newsaddmsg', $msg );
			$url = base_url () . 'index.php/users/create';
			redirect ( $url );
			
			// $this->load->view ( 'news/success' );//redirect to same page
		}
	}
	// delete a news item
	function delete($id) {
		$dell = $this->news_model->delete ( $id );
		$url = base_url () . 'index.php/users/index';
		redirect ( $url );
	}
//upload the image	
	public function do_uploading() {
		$config ['upload_path'] = './uploads/';
		$config ['allowed_types'] = 'gif|jpg|png';
		$config ['max_size'] = 100;
		$config ['max_width'] = 1024;
		$config ['max_height'] = 768;
		$config['encrypt_name'] = TRUE;
		
		$this->load->library ( 'upload', $config );
		$this->upload->do_upload ();
	}
	
	
	
//pagination function
public function pagination($total=200,$perpage=10){
	$this->load->library('pagination');
	$url=base_url();
	$config['base_url'] = $url.'index.php/users/pagination/';
	$config['total_rows'] = $total;
	$config['per_page'] = $perpage;
	
	$this->pagination->initialize($config);
	
	echo $this->pagination->create_links();
}	
	
	
}

?>
