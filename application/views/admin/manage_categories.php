<h1>Manage Categories</h1>
<a href="/book/index.php/admin/add_category" class="btn btn-default active" role="button">New Category</a> 


<table class="table">
 <thead>
 	<tr>
 		<th>ID</th>
 		<th>Name</th>
 		<th>Description</th>
 		<th>Home Page</th>
 		<th>List Order</th>
 		<th>Number of Policies</th>
 		<th>Add Policy</th>
 		<th>Edit</th>
 		<th>Delete</th>
 	</tr>
 </thead>
 <?php
 	if(isset($categories)){
 		foreach($categories as $r){
 			?>
 			<tr>
 				<td><a href="/book/index.php/admin/manage_policies/<?php echo $r['id']; ?>"><?php echo $r['id']; ?></a></td>
 				<td><a href="/book/index.php/admin/manage_policies/<?php echo $r['id']; ?>"><?php echo $r['categoryName']; ?></a></td>
 				<td><?php echo $r['categoryDescription']; ?></td>
 				<td><?php echo ($r['homePage'] == 1)? 'True' : 'False'; ?></td>
 				<td><?php echo $r['listOrder']; ?></td>
 				<td>[Insert Count]</td>
 				<td><a href="/book/index.php/admin/add_policy/<?php echo $r['id']; ?>">Add New Policy</a></td>
 				<td><a href="/book/index.php/admin/edit_category/<?php echo $r['id']; ?>">Edit Category Details</a></td>
 				<td><a href="/book/index.php/admin/remove_category/<?php echo $r['id']; ?>">Delete</a></td>
 			</tr>
 			<?php
 		}
 	}
 ?>
</table>