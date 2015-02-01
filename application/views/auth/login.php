<h1><?php echo lang('login_heading');?></h1>
<p><?php echo lang('login_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>


<?php echo form_open("auth/login", array('class' => 'form-horizontal'));?>
  <div class="form-group">
    <label for="identity" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <?php echo form_input($identity);?>
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <?php echo form_input($password);?>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?> Remember me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    	<?php echo form_submit('submit', lang('login_submit_btn'), 'class="btn btn-default"');?>
    </div>
  </div>

<?php echo form_close();?>

<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
