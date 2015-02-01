<h1>Add Admin</h1>

<?php if(isset($message)){ ?><div id="infoMessage"><?php echo $message;?></div><?php } ?>


<?php echo form_open("admin/add_user/", array('class' => 'form-horizontal'));?>
  <div class="form-group">
    <label for="group" class="col-sm-2 control-label">User Level</label>
    <div class="col-sm-10">
      <?php echo form_dropdown('group', $group_options, $group, 'class="form-control"');?>
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <?php echo form_input($email);?>
    </div>
  </div>
  <div class="form-group">
    <label for="first_name" class="col-sm-2 control-label">First Name</label>
    <div class="col-sm-10">
      <?php echo form_input($first_name);?>
    </div>
  </div>  
    <div class="form-group">
    <label for="last_name" class="col-sm-2 control-label">Last Name</label>
    <div class="col-sm-10">
      <?php echo form_input($last_name);?>
    </div>
  </div>  
    <div class="form-group">
    <label for="phone" class="col-sm-2 control-label">Phone</label>
    <div class="col-sm-10">
      <?php echo form_input($phone);?>
    </div>
  </div>  
  <div class="form-group">
    <label for="company" class="col-sm-2 control-label">Company</label>
    <div class="col-sm-10">
      <?php echo form_input($company);?>
    </div>
  </div>  
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <?php echo form_input($password);?>
    </div>
  </div>  
  <div class="form-group">
    <label for="password_confirm" class="col-sm-2 control-label">Password Confirm</label>
    <div class="col-sm-10">
      <?php echo form_input($password_confirm);?>
    </div>
  </div>   
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    	<?php echo form_submit('submit', 'Save', 'class="btn btn-default"');?>
    </div>
  </div>

<?php echo form_close();?>
