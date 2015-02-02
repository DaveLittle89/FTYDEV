<h1>Edit Tax Code</h1>
<?php if(isset($message)){ ?><div id="infoMessage"><?php echo $message;?></div><?php } ?>
<?php echo form_open("admin/edit_tax_code/".$tax_code->id, array('class' => 'form-horizontal'));?>
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
      <?php echo form_input($name);?>
    </div>
  </div>
  <div class="form-group">
    <label for="rate" class="col-sm-2 control-label">Rate</label>
    <div class="col-sm-10">
      <?php echo form_input($rate);?>
    </div>
  </div>  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    	<?php echo form_submit('submit', 'Save', 'class="btn btn-default"');?>
    </div>
  </div>

<?php echo form_close();?>