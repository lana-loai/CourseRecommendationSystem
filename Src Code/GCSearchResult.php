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
<div class="featured-section" style="padding:15px;width:100%;border-radius:20px;background-color:rgba(92, 92, 92, 0.5);margin:40px;margin-left:0px;">
    <h4 class="text-white"> Student : <?php echo $std_id;?> </h4> <br/>
    <h6 class="text-white"> General Information </h6> 
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
    <h6 class="text-white"> Academics </h6> 
	<table class="table table-sm">
		<tr style="background-color:#2AAA8A;">
		    <th scope="col">Student GPA </th>
			<th scope="col">Expected to Graduate </th>
			<th scope="col">Current Year </th>
		</tr>
		<tr>
			<td><?php echo $std_gpa; ?></td>
			<td><?php echo $std_graduate; ?></td>
			<td><?php echo $std_email; ?></td>
		</tr>
	</table>

    <h4 class="text-white"> Course Suggestions :</h4>
	<?php
		//select all sections that are in suggested
		$get_dept_sections = "SELECT * FROM dept_schedule WHERE crs_code IN (SELECT crs_code FROM suggested)";
		$get_dept_sections_query = mysqli_query($conn, $get_dept_sections);
	?>
	<table class="table table-sm">
		<tr style="background-color:#2AAA8A;">
			<th scope="col">Course Code</th>
			<th scope="col">Course Name</th>
			<th scope="col">Course Section</th>
			<th scope="col">Day</th>
			<th scope="col">Time</th>
		    <th scope="col">Course Credit</th>
		</tr>
	<?php
		//Display each section in the suggested table BUT...
		while ($row2 =mysqli_fetch_array($get_dept_sections_query, MYSQLI_ASSOC)){
			//set the section information for easier access into variables
			$crs_code = $row2['crs_code'];
			$crs_section = $row2['crs_section'];
			$crs_time = $row2['crs_time'];
									
			//format the day 
			$crs_day = $row2['crs_day'];
			if ($crs_day = 123){
				$crs_day = "Sunday - Tuesday - Thursday";
			}
			if ($crs_day = 24){
				$crs_day = 'Monday - Wednesday';
			}
								
            //we need to get the information for that course from the course table both to display here and for the suggested schedule
			$get_crs_info = "SELECT * FROM course WHERE crs_code = '$crs_code'";
			$get_crs_info_query = mysqli_query($conn, $get_crs_info);
			$crs_row = mysqli_fetch_array($get_crs_info_query, MYSQLI_ASSOC);
			$crs_name = $crs_row['crs_name'];
			$crs_credit = $crs_row['crs_credit'];
			$crs_tag = $crs_row['crs_tag'];
			$crs_dif = $crs_row['crs_difficulty'];
			$crs_level = $crs_row['crs_level'];

	?>

	    <tr>
			<td scope="col"><?php echo $crs_code; ?></td>
			<td><?php echo $crs_name; ?></td>
			<td><?php echo $crs_section; ?></td>
			<td><?php echo $crs_day; ?></td>
			<td><?php echo $crs_time; ?></td>
			<td><?php echo $crs_credit; ?></td>
		</tr>
	<?php } ?>
	</table><br/>
</div>