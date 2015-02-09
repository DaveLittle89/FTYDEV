<h1>Manage <?php echo $category->categoryName; ?> Policies</h1>
<a href="/book/index.php/admin/add_policy/<?php echo $category->id; ?>" class="btn btn-default active" role="button">Add Policy</a>
<?php if($category->id == 1){
	// Show Travel Insurance Specific Buttons
	?>
	<a href="/book/index.php/admin/manage_travel_insurance_locations/" class="btn btn-default active" role="button">Manage Locations</a>
	<a href="/book/index.php/admin/travel_insurance_config/" class="btn btn-default active" role="button">Config</a>
	<?php
} ?>


<table class="table">
 <thead>
 	<tr>
 		<th>ID</th>
 		<th>Title</th>
 		<th>Description</th>
 		<th>List Order</th>
 		<th>Edit</th>
 		<th>Delete</th>
 	</tr>
 </thead>
 <?php
 	if(isset($policies)){
 		foreach($policies as $r){
 			?>
 			<tr>
 				<td><a href="/book/index.php/admin/edit_policy/<?php echo $r['id']; ?>"><?php echo $r['id']; ?></a></td>
 				<td><a href="/book/index.php/admin/edit_policy/<?php echo $r['id']; ?>"><?php echo $r['policyTitle']; ?></a></td>
 				<td><?php echo $r['policyDescription']; ?></td>
 				<td><?php echo $r['listOrder']; ?></td>
 				<td><a href="/book/index.php/admin/edit_policy/<?php echo $r['id']; ?>">Edit Settings</a></td>
 				<td><a href="/book/index.php/admin/remove_policy/<?php echo $r['id']; ?>">Delete</a></td>
 			</tr>
 			<?php
 		}
 	}
 ?>
</table>