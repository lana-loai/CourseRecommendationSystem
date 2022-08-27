<!-- Custom css --> 
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
<link type="text/css" rel="stylesheet" href="css/Style.css" />
<?php    
//Get that student's information
$student = mysqli_fetch_array($execute_search_query, MYSQLI_ASSOC);

//Save each attribute into a variable for easier access throughout the code 
$std_email = $student['email'];
$std_First = $student['first_name'];
$std_last = $student['last_name'];
$std_gpa = $student['std_gpa'];
if ($student['is_graduate']==1){
    $std_graduate = 'Yes';
} else{
    $std_graduate = 'No';
}
$std_dept = $student['dept_id'];
$std_plan = $student['plan_id'];

//Get the name of the student's department from the department table
$get_dept_data = "SELECT * FROM department WHERE dept_id = $std_dept";
$get_dept_data_query = mysqli_query($conn, $get_dept_data);
$department  = mysqli_fetch_array($get_dept_data_query, MYSQLI_ASSOC);
                                
?>
<div class="featured-section" style="padding:15px;width:100%;border-radius:20px;background-color:white;margin:40px;margin-left:0px;">
    <h4 class="text-dark"> Student : <?php echo $std_id;?> </h4> <br/>
    <h6 class="text-dark"> General Information </h6> 
	<table class="table table-sm">
		<tr style="background-color:#2AAA8A;">
		    <th scope="col">Student First Name </th>
			<th scope="col">Student Last Name </th>
			<th scope="col">Student E-mail </th>
		</tr>
		<tr>
			<td><?php echo $std_First; ?></td>
			<td><?php echo $std_last; ?></td>
			<td><?php echo $std_email; ?></td>
		</tr>
	</table>
    <br/>
    <h6 class="text-dark"> Academics </h6> 
	<table class="table table-sm">
		<tr style="background-color:#2AAA8A;">
		    <th scope="col">Student GPA </th>
			<th scope="col">Expected to Graduate </th>
		</tr>
		<tr>
			<td><?php echo $std_gpa; ?></td>
			<td><?php echo $std_graduate; ?></td>
		</tr>
	</table>
</div>