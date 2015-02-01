<h1><?php echo lang('change_password_heading');?></h1>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("admin/change_password", array('class' => 'form-horizontal'));?>

  <div class="form-group">
  	<label for="old_password" class="col-sm-2 control-label">Old Password</label>
    <div class="col-sm-10">
      <?php echo form_input($old_password);?>
    </div>
  </div>
  
  <div class="form-group">
   <label for="new_password" class="col-sm-2 control-label">New Password</label>
    <div class="col-sm-10">
      <?php echo form_input($new_password);?>
    </div>
  </div>
  
  <div class="form-group">
    <label for="new_password_confirm" class="col-sm-2 control-label">Confirm Password</label>
    <div class="col-sm-10">
      <?php echo form_input($new_password_confirm);?>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <p><?php echo form_submit('submit', lang('change_password_submit_btn'), 'class="btn btn-default"');?></p>
	</div>
   </div>

<?php echo form_close();?>
