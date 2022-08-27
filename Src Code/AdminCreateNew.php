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

if (isset($_POST['add'])){
	$std_id=$_POST['student_id'];
	$email=$_POST['email'];
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$pwd=$_POST['password'];
	$gpa=$_POST['student_gpa'];
	$graduate=$_POST['is_graduate'];
	$dept_id=$_POST['dept_id'];
	$plan_id=$_POST['plan_id'];

	$conn->query("INSERT INTO student(std_id,email,std_password,first_name,last_name,std_gpa,is_graduate,dept_id,plan_id) 
	VALUES($std_id,'$email',$pwd,'$first_name','$last_name',NULL,NULL,$dept_id,$plan_id)") or die($conn->error);
	//$sql="INSERT INTO student(std_id,email,std_password,first_name,last_name,std_gpa,is_graduate,dept_id,plan_id) VALUES($std_id,'$email',$pwd,'$first_name','$last_name',$gpa,$graduate,$dept_id,$plan_id) ";
	/*$result= mysqli_query($conn, $sql);
	if ($result) {
		echo " inserted";
	}
  	else{
		echo "not inserted";}*/
}

if (isset($_POST['addgc'])){
	$gc_id=$_POST['gc_id'];
	$full_name=$_POST['full_name'];
	$pwd=$_POST['password'];
	$dept_id=$_POST['dept_id'];


	$conn->query("INSERT INTO counselor(gc_id,email,gc_password,dept_id,gc_name) 
	VALUES('$gc_id','$pwd',$dept_id,'$full_name')") or die($conn->error);
	//$sql="INSERT INTO student(std_id,email,std_password,first_name,last_name,std_gpa,is_graduate,dept_id,plan_id) VALUES($std_id,'$email',$pwd,'$first_name','$last_name',$gpa,$graduate,$dept_id,$plan_id) ";
	/*$result= mysqli_query($conn, $sql);
	if ($result) {
		echo " inserted";
	}
  	else{
		echo "not inserted";}*/
}
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
        <div class="featured-section" style="width:1150px;border-radius:20px;background-color:rgba(92, 92, 92, 0.3);margin:20px;margin-left:0px;">
		<div class="" style="padding: 20px;">


          <!-- Guidance Counselors Section -->
            <div class="row">
              <div class="col-12">
                <div class="card my-4">
                  <div class="card-header position-relative mt-n4 mx-3 z-index-2 shadow-lg"  style="background-color:teal;border-radius:8px;padding:20px;">
                      <h5 class="text-white text-capitalize"> Create New Counselors</h5>
                  </div>                    
                <form action ="" method="POST"  style="padding:10px;">
                    <div class="table-responsive">
                      <table class="table align-items-center">
                        <thead>
                          <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Counselor ID</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Full Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Password</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Department Number</th>
                          </tr>
                        </thead>           
                        <tbody>
                            <tr>
                                <td>
                                    <input type="number" placeholder= "Counselor ID " name="gc_id"></input>
                                </td>    

                                <td>
                                    <input type="text" placeholder= "Full Name " name="full_name"></input>
                                </td>

                                <td>
                                    <input type="number" placeholder= "password " name="gc_password"></input>
                                </td>

                                <td>
                                    <input type="number" placeholder= "Department" name="dept_id"></input>
                                </td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                    <br/>
                    <button type="submit" class="btn2" name="addgc">Add </button>
                </form>

            </div>
        </div>
    </div>
    <!-- /Guidance Counselors Section -->

<!-- Students Section -->
          <div class="row">
              <div class="col-12">
                <div class="card my-4">
                  <div class="card-header position-relative mt-n4 mx-3 z-index-2 shadow-lg"  style="background-color:teal;border-radius:8px;padding:20px;">
                      <h5 class="text-white text-capitalize"> Create New Students</h5>
                  </div>                    
                <form action ="" method="POST"  style="padding:10px;">
                    <div class="table-responsive">
                      <table class="table align-items-center">
                        <thead>
                          <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Student ID</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">First Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Last Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Password</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Department Number</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Plan ID</th>
                          </tr>
                        </thead>           
                        <tbody>
                            <tr>
                                <td>
                                    <input type="number" placeholder= "student id " name="student_id"></input>
                                </td>    
                                
                                <td>
                                    <input type="text" placeholder= "email " name="email"></input>
                                </td>

                                <td>
                                    <input type="text" placeholder= "first name " name="first_name"></input>
                                </td>

                                <td>
                                    <input type="text" placeholder= "last name " name="last_name"></input>
                                </td>

                                <td>
                                    <input type="number" placeholder= "password " name="password"></input>
                                </td>

                                <td>
                                    <input type="number" placeholder= "dept id " name="dept_id"></input>
                                </td>

                                <td>
                                    <input type="number" placeholder= "plan id " name="plan_id"></input>
                                </td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                    <br/>
                    <button type="submit" class="btn2" name="add">Add </button>
                </form>

            </div>
        </div>
    </div>
<!-- /Students Section -->
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