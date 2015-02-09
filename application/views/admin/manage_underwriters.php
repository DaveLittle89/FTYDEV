<h1>Manage Underwriters</h1>
<a href="/book/index.php/admin/add_underwriter" class="btn btn-default active" role="button">New Underwriter</a> 


<table class="table">
 <thead>
 	<tr>
 		<th>ID</th>
 		<th>Name</th>
 		<th>Description</th>
 		<th>Edit</th>
 		<th>Delete</th>
 	</tr>
 </thead>
 <?php
 	if(isset($underwriters)){
 		foreach($underwriters as $r){
 			?>
 			<tr>
 				<td><?php echo $r['id']; ?></td>
 				<td><?php echo $r['name']; ?></td>
 				<td><?php echo $r['description']; ?></td>
 				<td><a href="/book/index.php/admin/edit_underwriter/<?php echo $r['id']; ?>">Edit</a></td>
 				<td><a href="/book/index.php/admin/remove_underwriter/<?php echo $r['id']; ?>">Delete</a></td>
 			</tr>
 			<?php
 		}
 	}
 ?>
</table>