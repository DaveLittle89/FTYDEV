<h1>Edit Travel Insurance Location</h1>
<?php if(isset($message)){ ?><div id="infoMessage"><?php echo $message;?></div><?php } ?>
<?php echo form_open("admin/edit_travel_insurance_location/".$travel_insurance_location->id, array('class' => 'form-horizontal'));?>
  <div class="form-group">
    <label for="location" class="col-sm-2 control-label">Location</label>
    <div class="col-sm-10">
      <?php echo form_input($location);?>
    </div>
  </div>
  <div class="form-group">
    <label for="singleRate" class="col-sm-2 control-label">Single Trip Rate</label>
    <div class="col-sm-10">
      <?php echo form_input($singleRate);?>
    </div>
  </div>  
  <div class="form-group">
    <label for="annualRate" class="col-sm-2 control-label">Annual Trip Rate</label>
    <div class="col-sm-10">
      <?php echo form_input($annualRate);?>
    </div>
  </div>   
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    	<?php echo form_submit('submit', 'Save', 'class="btn btn-default"');?>
    </div>
  </div>

<?php echo form_close();?>