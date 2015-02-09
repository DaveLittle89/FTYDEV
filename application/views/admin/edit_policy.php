<h1>Edit<?php echo $category->categoryName ?> Policy</h1>
<?php if(isset($message)){ ?><div id="infoMessage"><?php echo $message;?></div><?php } ?>
<?php echo form_open("admin/edit_policy/".$policy->id, array('class' => 'form-horizontal'));?>
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
    <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    	<?php echo form_submit('submit', 'Save', 'class="btn btn-default"');?>
    </div>
  </div>

<?php echo form_close();?>
  <h2>Add Ons</h2>
  <a href="/book/index.php/admin/add_policy_addon/<?php echo $policy->id; ?>" class="btn btn-default active" role="button">Add New</a>
  <?php if($addOns){
  	?>
  	
  	<table class="table">
	 <thead>
	 	<tr>
	 		<th>ID</th>
	 		<th>Name</th>
	 		<th>Description</th>
	 		<th>Type</th>
	 		<th>Amount</th>
	 		<th>Edit</th>
	 		<th>Delete</th>
	 	</tr>
	 </thead>
	 <?php foreach($addOns as $r){ ?>
  	<tbody>
	  	<tr>
	  		<td><?php echo $r['id']; ?></td>
	  		<td><?php echo $r['addOnName']; ?></td>
	  		<td><?php echo $r['addOnDescription']; ?></td>
	  		<td><?php echo $r['type']; ?></td>
	  		<td><?php echo $r['discountParam']; ?></td>
	  		<td><a href="/book/index.php/admin/edit_policy_addon/<?php echo $r['id']; ?>">Edit</a></td>
 			<td><a href="/book/index.php/admin/remove_policy_addon/<?php echo $r['id']; ?>">Delete</a></td>
	  	</tr>
  	</tbody>
  	<?php
  	}
  	?>
  	<?php
  }
  ?>
  
