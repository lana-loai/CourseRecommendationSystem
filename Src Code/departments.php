<!DOCTYPE html>
<?php 
  // Connect to database
  $host = 'localhost';
  $username  = 'root';
  $password = '';
  $db = 'recommend'; // database

  //start the connection:
  $conn = mysqli_connect($host,$username,$password,$db);

  //Getting the CS description
  $get_descriptions1 = "SELECT dept_desc FROM department WHERE dept_id = 1";
  $result = mysqli_query($conn, $get_descriptions1);
  	// Fetch one and only one row
  	while ($row = mysqli_fetch_row($result)) {
    $dept_desc1 = $row[0];}	

  //Getting the CIS description
  $get_descriptions2 = "SELECT dept_desc FROM department WHERE dept_id = 2";
  $result = mysqli_query($conn, $get_descriptions2);
  	// Fetch one and only one row
  	while ($row = mysqli_fetch_row($result)) {
    $dept_desc2 = $row[0];}	

   //Getting the BIT/MIS description
   $get_descriptions3 = "SELECT dept_desc FROM department WHERE dept_id = 3";
   $result = mysqli_query($conn, $get_descriptions3);
  	// Fetch one and only one row
  	while ($row = mysqli_fetch_row($result)) {
    $dept_desc3 = $row[0];}	


   //Getting the CYS description
   $get_descriptions4 = "SELECT dept_desc FROM department WHERE dept_id = 4";
   $result = mysqli_query($conn, $get_descriptions4);
  	// Fetch one and only one row
  	while ($row = mysqli_fetch_row($result)) {
    $dept_desc4 = $row[0];}	



