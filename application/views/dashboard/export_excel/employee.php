
<table>
<thead>
	<tr>
		<th class="header">Id.</th>
		<th class="header">Name</th> 
		<th class="header">Skills</th>
		<th class="header">Address</th>  
		<th class="header">Age</th>
		<th class="header">Designation</th>                 
	</tr>
</thead>
<a class="pull-right btn btn-warning btn-large" style="margin-right:40px" href="<?php echo site_url(); ?>adm/portal/jls_applicant/employee/createexcel"><i class="fa fa-file-excel-o"></i> Export to Excel</a>
<tbody>
	<?php
	if (isset($employeeData) && !empty($employeeData)) {
		foreach ($employeeData as $key => $emp) {
			?>
			<tr>
				<td><?php echo $emp['id']; ?></td>   
				<td><?php echo $emp['name']; ?></td> 
				<td><?php echo $emp['skills']; ?></td>
				<td><?php echo $emp['address']; ?></td> 
				<td><?php echo $emp['age']; ?></td>
				<td><?php echo $emp['designation']; ?></td>                       
			</tr>
			<?php
		}
	} else {
		?>
		<tr>
			<td colspan="5" class="alert alert-danger">No Records founds</td>    
		</tr>
	<?php } ?>			 
</tbody>
</table>   
