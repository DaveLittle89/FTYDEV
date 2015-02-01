<h1>Manage Users</h1>
<a href="/book/index.php/admin/add_user" class="btn btn-default active" role="button">New Admin</a> 
<a href="/book/index.php/admin/add_agent" class="btn btn-default active" role="button">New Agent</a>
<h3>Admins</h3>
<table class="table">
 <thead>
 	<tr>
 		<th>ID</th>
 		<th>First Name</th>
 		<th>Last Name</th>
 		<th>Email</th>
 		<th>Edit</th>
 		<th>Delete</th>
 	</tr>
 </thead>
 <?php
 	if(isset($admins)){
 		foreach($admins as $r){
 			?>
 			<tr>
 				<td><?php echo $r['id']; ?></td>
 				<td><?php echo $r['first_name']; ?></td>
 				<td><?php echo $r['last_name']; ?></td>
 				<td><?php echo $r['email']; ?></td>
 				<td><a href="/book/index.php/admin/edit_user/<?php echo $r['id']; ?>">edit</a></td>
 				<td><a href="/book/index.php/admin/delete_user/<?php echo $r['id']; ?>">edit</a></td>
 			</tr>
 			<?php
 		}
 	}
 ?>
</table>
<h3>Managers</h3>
<table class="table">
 <thead>
 	<tr>
 		<th>ID</th>
 		<th>First Name</th>
 		<th>Last Name</th>
 		<th>Email</th>
 		<th>Edit</th>
 		<th>Delete</th>
 	</tr>
 </thead>
 <?php
 	if(isset($managers)){
 		foreach($managers as $r){
 			?>
 			<tr>
 				<td><?php echo $r['id']; ?></td>
 				<td><?php echo $r['first_name']; ?></td>
 				<td><?php echo $r['last_name']; ?></td>
 				<td><?php echo $r['email']; ?></td>
 				<td><a href="/book/index.php/admin/edit_user/<?php echo $r['id']; ?>">edit</a></td>
 				<td><a href="/book/index.php/admin/delete_user/<?php echo $r['id']; ?>">edit</a></td>
 			</tr>
 			<?php
 		}
 	}
 ?>
</table>
<h3>Agents</h3>
<table class="table">
 <thead>
 	<tr>
 		<th>ID</th>
 		<th>First Name</th>
 		<th>Last Name</th>
 		<th>Email</th>
 		<th>Edit</th>
 		<th>Delete</th>
 	</tr>
 </thead>
 <?php
 	if(isset($agents)){
 		foreach($agents as $r){
 			?>
 			<tr>
 				<td><?php echo $r['id']; ?></td>
 				<td><?php echo $r['first_name']; ?></td>
 				<td><?php echo $r['last_name']; ?></td>
 				<td><?php echo $r['email']; ?></td>
 				<td><a href="/book/index.php/admin/edit_user/<?php echo $r['id']; ?>">edit</a></td>
 				<td><a href="/book/index.php/admin/delete_user/<?php echo $r['id']; ?>">edit</a></td>
 			</tr>
 			<?php
 		}
 	}
 ?>
</table>

