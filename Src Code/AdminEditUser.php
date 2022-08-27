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
            <div class="featured-section" style="padding:15px;width:100%;border-radius:20px;background-color:rgba(92, 92, 92, 0.5);margin:40px;margin-left:0px;">
            <h2> Students List </h2>
                    <form method="POST" action="" style="padding:10px">
                        <div class="input-group">
                            <div class="form-outline" style="width:80%;">
                                <input type="search" name="std_id_field" style="border-radius:15px 0px 0px 15px;backgraound-color:white;width:100%;height:40px;color:steelblue;padding:10px;"/>
                            </div>
                            <button type="submit" name="search" class="btn2" style="height:40px;">
                                <em> search </em>
                            </button>
                        </div>
                    <?php    
                    if(isset($_POST['search'])){
                        $std_id = $_POST['std_id_field'];
                                                
                        //search for the entered student ID
                        $search_std_query = "SELECT * FROM student WHERE std_id = $std_id LIMIT 1";
                        $execute_search_query = mysqli_query($conn, $search_std_query);
                                                
                        if(mysqli_num_rows($execute_search_query)==1){
                            include 'AdminSearchResultStd.php';
                        }

                        else{
                            echo "<br/><h6> No student with that ID was found </h6>";
                        }
                    }
                    ?>
                    </form>

<!-- Edit Part -->
            <div class="featured-section" style="padding:15px;width:100%;border-radius:20px;background-color:white;margin:20px;margin-left:0px;">
            <h4 class="text-dark"> Edit Student</h4> <br/>
            <form method="post" action="">
                <table class="table align-items-center">
                    <thead> 
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> Student ID </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> First Name </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> Last Name </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> Email </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> <input name="std_id" class="form-control" placeholder='ID'/>              </td>
                            <td> <input name="f_name" class="form-control" placeholder='First Name'/>      </td>
                            <td> <input name="l_name" class="form-control" placeholder='Last Name'/>       </td>
                            <td> <input name="email" class="form-control" placeholder='Email'/>            </td>
                        </tr>
                    </tbody> <br/>
                </table>
                <button type="submit" name="editbtn1" class="btn2"> Confirm </button>
            </form>
            </div>

            <?php 
                if(isset($_POST['editbtn1'])){
                    $std_id = $_POST['std_id'];
                    $std_f = $_POST['f_name'];
                    $std_l = $_POST['l_name'];
                    $std_email = $_POST['email'];
                    $update_std = "UPDATE student SET email = '$std_email', first_name = '$std_f', last_name = '$std_l' WHERE std_id = $std_id";
                    $execute_update = mysqli_query($conn, $update_std); 
                } 
            ?>
            </div>
        </div>

        <!-- Guidance Counselor Section -->
        <div class="featured-section" style="width:100%;border-radius:20px;background-color:rgba(92, 92, 92, 0.3);margin:20px;margin-left:0px;">
			<div class="" style="padding: 20px;">
            <div class="featured-section" style="padding:15px;width:100%;border-radius:20px;background-color:rgba(92, 92, 92, 0.5);margin:40px;margin-left:0px;">
            <h2> Counselors List </h2>
                    <form method="POST" action="" style="padding:10px">
                        <div class="input-group">
                            <div class="form-outline" style="width:80%;">
                                <input type="search" name="gc_id_field" style="border-radius:15px 0px 0px 15px;backgraound-color:white;width:100%;height:40px;color:steelblue;padding:10px;"/>
                            </div>
                            <button type="submit" name="search2" class="btn2" style="height:40px;">
                                <em> search </em>
                            </button>
                        </div>
                    <?php    
                    if(isset($_POST['search2'])){
                        $gc_id = $_POST['gc_id_field'];
                                                
                        //search for the entered student ID
                        $search_gc_query = "SELECT * FROM counselor WHERE gc_id = '$gc_id' LIMIT 1";
                        $execute_search_query = mysqli_query($conn, $search_gc_query);
                                                
                        if(mysqli_num_rows($execute_search_query)==1){
                            include 'AdminSearchResultGC.php';
                        }

                        else{
                            echo "<br/><h6> No Counselor with that ID was found </h6>";
                        }
                    }
                    ?>
                    </form>

<!-- Edit Part -->
            <div class="featured-section" style="padding:15px;width:100%;border-radius:20px;background-color:white;margin:20px;margin-left:0px;">
            <h4 class="text-dark"> Edit Counselor </h4> <br/>
            <form method="post" action="">
                <table class="table align-items-center">
                    <thead> 
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> Counselor ID </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> Counselor Email </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> Counselor Name </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> <input name="gc_id" class="form-control" placeholder='ID'/>              </td>
                            <td> <input name="gc_email" class="form-control" placeholder='Email'/>            </td>
                            <td> <input name="gc_name" class="form-control" placeholder='Full Name'/>      </td>
                        </tr>
                    </tbody> <br/>
                </table>
                <button type="submit" name="editbtn2" class="btn2"> Confirm </button>
            
            </form>
            </div>

            <?php 
                if(isset($_POST['editbtn2'])){
                    $gc_id = $_POST['gc_id'];
                    $gc_name = $_POST['gc_name'];
                    $gc_email = $_POST['gc_email'];
                    $update_gc = "UPDATE counselor SET gc_name = '$gc_name' WHERE gc_id = '$gc_id'";
                    $execute_update = mysqli_query($conn, $update_gc); 
                } 
            ?>
            </div>
        </div> </div>
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