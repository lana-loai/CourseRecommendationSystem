<!DOCTYPE html>
<?php 
  // Connect to database
  $host = 'localhost';
  $username  = 'root';
  $password = '';
  $db = 'recommend'; // database

  //start the connection:
  $conn = mysqli_connect($host,$username,$password,$db);

  //Start the session using the user_id 
  session_start();
  $std_id = $_SESSION['user'];

  //First fetch all the current user data
  //here we fetch all columns from student table and limit the fetched rows to only 1 row
  $get_user_data = "SELECT * FROM student WHERE std_id = $std_id"; 

  //Execute the query and save the result in a variable
  $get_data_query = mysqli_query($conn, $get_user_data);

  //The result of the executed query above is not in the form of an array, so we must deal with that using a function
  //This function fetches the data as an asscociative array
  $student = mysqli_fetch_array($get_data_query, MYSQLI_ASSOC);

  //Save each attribute into a variable for easier access throughout the code 
  $std_email = $student['email'];
  $std_password = $student['std_password'];
  $std_First = $student['first_name'];
  $std_last = $student['last_name'];
  $std_gpa = $student['std_gpa'];
  $std_graduate = $student['is_graduate'];
  $std_dept = $student['dept_id'];
  $std_plan = $student['plan_id'];

  //Get the name of the student's department from the department table
  $get_dept_data = "SELECT * FROM department WHERE dept_id = $std_dept";
  $get_dept_data_query = mysqli_query($conn, $get_dept_data);
  $department  = mysqli_fetch_array($get_dept_data_query, MYSQLI_ASSOC);
  

?>

<!-- Student Profile -->
<html lang=en>
	<head>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equive="X-UA-Compatible" content="ie=edge">
  		<title> Degree Advisor </title>


		<!-- Bootstrap -->
	  	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

		<!-- Bootstrap js -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	    <!-- Nucleo Icons -->
	    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
	    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />

		<!-- Custom css --> 
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
		<link type="text/css" rel="stylesheet" href="css/Style.css" />
		

		<!-- custom js -->
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<style>
			header{height:200px;} 
			h6{
				font-size: 30px;
			}

			li{
				color:white;
			}

			table {
				border-collapse: collapse;
				border-radius: 15px;
				margin-top:10px;border-style: hidden;
			}

			table td, table th {
				color:white;
				border: 1px solid white;
			}

			table tr{
				background-color:rgba(234, 221, 202, 0.30);
			}

		</style>
	</head>
	

	<body>
	<!------------------------------------------------->
		<!-- Header -->
		<header class="d-inline">
			<!-- Header Background Image -->
			<div class="bg-img"> </div>
			<!-- /Header Background Image -->
	    
	    	<!-- Nav Bar --><?php
	    		include 'components\private-nav-std.php';?>
				<!-- /Nav Bar -->

		</header>
	  	<!-- /Header -->

	<!------------------------------------------------->
	    <!-- Content -->
	    <main class="d-inline" >
	    	<div class="profile-content">
		        <!-- Column -->
		        <div class="card2"> 
				<br/> <br/>
		            <div class="card-body2 little-profile2" style="background-color:#2AAA8A;height:130px;">
		                <div class="pro-img2" style="float: left;"> 
		                	<img src="images/profile_icon1.jfif" alt="user">
		                </div>
		                    <h3 class="m-b-0" style="font-size:20px;"><?php echo "Student : ".$std_id; ?></h3>
							<p style="font-size:13px;"> Department of <?php echo $department['dept_name_full']; ?> <br/>
			                Faculty of Computer Science & Information Technology.</p>
		            </div>
		        </div>
			</div>

		<!-- Section Two -->
		<div class="index-content d-flex align-items-stretch" style="padding:15px;background-color:rgba(92, 92, 92, 0.7);">
			<!-- Sidebar -->
				<?php include 'components\sidebar-student.php'; ?>
			<!-- /Sidebar -->
			<div class="featured-section" style="width:100%;border-radius:20px;background-color:rgb(234, 221, 202, 0.30);margin:40px;margin-left:0px;padding: 23px;">
		    	<h1 style="font-size: 20px;">Plan Courses</h1>
	            <div class="" style="padding: 20px;">
	            	<ul>
	              		
	              		<li>
	              			<h6 style="font-size: 20px;"> Department : <?php echo $department['dept_name_full'];  ?> </h6>
	              		</li>

						<li>
	              			<h6 style="font-size: 20px;"> Plan Number : <?php echo $std_plan;  ?> </h6>
	              		</li>
	              	</ul>
	              <hr class="horizontal text-white my-4">
					 <!-- Table of Plan Courses --> 
					 <?php 
						//Getting all Courses in the plan
						//We want to display each group in a seperate table, so we first we fetch all the groups 
						$get_crs_groups = "SELECT DISTINCT crs_group FROM plan_course WHERE plan_id = $std_plan ORDER BY group_num";
						$get_crs_group_query = mysqli_query($conn, $get_crs_groups);

						//fetch EACH Group of courses from the table 
						while ($row = mysqli_fetch_array($get_crs_group_query, MYSQLI_ASSOC)){
							$group = $row['crs_group'];

							//fetch all the courses for this group
							//first - > get the name of the group to display
							$get_full_group = "SELECT name_full FROM course_groups WHERE name_abrev = '$group'"; 
							$get_full_group_query = mysqli_query($conn, $get_full_group);
							$group_row = mysqli_fetch_array($get_full_group_query, MYSQLI_ASSOC);
							$group_name = $group_row['name_full']

							?>
							<h4 class="text-white"> Group : <?php echo $group_name;?> </h4> 
								<?php
								//select all courses that are part of this group
								$get_group_crs = "SELECT * FROM plan_course WHERE crs_group = '$group'";
								$get_group_crs_query = mysqli_query($conn, $get_group_crs);
								?>
								<table class="table table-sm">
								<tr style="background-color:#2AAA8A;">
									<th scope="col">Course Code</th>
									<th scope="col">Course Name</th>
									<th scope="col">Course Credit</th>
									<th scope="col">Course Pre-Requisite</th>
								</tr>
								<?php
								//Display each course in the group table BUT...
								while ($row2 =mysqli_fetch_array($get_group_crs_query, MYSQLI_ASSOC)){
									$crs_code = $row2['crs_code'];

									//print course pre requisite as None if null
									$crs_req = $row2['req_code'];
									if ($crs_req != 'null'){
										$x=1;
									}
									else{
										$crs_req = 'None';
									}
								

									//we need to get the information for that course from the course table
									$get_crs_info = "SELECT * FROM course WHERE crs_code = '$crs_code'";
									$get_crs_info_query = mysqli_query($conn, $get_crs_info);
									$crs_row = mysqli_fetch_array($get_crs_info_query, MYSQLI_ASSOC);
									$crs_name = $crs_row['crs_name'];
									$crs_credit = $crs_row['crs_credit'];
									?>

									<tr>
										<td scope="col"><?php echo $crs_code; ?></td>
										<td><?php echo $crs_name; ?></td>
										<td><?php echo $crs_credit; ?></td>
										<td><?php echo $crs_req; ?></td>
									</tr>
								<?php } ?>
								</table><br/><?php }  ?>
							
	              </div>
	            </div>
            </div>
	    </div>
	    </main>
	    <!-- /Content --> 
	<!------------------------------------------------->
	    <!-- Footer Component --> 
	    <footer class="section3">
	    	<?php include'components\footer.php'; ?>
	    </footer> 
	    <!-- /Footer Component -->
	<!------------------------------------------------->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


</body>
<?php
mysqli_close($conn);
?>
</html>