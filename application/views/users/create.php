<?php echo form_open('users/createUser');?>
<div class="row">
	<div class="col-sm-3 col-sm-offset-4">
		<h4 align="center">Create User account</h4>
	</div>
</div>
<div class="row">
	<div class="col-sm-3 col-sm-offset-4 form-group">
		<label for="fname">First Name</label> <input type="text" name="fname"
			class="form-control" value="<?php echo set_value('fname'); ?>" />
		<div class="errmsg"><?php echo form_error('fname'); ?></div>
	</div>
</div>
<div class="row">
	<div class="col-sm-3 col-sm-offset-4 form-group">
		<label for="lname">Last Name</label> <input type="text" name="lname"
			class="form-control" value="<?php echo set_value('lname'); ?>" />
		<div class="errmsg"><?php echo form_error('lname'); ?></div>
	</div>
</div>
<div class="row">
	<div class="col-sm-3 col-sm-offset-4 form-group">
		<label for="email">Email</label> <input type="text" name="email"
			class="form-control" value="<?php echo set_value('email'); ?>" />
		<div class="errmsg"><?php echo form_error('email'); ?></div>
	</div>
</div>
<div class="row">
	<div class="col-sm-3 col-sm-offset-4 form-group">
		<label for="pw">Password</label> <input type="password" name="pw"
			class="form-control" />
		<div class="errmsg"><?php echo form_error('pw'); ?></div>
	</div>
</div>
<div class="row">
	<div class="col-sm-3 col-sm-offset-4 form-group">
		<label for="cpw">Confirm Password</label> <input type="password"
			name="cpw" class="form-control" />
		<div class="errmsg"><?php echo form_error('cpw'); ?></div>
	</div>
</div>
<div class="row">
	<div class="col-sm-3 col-sm-offset-4">
		<input type="submit" name="submit" class="btn btn-primary"
			value="Submit" />
		<button name="button" id="button" class="btn btn-danger" value="true"
			type="reset">Reset</button>
		or <a href="<?php echo base_url();?>index.php/users"
			style="color: green; display: inline">back to login</a>
	</div>
</div>
</form>