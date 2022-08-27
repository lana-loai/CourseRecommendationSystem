<?php 
  //First, check that there is no session, if there is -> end it | if not -> start the session 
  if(isset($_SESSION['use'])) {
    session_destroy();
    header("location:Home.php"); 
  }
?>
<!DOCTYPE html>
<!-- Homepage -->
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


		<!-- Custom css --> 
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
		<link type="text/css" rel="stylesheet" href="css/Style.css" />


		<!-- custom js -->
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<style>
			header{height:600px;}
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
	    		include 'components\public-nav.php';?>
	    	<!-- /Nav Bar -->

	    	<!-- page banner -->
	    		<!-- Header Hero-Banner:Landing Page -->
					<div class='banner-hero'>
						<section class="site-banner" style="color:white;text-align: center;">
					    		<div class="row p-4 pb-0 pe-lg-0 pt-lg-5  rounded-3">
					      			<div class="p-3 pt-lg-3">
					      				<h4 style=" opacity: 70%"> Yarmouk University </h4>
					        			<h1 class="display-6 fw-bold mb-2 wow fadeInDown">Course Recommendation Service</h1>
					        			<p class="leadmb-4" style="font-size:20px;opacity:60%">Helping our students choose the best schedule </p>
					        			<div  style="align-items: center;">
					          				<br/>
					          				<button type="button" class="btn px-6 gap-1" style="margin-right: 20px;padding:5px;width:150px;"> 
											  <a href="stdLogin.php" style="text-decoration: none;color:white;"> Student Login </a></button>

											<button type="button" class="btn px-6 gap-1" style="margin-right: 20px;padding:5px;width:160px;"> 
											  <a href="GCLogin.php" style="text-decoration: none;color:white;"> Counselor Login </a></button>
					      				</div>
					    			</div>
					  			</div>
					 	</section>
					</div>
				<!-- /Header Hero-Banner:Landing Page --> 
				<br/> <br/> <br/>
			<!-- /page banner -->
		</header>
	  	<!-- /Header -->

	<!------------------------------------------------->
	    <!-- Content -->
	    <main class="d-inline text">
			<div class="index-content">
				<!-- Featured Posts Section -->
				<section class="featured-section">
					<div class="container px-4 py-5" id="custom-cards">
						<!-- This is the faculty news section -->
					    <h2 class="pb-2 border-bottom" style="color:#2A302B"> Featured News </h2>
					    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">

			<!------------------------------------------------------------------------------------------------------------>
					    	<!-- Card 1 : news -->
					      <div class="col">
					      	<!-- Card 1 bg -->
					      	<a href="https://www.yu.edu.jo/index.php/en/news-3/4448-massad-honors-yarmouk-team-participating-in-the-arab-rally-for-entrepreneurship-and-innovation-2021" 
							  style="text-decoration: none">
						      
							  <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" 
							  style="background-image: url('images/header-bg4.jpg');">
						      <!-- /Card 1 bg -->
						      <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">

						        <!-- Card 1 Title -->
						          <h2 class="pt-5 mt-5 mb-4 display-9 lh-1 fw-bold">Arab Rally for Entrepreneurship and Innovation 2021 </h2>
						        <!-- /Card 1 Title -->

						        <!-- Card 1 details -->
						          <ul class="d-flex list-unstyled mt-auto">

						          	<!-- faculty icon -->
						            <li class="me-auto">
						        	    <img src="" alt="-IT-" width="32" height="32" class="card-img rounded-circle border border-white" 
										style="background-color:#57eca8; padding:2px;">
						            </li>
						            <!-- /faculty icon -->
						        
						        		<!-- News item department -->
						            <li class="d-flex align-items-center me-3" >
						         	    <small><b>CIS</b></small>
						            </li>
						            <!-- /News item department -->
						        
						        		<!-- News item date -->
						            <li class="d-flex align-items-center">
						  	          <small><b>3d</b></small>
						            </li>
						            <!-- /News item date -->
				             	</ul>
					          <!-- /Card 1 details -->
						            
						         </div>
						        </div> </a>
						    </div>
						    <!-- /Card 1 : news -->

			<!------------------------------------------------------------------------------------------------------------>
					    <!-- Card 2 : news -->
					      <div class="col">
					      	<!-- Card 2 bg -->
					      	<a href="https://it.yu.edu.jo/index.php/faculty-achievements-equipment/faculty-achievements/369-students-projects" 
							  style="text-decoration: none;">
						      	<div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" 
								  style="background-image: url('images/header-bg4.jpg');">
						      <!-- /Card 2 bg -->

						      <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">

						        <!-- Card 2 Title -->
						          <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Students Projects </h2>
						        <!-- /Card 2 Title -->

						        <!-- Card 1 details -->
						          <ul class="d-flex list-unstyled mt-auto">

						          	<!-- faculty icon -->
						            <li class="me-auto">
						        	    <img src="" alt="-IT-" width="32" height="32" class="card-img rounded-circle border border-white" 
										style="background-color:#57eca8; padding:2px;">
						            </li>
						            <!-- /faculty icon -->
						        
						        		<!-- News item department -->
						            <li class="d-flex align-items-center me-3" >
						         	    <small><b>CYS</b></small>
						            </li>
						            <!-- /News item department -->
						        
						        		<!-- News item date -->
						            <li class="d-flex align-items-center">
						  	          <small><b>3d</b></small>
						            </li>
						            <!-- /News item date -->
				             	</ul>
					          <!-- /Card 2 details -->
						            
						         </div>
						        </div>
						    </div></a>
						    <!-- /Card 2 : news -->

			<!----------------------------------------------------------------------------------------------------------->
						    <!-- Card 3 : news -->
					      <div class="col">
					      	<!-- Card 3 bg -->
					      	<a href="https://it.yu.edu.jo/index.php/faculty-achievements-equipment/faculty-achievements/366-yucpc2020-programming-contest" style="text-decoration: none">
						      	<div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('images/header-bg4.jpg');">
						      <!-- /Card 3 bg -->

						      <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">

						        <!-- Card 3 Title -->
						          <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">YUCPC2020 Programming Contest </h2>
						        <!-- /Card 3 Title -->

						        <!-- Card 3 details -->
						          <ul class="d-flex list-unstyled mt-auto">

						          	<!-- faculty icon -->
						            <li class="me-auto">
						        	    <img src="" alt="-IT-" width="32" height="32" class="card-img rounded-circle border border-white" style="background-color:#57eca8; padding:2px;">
						            </li>
						            <!-- /faculty icon -->
						        
						        		<!-- News item department -->
						            <li class="d-flex align-items-center me-3" >
						         	    <small><b>CS</b></small>
						            </li>
						            <!-- /News item department -->
						        
						        		<!-- News item date -->
						            <li class="d-flex align-items-center">
						  	          <small><b>5d</b></small>
						            </li>
						            <!-- /News item date -->
				             	</ul>
					          <!-- /Card 3 details -->
						            
						      	</div>
						    	</div>
						    </div></a>
						    <!-- /Card 3 : news -->
			<!----------------------------------------------------------------------------------------------------------->

						 </div>
						</div>
					</section></div>
			<!-- /Featured Posts Section -->
			<!-- ===================================================================================================== -->
			<div class="index-content" >
				<!-- Featured Posts Section -->
				<section class="featured-section">
				<!-- Upcoming Events Section -->
					<!-- This is the upcoming events section -->
					<div class="container px-4 py-5" id="custom-cards">
						<h2 class="pb-2 border-bottom" style="color:#2A302B"> Upcoming Events </h2> <br/>
						<div class="row mb-2">
					    <div class="col-md-6">
					      <div class="row g-0 border rounded- overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative" style="color:white;border-radius:20px; background-color: rgba(10, 116, 173, 0.50)">
					        <div class="col p-4 d-flex flex-column position-static white ">
					          <strong class="d-inline-block mb-2" style="color:white">Registration</strong>
					          <h3 class="mb-0">Summer Semester</h3>
					          <div class="mb-1 text-muted">June 23</div>
					          <p class="card-text mb-auto">The Registration for the Summer Semester for the current academic year will be starting by the end of may.</p>
					          <a href="https://www.yu.edu.jo/index.php/en/adv-3/4079-announcement-to-students-regarding-the-pre-payment-of-university-fees" class="stretched-link">Continue reading</a> <!-- This will link to the official uni page -->
					        </div>
					        <div class="col-auto d-none d-lg-block">
					          <img class="bd-placeholder-img" width="200" height="250" src='images/header-bg7.jpg' role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"/>
					        </div>
					      </div>
					    </div>
					    <div class="col-md-6">
					      <div class="row g-0 border rounded- overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative" style="color:white;border-radius:20px; background-color: rgba(10, 116, 173, 0.50)">
					        <div class="col p-4 d-flex flex-column position-static white ">
					          <strong class="d-inline-block mb-2" style="color:white">Tala Ibn-Al-Hussein Library</strong>
					          <h3 class="mb-0">Creative Writing Course</h3>
					          <div class="mb-1 text-muted">April 18</div>
					          <p class="card-text mb-auto">The Library has started a Creative Writing course for all interested students.</p>
					          <a href="https://library.yu.edu.jo/en/" class="stretched-link">Continue reading</a> <!-- This will link to the official uni page -->
					        </div>
					        <div class="col-auto d-none d-lg-block">
					          <img class="bd-placeholder-img" width="200" height="250" src='images/header-bg8.jpg' role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"/>
					        </div>
					      </div>
					    </div>
					    <br/>
					</div>
					    <div class="row mb-2">
					    <div class="col-md-6">
					      <div class="row g-0 border rounded- overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative" style="color:white;border-radius:20px; background-color: rgba(10, 116, 173, 0.50)">
					        <div class="col p-4 d-flex flex-column position-static">
					          <strong class="d-inline-block mb-2" style="color:white">University Graduation</strong>
					          <h3 class="mb-0">Graduation Ceremony</h3>
					          <div class="mb-1 text-muted">June 5</div>
					          <p class="card-text mb-auto" style="display: block">Student Affairs Deanship has began planing the Ceremony this year, after ceasing for about 2 years because of Covid_19 pandemic.</p>
					          <a href="https://www.yu.edu.jo/index.php/en/news-3/4447-reorganizing-the-graduation-ceremony-beginning-this-year" class="stretched-link">Continue reading</a> <!-- This will link to the official uni page -->
					        </div>
					        <div class="col-auto d-none d-lg-block">
					          <img class="bd-placeholder-img" width="200" height="250" src='images/header-bg5.jpg' role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"/>
					        </div>
					      </div>
					    </div>
					    <div class="col-md-6">
					      <div class="row g-0 border rounded- overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative" style="color:white;border-radius:20px; background-color: rgba(10, 116, 173, 0.50)">
					        <div class="col p-4 d-flex flex-column position-static white ">
					          <strong class="d-inline-block mb-2" style="color:white">International Relations</strong>
					          <h3 class="mb-0">Univeristy International Week Event</h3>
					          <div class="mb-1 text-muted">July 14</div>
					          <p class="card-text mb-auto">The Second International Week to be held in August, with the presence of international delegations.</p>
					          <a href="https://www.yu.edu.jo/index.php/en" class="stretched-link">Continue reading</a> <!-- This will link to the official uni page -->
					        </div>
					        <div class="col-auto d-none d-lg-block">
					          <img class="bd-placeholder-img" width="200" height="250" src='images/header-bg9.png' role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"/>
					        </div>
					      </div>
					    </div>
					   	 </div>
					  	</div>
				  	<!-- /Upcoming Events Section -->
				  </section>
				</div>
	    </main>
	    <!-- /Content --> 
	<!------------------------------------------------->
	    <!-- Footer Component --> 
	    <footer class="section3">
	    	<?php include 'components\footer.php'; ?>
	    </footer> 
	    <!-- /Footer Component -->
	<!------------------------------------------------->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


	</body>
</html>


