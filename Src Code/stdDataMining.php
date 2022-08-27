<?php 
  function courseSelection($conn, $std_dept, $std_plan, $std_id){
  //first, must clear out the current selection
  $clear_table = "DELETE FROM suggested WHERE std_id = $std_id";
  $execute_clear = mysqli_query($conn, $clear_table);

  //Get the name of the student's department from the department table
  $get_dept_data = "SELECT * FROM department WHERE dept_id = $std_dept";
  $get_dept_data_query = mysqli_query($conn, $get_dept_data);
  $department  = mysqli_fetch_array($get_dept_data_query, MYSQLI_ASSOC);
  
 //Data Mining on student personal past data 
 /*
    Summary:
    Essentially, the core of the system is to suggest a schedule for the student that suits them, this is done using the following attributes :
        1. The courses the student has already taken.
        2. The courses from their plan that have no pre-req, but are of the level appropriate to the student.
        3. The courses that have been recently opened to the student to take, because they have taken the pre-requisite.
        4. The courses that best match the difficulty of the overall selection.
        
        These attributes that do not belong to the student must also be taken into consideration :
        A. Is the course offered by the faculty for this term ?
        B. The courses that are selected must not overlap.
 */

 //First, match courses the student has taken with their plan and get the courses they have NOT taken yet, 
 //and give priority to the courses that appear in the 'pre_req' column, store all these into the suggestd table

 //GET ALL Courses that are (NOT TAKEN + IN THE PLAN + ARE OPENED
 $get_course_options = "SELECT * FROM plan_course WHERE plan_id = $std_plan AND crs_code 
						NOT IN (SELECT crs_code FROM transcript WHERE std_id = $std_id)  
						AND crs_code IN (
							SELECT crs_code FROM plan_course WHERE req_code = 'null' 
							OR req_code IN (
								SELECT crs_code FROM plan_course WHERE crs_code IN (
									SELECT crs_code FROM course_requirements WHERE req_code IN (
										SELECT crs_code FROM transcript WHERE std_id = $std_id
																								)
																					)
											)
										); ";

$get_course_options_query = mysqli_query($conn, $get_course_options);
while ($row = mysqli_fetch_array($get_course_options_query, MYSQLI_ASSOC)){
	$crs_code = $row['crs_code'];

	//Check if course is offered in the faculty schedules
	$check_if_offered = "SELECT * FROM dept_schedule WHERE crs_code = '$crs_code'";
	$check_if_offered_query = mysqli_query($conn, $check_if_offered);
	while ($row2 = mysqli_fetch_array($check_if_offered_query, MYSQLI_ASSOC)){
		$crs_code = $row2['crs_code'];
		$crs_section = $row2['crs_section'];
		$insert_into_suggested = "INSERT INTO suggested(std_id, term_id, `crs_code`, crs_section, wanted_credit, priority , difficulty) 
		VALUES ($std_id, 202102,'$crs_code', $crs_section , 1 , 1 , 1 )";
		$insert_into_suggested_query = mysqli_query($conn, $insert_into_suggested);
	}
}
}

?>