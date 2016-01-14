<?php
class Users_model extends CI_Model {
	public function __construct() {
		$this->load->database ();
	}
	public function addUser() {
		$pwmd5 = $this->input->post ( 'pw' );
		// $cpw=$this->input->post('cpw');
		$pwmd5 = md5 ( $pwmd5 );
		
		$data = array (
				'fname' => $this->input->post ( 'fname' ),
				'lname' => $this->input->post ( 'lname' ),
				'email' => $this->input->post ( 'email' ),
				'pw' => $pwmd5 
		);
		
		return $this->db->insert ( 'user', $data );
	}
	public function checkUser() {
		$email = $this->input->post ( 'email' );
		$query = $this->db->get_where ( 'user', array (
				'email' => $email 
		) );
		$availablity = $query->conn_id->affected_rows;
		$uservalid;
		if ($availablity == 1) {
			$uservalid = true;
		} else {
			$uservalid = false;
		}
		
		$checking = array (
				'user' => $uservalid,
				'username' => $email 
		);
		return $checking;
	}
	public function checkPw() {
		$email = $this->input->post ( 'email' );
		$userPassword = $this->input->post ( 'pw' );
		$userPassword = md5 ( $userPassword );
		
		$this->db->select ( 'pw' );
		$this->db->from ( 'user' );
		$this->db->where ( 'email', $email );
		$query = $this->db->get ();
		// $query = $this->db->get('user');
		$dbpw = $query->result ();
		$dbpw = $dbpw [0]->pw;
		// $data['login']=false;
		
		if ($userPassword === $dbpw) {
			// $data['login']=true;
			
			return true;
		} else {
			
			return false;
		}
	}
}

?>