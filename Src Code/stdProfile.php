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

  
  function calculateAvg($conn, $std_id){
	$mark_sum = 0;
	$credit_sum = 0;
	//Getting all student transcripts
	$get_std_terms = "SELECT DISTINCT term_id FROM transcript WHERE std_id = $std_id  ORDER BY term_id";
	$get_std_terms_query = mysqli_query($conn, $get_std_terms);

	//fetch EACH term from the table 
		while ($row = mysqli_fetch_array($get_std_terms_query, MYSQLI_ASSOC)){
			$term = $row['term_id'];
			
			//select all courses taken in this term FOR EACH TERM
			$get_term_crs = "SELECT * FROM transcript WHERE std_id = $std_id  AND term_id = $term";
			$get_term_crs_query = mysqli_query($conn, $get_term_crs);

			//Display each course in the term table
			while ($row2 =mysqli_fetch_array($get_term_crs_query, MYSQLI_ASSOC)){
				$std_mark = $row2['std_mark'];  
				$mark_status = $row2['mark_status'];
				$crs_code = $row2['crs_code'];

				//get course credit from batch plan courses
				$crs_credit_query = "SELECT crs_credit FROM course WHERE crs_code = '$crs_code'";
				$execute_credit_query = mysqli_query($conn, $crs_credit_query);
				$course = mysqli_fetch_array($execute_credit_query);
				$crs_credit = $course['crs_credit'];
				
				//if the mark is a pass and is larger than 0 (marks that equal 0 are assigned for courses that are only pass/fail)
				if ($std_mark > 0 && $mark_status == 'PASS'){
					$mark_sum += $std_mark*$crs_credit;
					$credit_sum += $crs_credit;
				}
			}
		}
	$average = round($mark_sum/$credit_sum, 2);


	//save the new value of the gpa to the database (update gpa)
	$update_gpa = "UPDATE student SET std_gpa = $average WHERE std_id = $std_id";
	$execute_update_gpa = mysqli_query($conn, $update_gpa);

	}

	function checkGraduate($conn, $std_id){
		$credit_sum = 0;
		//Getting all student transcripts
		$get_std_terms = "SELECT DISTINCT term_id FROM transcript WHERE std_id = $std_id  ORDER BY term_id";
		$get_std_terms_query = mysqli_query($conn, $get_std_terms);
	
		//fetch EACH term from the table 
			while ($row = mysqli_fetch_array($get_std_terms_query, MYSQLI_ASSOC)){
				$term = $row['term_id'];
				
				//select all courses taken in this term FOR EACH TERM
				$get_term_crs = "SELECT * FROM transcript WHERE std_id = $std_id  AND term_id = $term";
				$get_term_crs_query = mysqli_query($conn, $get_term_crs);
	
				//Display each course in the term table
				while ($row2 =mysqli_fetch_array($get_term_crs_query, MYSQLI_ASSOC)){
					$mark_status = $row2['mark_status'];
					$crs_code = $row2['crs_code'];
	
					//get course credit from batch plan courses
					$crs_credit_query = "SELECT crs_credit FROM course WHERE crs_code = '$crs_code'";
					$execute_credit_query = mysqli_query($conn, $crs_credit_query);
					$course = mysqli_fetch_array($execute_credit_query);
					$crs_credit = $course['crs_credit'];
					
					//if the mark is a pass and is larger than 0 (marks that equal 0 are assigned for courses that are only pass/fail)
					if ($mark_status == 'PASS'){
						$credit_sum += $crs_credit;
					}
				}
			}	
		
		//check if the student has passed 113 credit hours succesfully, if yes then set graduate to 1 (it is 0 by default)
		if ($credit_sum >= 113){
			$change_query = "UPDATE student SET is_graduate = 1 WHERE std_id = $std_id";
			$execute_change = mysqli_query($conn, $change_query);
		}
		else {
			$change_query = "UPDATE student SET is_graduate = 0 WHERE std_id = $std_id";
			$execute_change = mysqli_query($conn, $change_query);
		}
	}

	if(isset($_POST['checkGrad'])){
		checkGraduate($conn, $std_id);
	}

	if(isset($_POST['avgReCalc'])){
		calculateAvg($conn, $std_id);
	}
