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
  $gc_id = $_SESSION['user'];

  //First fetch all the current user data
  //here we fetch all columns from counselor table and limit the fetched rows to only 1 row
  $get_user_data = "SELECT * FROM counselor WHERE gc_id = '$gc_id'"; 

  //Execute the query and save the result in a variable
  $get_data_query = mysqli_query($conn, $get_user_data);

  //The result of the executed query above is not in the form of an array, so we must deal with that using a function
  //This function fetches the data as an asscociative array
  $counselor = mysqli_fetch_array($get_data_query, MYSQLI_ASSOC);

  //Save each attribute into a variable for easier access throughout the code 
  $gc_password = $counselor['gc_password'];
  //$gc_First = $counselor['first_name'];
  //$gc_last = $counselor['last_name'];
  $gc_dept = $counselor['dept_id'];
  $gc_plan = substr($gc_id, 2, 4);

  //Get the name of the counselor's department from the department table
  $get_dept_data = "SELECT * FROM department WHERE dept_id = $gc_dept";
  $get_dept_data_query = mysqli_query($conn, $get_dept_data);
  $department  = mysqli_fetch_array($get_dept_data_query, MYSQLI_ASSOC);
  

?>

<!-- Guidance Counselor Profile -->
<!DOCTYPE html>
<html lang=en>
	<head>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equive="X-UA-Compatible" content="ie=edge">
  		<title> Degree Advisor </title>


		<!-- Bootstrap -->
	  	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

		<!-- Bootstrap js -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

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
	    		include 'components\private-nav-GC.php';?>
	    	<!-- /Nav Bar -->

		</header>
	  	<!-- /Header -->

	<!------------------------------------------------->
	<!-- Content -->
	<main class="d-inline">
        <div class="featured-section text-white">
		    <div class="wrapper d-flex align-items-stretch">
				<!-- Sidebar -->
					<?php include 'components\sidebar-guide.php'; ?>
				<!-- /Sidebar -->

		        <div class="featured-section" style="width:100%;border-radius:20px;background-color:rgba(92, 92, 92, 0.5);margin:40px;margin-left:0px;">
				<div class="" style="padding: 20px;">
					<h2> Profile </h2>
	            	<ul>
	              		<li>
	              			<h6 style="font-size: 20px;"> Counselor ID : <?php echo $gc_id; ?></h6>
	              		</li>

						<li>
	              			<h6 style="font-size: 20px;"> E-mail : <?php echo $gc_id."@yu.edu.jo";  ?> </h6>
	              		</li>

	              		<li>
	              			<h6 style="font-size: 20px;"> Department : <?php echo $department['dept_name_full'];  ?> </h6>
	              		</li>

						<li>
	              			<h6 style="font-size: 20px;"> Plan Number : <?php echo $gc_plan;  ?> </h6>
	              		</li>

	              	</ul> 
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
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
	integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" 
	integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" 
	integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


</body>
<?php
mysqli_close($conn);
?>
</html>