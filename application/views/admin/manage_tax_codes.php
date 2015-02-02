<h1>Manage Tax Codes</h1>
<a href="/book/index.php/admin/add_tax_code" class="btn btn-default active" role="button">New Tax Code</a> 


<table class="table">
 <thead>
 	<tr>
 		<th>ID</th>
 		<th>Name</th>
 		<th>Rate</th>
 		<th>Edit</th>
 		<th>Delete</th>
 	</tr>
 </thead>
 <?php
 	if(isset($tax_codes)){
 		foreach($tax_codes as $r){
 			?>
 			<tr>
 				<td><?php echo $r['id']; ?></td>
 				<td><?php echo $r['name']; ?></td>
 				<td><?php echo $r['rate']; ?></td>
 				<td><a href="/book/index.php/admin/edit_tax_code/<?php echo $r['id']; ?>">Edit</a></td>
 				<td><a href="/book/index.php/admin/remove_tax_code/<?php echo $r['id']; ?>">Delete</a></td>
 			</tr>
 			<?php
 		}
 	}
 ?>
</table>