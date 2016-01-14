<?php //echo validation_errors();?>

<?php echo form_open('users/index');?>
<div style="margin-top: 150px;">
<?php

if ($this->session->flashdata ( 'accsccsessmsg' )) :
	echo $this->session->flashdata ( 'accsccsessmsg' );
 
endif;
?>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<h4 align="center">User Login</h4>
		</div>
	</div>
	<div class="row">

		<div class="col-sm-4 col-sm-offset-4">
			<label for="email">Email</label> <input type="text" name="email"
				class="form-control" value="<?php echo set_value('email'); ?>" />
			<div class="errmsg"><?php echo form_error('email'); ?></div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<label for="pw">Password</label> <input type="password" name="pw"
				class="form-control" />
			<div class="errmsg"><?php echo form_error('pw'); ?></div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<input type="submit" name="submit" class="btn btn-primary"
				value="Login" />
			<button name="button" id="button" class="btn btn-danger" value="true"
				type="reset">Reset</button>
			or <a href="users/createuser" style="color: green; display: inline">crate
				an account</a>
		</div>
	</div>
</div>
</form>
