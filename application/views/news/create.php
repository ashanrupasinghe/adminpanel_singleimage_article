<h2 align="center"><?php echo $title ?></h2>
<?php echo form_open_multipart('users/create')?>
<?php

if ($this->session->flashdata ( 'newsaddmsg' )) :
	echo $this->session->flashdata ( 'newsaddmsg' );



 
endif;
?>
<div class="row">
	<div class="col-sm-3 col-sm-offset-4 form-group">
		<label for="title">Title</label> <input type="text" name="title"
			class="form-control" value="<?php echo set_value('title'); ?>" />
		<div class="errmsg"><?php echo form_error('title'); ?></div>
	</div>
</div>
<div class="row">
	<div class="col-sm-3 col-sm-offset-4 form-group">
		<label for="text">Text</label>
		<textarea name="text" class="form-control"><?php echo set_value('text'); ?></textarea>
		<div class="errmsg"><?php echo form_error('text'); ?></div>

	</div>
</div>

<div class="row">
	<div class="col-sm-3 col-sm-offset-4 form-group">
		<label for="image">File input</label> <input type="file"
			name="userfile" size="20" />
		<p class="help-block">select an image to show on the news page</p>
	</div>
</div>

<div class="row">
	<div class="col-sm-3 col-sm-offset-4 form-group">
		<input type="submit" name="submit" class="btn btn-primary"
			value="Create news item" />
	</div>
</div>

</form>