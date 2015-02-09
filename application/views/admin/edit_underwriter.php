<h1>Edit Underwriter</h1>
<?php if(isset($message)){ ?><div id="infoMessage"><?php echo $message;?></div><?php } ?>
<?php echo form_open("admin/add_underwriter/".$underwriter->id, array('class' => 'form-horizontal'));?>
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
      <?php echo form_input($name);?>
    </div>
  </div>
  <div class="form-group">
    <label for="description" class="col-sm-2 control-label">Description/Notes</label>
    <div class="col-sm-10">
      <?php echo form_textarea($description);?>
    </div>
  </div>  
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    	<?php echo form_submit('submit', 'Save', 'class="btn btn-default"');?>
    </div>
  </div>

<?php echo form_close();?>