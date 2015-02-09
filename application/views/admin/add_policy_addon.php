<h1>Add New Add On to <?php echo $policy->policyTitle ?></h1>
<?php if(isset($message)){ ?><div id="infoMessage"><?php echo $message;?></div><?php } ?>
<?php echo form_open("admin/add_policy_addon/".$policy->id, array('class' => 'form-horizontal'));?>
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
		<?php echo form_dropdown('discountID', $discountOptions, '2', 'class="form-control select_disc" id="discountID"');?>
	</div>
</div>  		  		
<div class="form-group">
	<label for="discountParam" class="col-sm-2 control-label label_par">Add On Value</label>
		<div class="col-sm-10">
			<?php echo form_input($discountParam);?> 
		</div>    	
</div>	
<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
		<?php echo form_submit('submit', 'Save', 'class="btn btn-default"');?>
	</div>
</div>

<?php echo form_close();?>