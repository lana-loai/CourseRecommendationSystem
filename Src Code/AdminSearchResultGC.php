<!-- Custom css --> 
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
<link type="text/css" rel="stylesheet" href="css/Style.css" />
<?php    
//Get that student's information
$counselor = mysqli_fetch_array($execute_search_query, MYSQLI_ASSOC);

//Save each attribute into a variable for easier access throughout the code 
$gc_email = $counselor['gc_id']."@yu.edu.jo";
$gc_name = $counselor['gc_name'];
$gc_dept = $counselor['dept_id'];
$gc_plan = substr($gc_id, 2,6);


//Get the name of the student's department from the department table
$get_dept_data = "SELECT * FROM department WHERE dept_id = $gc_dept";
$get_dept_data_query = mysqli_query($conn, $get_dept_data);
$department  = mysqli_fetch_array($get_dept_data_query, MYSQLI_ASSOC);
                                
?>
<div class="featured-section" style="padding:15px;width:100%;border-radius:20px;background-color:white;margin:40px;margin-left:0px;">
    <h4 class="text-dark"> Guidance Counselor</h4> <br/>
    <h6 class="text-dark"> General Information </h6> 
	<table class="table table-sm">
		<tr style="background-color:#2AAA8A;">
		    <th scope="col">Counselor ID </th>
			<th scope="col">Full Name </th>
			<th scope="col">E-mail </th>
			<th scope="col">Plan </th>
			<th scope="col">Department</th>
		</tr>
		<tr>
			<td><?php echo $gc_id; ?></td>
			<td><?php echo $gc_name; ?></td>
			<td><?php echo $gc_email; ?></td>
			<td><?php echo $gc_plan; ?></td>
			<td><?php echo $department['dept_name']; ?></td>
		</tr>
	</table>
    <br/>
</div>