?>

<!-- Student Profile -->
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
			.btn2{ /*background-color:#9d342c;*/
				color: white;
				background-color: #2AAA8A;
				opacity:85%;
				border-radius: 10px;
				border-color: transparent;
				transition-duration: 0.4s;
				font-size: 15px;
				width:200px;
				height: 50px;}

			.btn2:hover{ background-color: rgb(4, 59, 55); 
						border-color: transparent;
						color: white; }
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
			<div class="featured-section" 
			style="width:100%;border-radius:20px;background-color:rgb(234, 221, 202, 0.30);margin:40px;margin-left:0px;padding: 23px;">
		    	<h1 style="font-size: 20px;">Profile Information</h1>
	            <div class="" style="padding: 20px;">
	            	<ul>
	              		<li>
	              			<h6 style="font-size: 20px;"> Student ID Number : <?php echo $std_id; ?></h6>
	              		</li>

						<li>
	              			<h6 style="font-size: 20px;"> E-mail : <?php echo $std_email;  ?> </h6>
	              		</li>

	              		<li>
	              			<h6 style="font-size: 20px;"> Major : <?php echo $department['dept_name_full'];  ?> </h6>
	              		</li>

	              		<li>
	              			<h6 style="font-size: 20px;"> First Name : <?php echo $std_First;  ?> </h6>
	              		</li>

						<li>
	              			<h6 style="font-size: 20px;"> Last Name : <?php echo $std_last;  ?> </h6>
	              		</li>

						<li>
	              			<h6 style="font-size: 20px;"> Plan Number : <?php echo $std_plan;  ?> </h6>
	              		</li>

	              		<li> 
							<form action="" method="POST">
	              				<h6 style="font-size: 20px;"> Student GPA : <?php echo $std_gpa; ?></h6> 
								<button type="submit" name="avgReCalc" class="btn2"> Re-calculate GPA </button>
							</form>
	              		</li>

	              		<li> 
							<form action="" method="POST">
	              				<h6 style="font-size: 20px;"> Expected To Graduate : <?php echo $std_graduate; ?></h6> 
								<button type="submit" name="checkGrad" class="btn2"> Check if Graduate </button>
							</form>
	              		</li>

	              	</ul> 
					  <hr class="horizontal text-white my-4">
					 <!-- Table of Transcript of Records --> 
					 <?php 
						//Getting all student transcripts
						//We want to display each term in a seperate table, so we first we fetch all the terms the student has taken
						$get_std_terms = "SELECT DISTINCT term_id FROM transcript WHERE std_id = $std_id  ORDER BY term_id";
						$get_std_terms_query = mysqli_query($conn, $get_std_terms);

						//fetch EACH term from the table 
						while ($row = mysqli_fetch_array($get_std_terms_query, MYSQLI_ASSOC)){
							$term = $row['term_id'];
							?>
							<h4 class="text-white"> Term : <?php echo $term;?> </h4>
								<?php
								//select all courses taken in this term FOR EACH TERM
								$get_term_crs = "SELECT * FROM transcript WHERE std_id = $std_id  AND term_id = $term";
								$get_term_crs_query = mysqli_query($conn, $get_term_crs);
								?>
								<table class="table table-sm">
								<tr style="background-color:#2AAA8A;">
									<th scope="col">Course</th>
									<th scope="col">Mark</th>
									<th scope="col">Mark Status</th>
								</tr>
								<?php
								//Display each course in the term table
								while ($row2 =mysqli_fetch_array($get_term_crs_query, MYSQLI_ASSOC)){
									$crs_code = $row2['crs_code'];
									$std_mark = $row2['std_mark'];  
									$mark_status = $row2['mark_status'];
									?>

									<tr>
										<td scope="col"><?php echo $crs_code; ?></td>
										<td><?php echo $mark_status; ?></td>
										<td><?php echo $std_mark; ?></td>
									</tr>
								<?php } ?>
								</table><br/><?php } ?>
							
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