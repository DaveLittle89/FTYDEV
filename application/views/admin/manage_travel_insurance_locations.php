<h1>Manage Travel Insurance Locations</h1>
<a href="/book/index.php/admin/add_travel_insurance_location" class="btn btn-default active" role="button">New Location</a> 


<table class="table">
 <thead>
 	<tr>
 		<th>ID</th>
 		<th>Location</th>
 		<th>Single Rate</th>
 		<th>Annual Rate</th>
 		<th>Edit</th>
 		<th>Delete</th>
 	</tr>
 </thead>
 <?php
 	if(isset($travel_insurance_locations)){
 		foreach($travel_insurance_locations as $r){
 			?>
 			<tr>
 				<td><?php echo $r['id']; ?></td>
 				<td><?php echo $r['location']; ?></td>
 				<td><?php echo $r['singleRate']; ?></td>
 				<td><?php echo $r['annualRate']; ?></td>
 				<td><a href="/book/index.php/admin/edit_travel_insurance_location/<?php echo $r['id']; ?>">Edit</a></td>
 				<td><a href="/book/index.php/admin/remove_travel_insurance_location/<?php echo $r['id']; ?>">Delete</a></td>
 			</tr>
 			<?php
 		}
 	}
 ?>
</table>