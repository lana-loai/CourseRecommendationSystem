<!--
=========================================================
* Material Dashboard 2 - v3.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim
* Edited and Used for the Graduation Project by Lana Gharibeh (interface)
* Backend Added by Lana Ghraibeh (Team Leader), Aseel Otoum, Dema Mrasi
=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->

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
$admin_id = $_SESSION['user'];

//First fetch all the current user data
//here we fetch all columns from admin table and limit the fetched rows to only 1 row
$get_user_data = "SELECT * FROM admins WHERE admin_id = '$admin_id'";

//Execute the query and save the result in a variable
$get_data_query = mysqli_query($conn, $get_user_data); 

//The result of the executed query above is not in the form of an array, so we must deal with that using a function
//This function fetches the data as an asscociative array
$admin_user = mysqli_fetch_array($get_data_query, MYSQLI_ASSOC);
$admin_name = $admin_user['admin_name'];
$admin_backup = $admin_user['admin_backup'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Administrator </title>

  <!-- Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  
  <!-- Nucleo Icons -->
  <link href="css/nucleo-icons.css" rel="stylesheet" />
  <link href="css/nucleo-svg.css" rel="stylesheet" />
  
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

	<!-- Custom css --> 
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
	<link type="text/css" rel="stylesheet" href="css/Style.css" />

  <!-- CSS Files -->
  <link id="pagestyle" href="css/material-dashboard.css?v=3.0.4" rel="stylesheet" />

</head>

<body>
	<!------------------------------------------------->
		<!-- Header -->
		<header class="d-inline">
			<!-- Header Background Image -->
			<div class="bg-img"> </div>
			<!-- /Header Background Image -->
	    
	    <!-- Nav Bar --><?php
	   		include 'components\private-nav-GC.php';?>
	  	<!-- /Nav Bar -->

		</header>
	  <!-- /Header -->

	<!------------------------------------------------->
  <main class="d-inline">
    <div class="featured-section text-white">
		  <div class="wrapper d-flex align-items-stretch">
        <!-- Sidebr -->
          <?php include 'components\sidebar-admin.php'; ?>
        <!-- /Sidebr -->
        <div class="featured-section" style="width:100%;border-radius:20px;background-color:rgba(92, 92, 92, 0.3);margin:20px;margin-left:0px;">
				<div class="" style="padding: 20px;">


          <!-- Guidance Counselors Section -->
          <div class="row">
              <div class="col-12">
                <div class="card my-4">
                  <div class="card-header position-relative mt-n4 mx-3 z-index-2 shadow-lg"  style="background-color:teal;border-radius:8px;padding:20px;">
                      <h5 class="text-white text-capitalize">Guidance Counselors</h5>
                  </div>
                  <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                      <table class="table align-items-center mb-0">

                        <thead>
                          <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Counselor Name/ E-mail</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Department/ Faculty</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Batch</th>
                            <th class="text-secondary opacity-7"></th>
                          </tr>
                        </thead>
                        <?php

                      //Here we start to print out all guidance counselors that are registered on Degree Advisor 
                      $get_all_counselors = "SELECT * FROM counselor";
                      $execute_get_counselors = mysqli_query($conn, $get_all_counselors);

                      //Fetch EACH guidance Counselor and Their information
                      while ($counselor = mysqli_fetch_array($execute_get_counselors, MYSQLI_ASSOC)){
                        $gc_id = $counselor['gc_id'];
                        $gc_name = $counselor['gc_name'];
                        $gc_email = $gc_id.'@yu.edu.jo';
                        $gc_dept = $counselor['dept_id'];

                        //Get the name of the counselor's department from the department table
                        $get_dept_data = "SELECT * FROM department WHERE dept_id = $gc_dept";
                        $get_dept_data_query = mysqli_query($conn, $get_dept_data);
                        $department  = mysqli_fetch_array($get_dept_data_query, MYSQLI_ASSOC);
                        $gc_dept = $department['dept_name'];

                        $gc_batch = substr($gc_id, 2, 4);
                      ?>
                        <tbody>
                          <tr>
                            <td> 
                              <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                  <h6 class="mb-0 text-sm"> <?php echo $gc_name; ?></h6>
                                  <p class="text-xs text-secondary mb-0"> <?php echo $gc_email; ?></p>
                                </div>
                              </div>
                            </td>

                            <td>
                              <p class="text-xs font-weight-bold mb-0"> <?php echo $gc_dept; ?></p>
                              <p class="text-xs text-secondary mb-0">Information Technology & Computer Science</p>
                            </td>

                            <td class="align-left">
                              <p class="text-secondary text-xs font-weight-bold"><?php echo $gc_batch; ?></p>
                            </td>

                            <td class="align-middle">
                              <button class="btn2" name="editstd" style="width:70px;height:40px;"> <a href="AdminEditUser.php"> Edit 
                                  </a>
                              </button>
                            </td>
                          </tr>
                          <?php } ?>
                       </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <!-- /Guidance Counselors Section -->

          <!-- Students Counselors Section -->
          <div class="row">
              <div class="col-12">
                <div class="card my-4">
                  <div class="card-header position-relative mt-n4 mx-3 z-index-2 shadow-lg"  style="background-color:teal;border-radius:8px;padding:20px;">
                      <h5 class="text-white text-capitalize">Students</h5>
                  </div>
                  <div>
                    <div class="table-responsive">
                      <table class="table align-items-center">
                        <thead>
                          <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Student Name/ E-mail</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Department/ Faculty</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Batch</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">GPA</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Graduating</th>
                            <th class="text-secondary opacity-7"></th>
                          </tr>
                        </thead>                   
                        <?php

                      //Here we start to print out all students that are registered on Degree Advisor 
                      $get_all_std = "SELECT * FROM student";
                      $execute_get_std = mysqli_query($conn, $get_all_std);

                      //Fetch EACH student and Their information
                      while($student = mysqli_fetch_array($execute_get_std, MYSQLI_ASSOC)){
                        $std_id = $student['std_id'];
                        $std_name = $student['first_name']." ".$student['last_name'];
                        $std_email = $student['email'];
                        $std_dept = $student['dept_id'];
                        $std_plan = $student['plan_id'];
                        $std_gpa = $student['std_gpa'];
                        $std_graduate = $student['is_graduate'];
                        if ($student['is_graduate']==1){
                          $std_graduate = 'Yes';
                        } else{
                            $std_graduate = 'No';
                        }

                        //Get the name of the student's department from the department table
                        $get_dept_data = "SELECT * FROM department WHERE dept_id = $std_dept";
                        $get_dept_data_query = mysqli_query($conn, $get_dept_data);
                        $department  = mysqli_fetch_array($get_dept_data_query, MYSQLI_ASSOC);
                        $std_dept = $department['dept_name'];

                        $std_batch = substr($std_plan, 0, 4);
                      ?>
                        <tbody>
                          <tr>
                            <td> 
                              <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                  <h6 class="mb-0 text-sm"> <?php echo $std_name; ?></h6>
                                  <p class="text-xs text-secondary mb-0"> <?php echo $std_email; ?></p>
                                </div>
                              </div>
                            </td>

                            <td>
                              <p class="text-xs font-weight-bold mb-0"> <?php echo $std_dept; ?></p>
                              <p class="text-xs text-secondary mb-0">Information Technology & Computer Science</p>
                            </td>

                            <td class="align-left">
                              <p class="text-secondary text-xs font-weight-bold"><?php echo $std_batch; ?></p>
                            </td>

                            <td class="align-left">
                              <p class="text-secondary text-xs font-weight-bold"><?php echo $std_gpa; ?></p>
                            </td>

                            <td class="align-left">
                              <p class="text-secondary text-xs font-weight-bold"><?php echo $std_graduate; ?></p>
                            </td>

                            <td class="align-middle">
                                <button class="btn2" name="editstd" style="width:70px;height:40px;"> <a href="AdminEditUser.php"> Edit 
                                  </a>
                                </button>
                            </td>
                          </tr>
                       </tbody>
                       <?php } ?>

                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <!-- /Students Section -->
          </div>
          </div>
      </div>
    </div>
  </main> 

  <!------------------------------------------------->
      <!-- Footer Component --> 
      <div class="row">
        <footer class="section3 position-fluid">
          <?php include 'components\footer.php'; ?>
        </footer> 
      </div>
      <!-- /Footer Component -->
  <!------------------------------------------------->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</body>
</html>