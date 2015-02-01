<h1>Edit User</h1>

<?php if(isset($message)){ ?><div id="infoMessage"><?php echo $message;?></div><?php } ?>


<?php echo form_open("admin/edit_user/".$user->id, array('class' => 'form-horizontal'));?>
  <div class="form-group">
    <label for="identity" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <?php echo form_input($identity);?>
    </div>
  </div>
  <div class="form-group">
    <label for="identity" class="col-sm-2 control-label">First Name</label>
    <div class="col-sm-10">
      <?php echo form_input($first_name);?>
    </div>
  </div>  
    <div class="form-group">
    <label for="identity" class="col-sm-2 control-label">Last Name</label>
    <div class="col-sm-10">
      <?php echo form_input($last_name);?>
    </div>
  </div>  
    <div class="form-group">
    <label for="identity" class="col-sm-2 control-label">Phone</label>
    <div class="col-sm-10">
      <?php echo form_input($phone);?>
    </div>
  </div>  
  <div class="form-group">
    <label for="identity" class="col-sm-2 control-label">Company</label>
    <div class="col-sm-10">
      <?php echo form_input($company);?>
    </div>
  </div>  

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    	<?php echo form_submit('submit', 'Save', 'class="btn btn-default"');?>
    </div>
  </div>

<?php echo form_close();?>