?>
<!-- Deparments Page -->
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


		<!-- Custom css --> 
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
		<link type="text/css" rel="stylesheet" href="css/Style.css" />


		<!-- custom js -->
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<style>
			header{height:200px;}
			a{
				color:steelblue;
			} 

			/* departments carousel */
			/* Carousel 100% Fullscreen */


			.carousel-item {
			padding:0;
			position: relative;
			background: no-repeat center center scroll;
			background-size: cover;
			}

			/*Cards */

			.blockquote-custom-depts {
			width:100%;
			margin:0;
			position: relative;
			font-size: 1.1rem;
			border-radius: 0px;
			background: rgba(255, 255, 255, 0.75) /*#34495E*/;
			box-shadow: black;
			color:#34495E;
			}


		</style>
	</head>
	

	<body>
	    <!-- Nav Bar -->
			<nav style="background-color:rgba(3, 109, 166, 0.5)">
				<?php include 'components\public-nav.php';?>
			</nav>
		<!-- /Nav Bar -->
	    <!-- Content -->    
		<main class="d-inline text">
			<div class="index-content">
			    <div id="carouselExampleIndicators" class="carousel slide my-carousel my-carousel" data-ride="carousel">
			      <ol class="carousel-indicators">
			        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
			        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
			      </ol>
			      <div class="carousel-inner" role="listbox">
			        <div class="carousel-item active" style="height:650px;background-image: url('images/header-bg4.jpg');">
			             		<div class="col-lg-6 mx-auto">
									<!-- CUSTOM BLOCKQUOTE -->
					                <blockquote class="blockquote blockquote-custom-depts p-5" style="margin-top:50px;">
					                	<h1 style="margin-top:10px;color:#2A302B"> Faculty of Information Technology and Computer Science </h1>
					                    <p class="mb-0 mt-2 font-italic">In 2002, the faculty was established at Yarmouk University by a decision of 
											the Higher Education Council in accordance to his majesty King Abdullah II instructions to keep pace with 
											the advancement of technology and computer science in developed countries and to meet the needs of the local, 
											regional and global markets. The core of the establishment of the faculty was the Department of Computer Science, 
											which was established as a department affiliated to the Faculty of Science in 1980, where it was the first department 
											to grant a bachelor degree in Computer Science among Jordanian universities, and then the department started offering 
											a master degree in Computer Science in 2000. Upon the establishment of the college, three departments were approved; 
											Computer Science, Computer Information Systems and Management Information Systems Departments.
					                    	<br/>
					                    	<a href="https://it.yu.edu.jo/">Official Faculty page</a>.</p>
					                </blockquote><!-- END -->
			            		</div>
		        		</div>

			        <div class="carousel-item" style="height:650px;background-image: url('images/header-bg9.jpg')">
			            <div class="col-lg-6 mx-auto">
							<!-- CUSTOM BLOCKQUOTE -->
					            <blockquote class="blockquote blockquote-custom-depts p-5" style="margin-top:50px;">
					                	<h1 style="margin-top:10px;color:#2A302B"> Computer Science </h1>
					                    <p class="mb-0 mt-2 font-italic"> <?php print($dept_desc1);?>
					                    <br/><a href="https://it.yu.edu.jo/index.php/depts/computer-science">
											Official Department page</a>.
					                	</p>
					            </blockquote><!-- END -->
			            </div>
		        	</div>

				    <div class="carousel-item " style="height:650px;background-image: url('images/header-bg12.jpg')">
					    <div class="col-lg-6 mx-auto">
							<!-- CUSTOM BLOCKQUOTE -->
							<blockquote class="blockquote blockquote-custom-depts p-5" style="margin-top:50px;">
					                <h1 style="margin-top:10px;color:#2A302B"> Computer Information Systems </h1>
							    	<p class="mb-0 mt-2 font-italic" style="font-size: 15px;"> <?php print($dept_desc2);?>
							    	<br/><a href="https://it.yu.edu.jo/index.php/depts/department-of-information-systems">
										Official Department page</a>.
							    	</p>
							</blockquote><!-- END -->
					    </div>
				    </div>

			        <div class="carousel-item " style="height:650px;background-image: url('images/header-bg11.jpg')">
			            <div class="col-lg-6 mx-auto">
							<!-- CUSTOM BLOCKQUOTE -->
					        <blockquote class="blockquote blockquote-custom-depts p-5" style="margin-top:50px;">
					            <h1 style="margin-top:10px;color:#2A302B"> Management Information Systems </h1>
					            <p class="mb-0 mt-2 font-italic"><?php print($dept_desc3);?>
					            <br/><a href="https://it.yu.edu.jo/index.php/depts/department-of-information-technology">
									Official Department page</a>.
					            </p>
					        </blockquote><!-- END -->
			            </div>	        	
			        </div>

			        <div class="carousel-item " style="height:650px;background-image: url('images/header-bg10.jpg')">
			            <div class="col-lg-6 mx-auto">
							<!-- CUSTOM BLOCKQUOTE -->
					        <blockquote class="blockquote blockquote-custom-depts p-5" style="margin-top:50px;">
					            <h1 style="margin-top:10px;color:#2A302B"> Cyber Security </h1>
					            <p class="mb-0 mt-2 font-italic"> <?php print($dept_desc4);?>
					            <br/><a href="https://it.yu.edu.jo/index.php/depts/department-of-information-technology">
									Official Department page</a>.
					        	</p>
					        </blockquote><!-- END -->
			            </div>	        	
			        </div>
			      
			      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			        <span class="sr-only">Previous</span>
			      </a>
			      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			        <span class="carousel-control-next-icon" aria-hidden="true"></span>
			        <span class="sr-only">Next</span>
			      </a>
			    </div>
			</div>
		</div>
	    </main>
	    <!-- /Content --> 
	<!------------------------------------------------->
	    <!-- Footer Component --> 
	    <footer class="section3"><?php
	    	include 'components\footer.php'; ?>
	    </footer> 
	    <!-- /Footer Component -->
	<!------------------------------------------------->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
	integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
	crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" 
	integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" 
	crossorigin="anonymous"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" 
	integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" 
	crossorigin="anonymous"></script>


</body>

</html>


