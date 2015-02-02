<h1>Edit Agent</h1>

<?php if(isset($message)){ ?><div id="infoMessage"><?php echo $message;?></div><?php } ?>


<?php echo form_open("admin/edit_agent/".$user->id, array('class' => 'form-horizontal'));?>
  <div class="form-group">
    <label for="identity" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <?php echo form_input($identity);?>
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
    <label for="website" class="col-sm-2 control-label">Website</label>
    <div class="col-sm-10">
      <?php echo form_input($website);?>
    </div>
  </div> 
   <div class="form-group">
    <label for="address1" class="col-sm-2 control-label">Address1</label>
    <div class="col-sm-10">
      <?php echo form_input($address1);?>
    </div>
  </div>  
    <div class="form-group">
    <label for="address2" class="col-sm-2 control-label">Address2</label>
    <div class="col-sm-10">
      <?php echo form_input($address2);?>
    </div>
  </div>  
    <div class="form-group">
    <label for="city" class="col-sm-2 control-label">City</label>
    <div class="col-sm-10">
      <?php echo form_input($city);?>
    </div>
  </div>  
  <div class="form-group">
    <label for="county" class="col-sm-2 control-label">County</label>
    <div class="col-sm-10">
      <?php echo form_input($county);?>
    </div>
  </div>  
  <div class="form-group">
    <label for="postcode" class="col-sm-2 control-label">Postcode</label>
    <div class="col-sm-10">
      <?php echo form_input($postcode);?>
    </div>
  </div>  
  <div class="form-group">
    <label for="country" class="col-sm-2 control-label">Country</label>
    <div class="col-sm-10">
      <?php echo country_dropdown('country', 'country', 'form-control', $country, array('GB', 'IR', 'FR', 'DE', 'IT'), ''); ?>
  	</div>  
  </div>
  <div class="form-group">
    <label for="notes" class="col-sm-2 control-label">Notes</label>
    <div class="col-sm-10">
      <?php echo form_textarea($notes);?>
    </div>
  </div>  
  <div class="form-group">
    <label for="cookie_length" class="col-sm-2 control-label">Cookie Length</label>
    <div class="col-sm-10">
      <?php echo form_input($cookie_length);?>
    </div>
  </div>  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    	<?php echo form_submit('submit', 'Save', 'class="btn btn-default"');?>
    </div>
  </div>
<?php echo form_close();?>
