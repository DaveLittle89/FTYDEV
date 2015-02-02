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
 		<th>Edit</th>
 		<th>Delete</th>
 	</tr>
 </thead>
 <?php
 	if(isset($categories)){
 		foreach($categories as $r){
 			?>
 			<tr>
 				<td><?php echo $r['id']; ?></td>
 				<td><?php echo $r['categoryName']; ?></td>
 				<td><?php echo $r['categoryDescription']; ?></td>
 				<td><?php echo ($r['homePage'] == 1)? 'True' : 'False'; ?></td>
 				<td><?php echo $r['listOrder']; ?></td>
 				<td><a href="/book/index.php/admin/edit_category/<?php echo $r['id']; ?>">Edit</a></td>
 				<td><a href="/book/index.php/admin/remove_category/<?php echo $r['id']; ?>">Delete</a></td>
 			</tr>
 			<?php
 		}
 	}
 ?>
</table>