<!DOCTYPE html>
<!-- Guidance Counselor login Form -->
<?php 
  // Connect to database
  $host = 'localhost';
  $username  = 'root';
  $password = '';
  $db = 'recommend'; // database

  //start the connection:
  $conn = mysqli_connect($host,$username,$password,$db);


  //Check if connection has been made successfully or not
  //if($conn) {echo 'Connection Success';}
  //else {echo 'Connection Failed';
  //      mysqli_connect_error();
  //    }

  //First, check that there is no session, if there is -> end it | if not -> start the session 
  if(isset($_SESSION['use'])) {
    session_destroy();
    header("location:Home.php"); 
  }

  if(isset($_POST['login'])){
  $user_id = $_POST['id_field'];
  $pass = $_POST['pass_field'];

  //First, check if its an admin trying to login
  $get_admin = "SELECT * FROM admins WHERE admin_id = '$user_id' AND admin_password = '$pass'";
  $result = mysqli_query($conn, $get_admin);

  //if the admin exists and their entered credentials are correct;
  if(mysqli_num_rows($result)==1){
    $row = mysqli_fetch_assoc($result);
    // After, start the session
    session_start();
    $_SESSION['user']=$user_id;
    //Redirect the user to their profile page
    header("Location: AdminDashboard.php");
  }
    
  else{
    if(isset($_POST['login'])){
      $user_id = $_POST['id_field'];
      $pass = $_POST['pass_field'];
      //look for user id and pass in db
      //look for user id and pass in db
      $get_id = "select * from counselor where gc_id ='".$user_id."' AND gc_password='".$pass."' limit 1";
      $result = mysqli_query($conn, $get_id);

      //check if the user exists and their pass is correct if so
      //Start the session and send the user id to the next page using the session variable 
      if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_assoc($result);
        // After, start the session
        session_start();
        $_SESSION['user']=$user_id;
        //Redirect the user to their profile page
        header("Location: GCProfile.php");
  } 
}
  }}

?>
<DOCTYPE html>
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

        <!-- Custom css --> 
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
        <link type="text/css" rel="stylesheet" href="css/Style.css" />


        <!-- custom js -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  </head>
    

  <body>
  <!-----------------------------------------------    Header --> 
    <!-- Header -->
      <header class="d-inline">
        <!-- Header Background Image -->
          <div class="bg-img"> </div>
        <!-- /Header Background Image -->
        
        <!-- Nav Bar --><?php
          include 'components\public-nav.php';?>
        <!-- /Nav Bar -->
      </header>
      <!-- /Header -->

  <!-----------------------------------------------    Header --> 

  <!-----------------------------------------------   Content --> 
  <!-- Student Log in -->
    <div class="featured-section">
      <!-- Log in Form -->
      <section class="ftco-section" style="padding:20px;height:500px">
        <div class="container">

        <div class="row justify-content-center">
          <div class="col-md-6 text-center mb-5">
            <h1 class="heading-login">Login - Guidance Counselor </h1>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-4">
            <div class="login-wrap p-0">

              <form method="POST" action="" class="signin-form">
                <div class="form-group">  <!------------------ ID_FIELD --------------------------->
                  <input name="id_field" type="int" class="form-control" placeholder="Username" required>
                </div>
                <br/>

                <div class="form-group">  <!------------------ PASS_FIELD --------------------------->
                  <input name="pass_field" type="password" class="form-control" placeholder="Password" required>
                </div>
                <br/>

                <div class="form-group row" style="padding-left:50px;">
                  <button class="btn px-3 gap-1" style="margin-right: 140px;">
                    <a href="Home.php" style="text-decoration:none;color:white;"> Back </a> 
                  </button>

                <button type="submit" name="login" class="form-control btn px-3 gap-1"> 
                  <span style="color:white;"> Sign In </span> 
                </button> 
                </div>
              </form>
              </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <!-- /Content --> 
    <!------------------------------------------------->
    <!-- Footer Component --> 
      <footer class="section3"><?php
        include 'components\footer.php'; ?>
      </footer> 
    <!-- /Footer Component -->
    <!------------------------------------------------->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


</body>

</html>



