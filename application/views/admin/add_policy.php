<h1>Add New Policy To <?php echo $category->categoryName ?></h1>
<?php if(isset($message)){ ?><div id="infoMessage"><?php echo $message;?></div><?php } ?>
<?php echo form_open("admin/add_policy/".$category->id, array('class' => 'form-horizontal'));?>
  <div class="form-group">
    <label for="agentID" class="col-sm-2 control-label">AgentID</label>
    <div class="col-sm-10">
      <?php echo form_input($agentID);?>
    </div>
  </div>
  <div class="form-group">
    <label for="agentRef" class="col-sm-2 control-label">AgentRef</label>
    <div class="col-sm-10">
      <?php echo form_input($agentRef);?>
    </div>
  </div>
  <div class="form-group">
    <label for="pType" class="col-sm-2 control-label">pType</label>
    <div class="col-sm-10">
      <?php echo form_input($pType);?>
    </div>
  </div>
  <div class="form-group">
    <label for="policyType" class="col-sm-2 control-label">Policy Type</label>
    <div class="col-sm-10">
      <?php echo form_input($policyType);?>
    </div>
  </div>
  <div class="form-group">
    <label for="policyTitle" class="col-sm-2 control-label">Policy Title</label>
    <div class="col-sm-10">
      <?php echo form_input($policyTitle);?>
    </div>
  </div>
  <div class="form-group">
    <label for="policyDescription" class="col-sm-2 control-label">Policy Description</label>
    <div class="col-sm-10">
      <?php echo form_textarea($policyDescription);?>
    </div>
  </div>  
  <div class="form-group">
    <label for="underwriterID" class="col-sm-2 control-label">Underwriter</label>
    <div class="col-sm-10">
      <?php echo form_dropdown('underwriterID', $underwriterOptions, $underwriterID, 'class="form-control"');?>
    </div>
  </div>  
  <div class="form-group">
    <label for="dayNum" class="col-sm-2 control-label">Number of Days</label>
    <div class="col-sm-10">
      <?php echo form_dropdown('dayNum', $dayNumOptions, $dayNum, 'class="form-control"');?>
    </div>
  </div>    
  <div class="form-group">
    <label for="annual" class="col-sm-2 control-label">Annual</label>
    <div class="col-sm-10">
      <?php echo form_dropdown('annual', $annualOptions, $annual, 'class="form-control"');?>
    </div>
  </div>    
  <div class="form-group">
    <label for="renewable" class="col-sm-2 control-label">Renewable</label>
    <div class="col-sm-10">
      <?php echo form_dropdown('renewable', $renewableOptions, $renewable, 'class="form-control"');?>
    </div>
  </div>    
  <div class="form-group">
    <label for="listOrder" class="col-sm-2 control-label">List Order</label>
    <div class="col-sm-10">
      <?php echo form_input($listOrder);?>
    </div>
  </div>

  	<h2>Add On Options</h2>
  	<p>Leave blank to not add</p>
  	<div id="entry1" class="clonedInput">
  		<p class="bg-primary" style="padding: 10px">Add On 1</p>
  		<div class="form-group">
    		<label for="addOnName" class="col-sm-2 control-label label_nam">Add On Title</label>
    		<div class="col-sm-10">
    			<?php echo form_input($addOnName);?> 
    		</div>
  		</div>
		<div class="form-group">
		    <label for="addOnDescription" class="col-sm-2 control-label label_desc">Add On Description</label>
		    <div class="col-sm-10">
		      <?php echo form_textarea($addOnDescription); ?>   
		    </div>
		</div>  		
		<div class="form-group">
    		<label for="discountID" class="col-sm-2 control-label label_disc">Add On Multiplier</label>
    		<div class="col-sm-10">
    			<?php echo form_dropdown('discountID[0]', $discountOptions, '2', 'class="form-control select_disc" id="discountID"');?>
			</div>
  		</div>  		  		
  	  	<div class="form-group">
    		<label for="discountParam" class="col-sm-2 control-label label_par">Add On Value</label>
    			<div class="col-sm-10">
    				<?php echo form_input($discountParam);?> 
    			</div>    	
   	  	</div>	
  	</div><!-- End Entry -->
  	<div class="form-group">
    	<div class="col-sm-offset-2 col-sm-10">
  			<div id="add-Remove-buttons">
        	<p>
        		<button type="button" id="btnAdd" name="btnAdd" class="btn btn-info">Add New</button>
          		<button type="button" id="btnDel" name="btnDel" class="btn btn-danger">Remove Last</button>
        	</p>
  		</div>
  	</div>	

  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    	<?php echo form_submit('submit', 'Save', 'class="btn btn-default"');?>
    </div>
  </div>

<?php echo form_close();?>