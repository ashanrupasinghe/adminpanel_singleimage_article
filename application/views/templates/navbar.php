<nav class="navbar navbar-default">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed"
				data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
				aria-expanded="false">
				<span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>

		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse"
			id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<?php $currentmethod=$this->uri->segment(2);?>
				<li
					<?php if ($currentmethod=='index'||$currentmethod=='view'): echo 'class="active"';endif;?>><a
					href="<?php echo base_url();?>index.php/users/index">All News<span class="sr-only">(current)</span></a></li>
				<li
					<?php if ($currentmethod=='create'): echo 'class="active"';endif;?>><a
					href="<?php echo base_url();?>index.php/users/create">Add News</a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li><a href="#"><?php echo $this->session->userdata('username');?></a></li>
				<li><a href="logout" style="color: #337ab7;">Logout</a></li>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>