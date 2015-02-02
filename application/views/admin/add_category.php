<h1>Add Category</h1>
<?php if(isset($message)){ ?><div id="infoMessage"><?php echo $message;?></div><?php } ?>
<?php echo form_open("admin/add_category/", array('class' => 'form-horizontal'));?>
  <div class="form-group">
    <label for="categoryName" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
      <?php echo form_input($categoryName);?>
    </div>
  </div>
  <div class="form-group">
    <label for="categoryDescription" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
      <?php echo form_textarea($categoryDescription);?>
    </div>
  </div>  
  <div class="form-group">
    <label for="homePage" class="col-sm-2 control-label">Home Page</label>
    <div class="col-sm-10">
      <?php echo form_dropdown('homePage', $homePageOptions, $homePage, 'class="form-control"');?>
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