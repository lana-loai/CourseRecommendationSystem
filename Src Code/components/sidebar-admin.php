<style>
	/* Guide Styling */
#sidebar3 {
  border-radius: 20px;
  margin: 20px;
  min-height: 500px;
  min-width: 300px;
  max-width: 300px;
  color: #fff;
  -webkit-transition: all 0.3s;
  -o-transition: all 0.3s;
  transition: all 0.3s;
  position: relative;
  z-index: 0; }

  #sidebar3 ul.components {
    padding: 0px; }
  #sidebar3 ul li {
    margin-left:10px;
    margin-right:10px;
    font-size: 14px; }
    #sidebar3 ul li > ul {
      margin-left: 10px; }
      #sidebar3 ul li > ul li {
        font-size: 14px; }
    #sidebar3 ul li a {
      text-decoration: none;
      padding: 15px 30px;
      display: block;
      color:white;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1); }
      #sidebar3 ul li a:hover {
        color: #fff;
        background: teal;
        border-radius:15px;}

.card-body3 {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 0.5rem;
}

.pro-img3 {
    margin-bottom: 20px;
    margin-top: 20px;

}

.little-profile3 .pro-img3 img {
    width: 160px;
    height: 160px;
    -webkit-box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    border-radius: 100%;
}


#content2 h1, h2, h3, h4, h5, h6{
  color:lightgray;
}
</style>

<div id="sidebar3" class="order-first" style="background-color:rgba(92, 92, 92, 0.5);">
    <div class="">
		<ul class="list-unstyled components mb-5 text-center">
			<li>
				<div class="card-body3 little-profile3">
					<div class="pro-img3 align-center"> 
	                	<img src="images/profile_icon1.jfif" alt="user">
	                </div> 
            	</div>
            </li>

			<li> 
        <div class="sidenav-header">
          <span class="ms-1 font-weight-bold text-white" style="font-size:20px;">Administrator Dashboard</span>
        <hr class="horizontal light mt-0 mb-2">
				<h3 class="m-b-0" style="font-size:20px;color:#f9f9f9;"><?php echo "$admin_name"; ?></h3>
        </div>
      </li>
			
      <li>
        <a href="AdminDashboard.php">
          <div class="text-white me-2 d-flex align-items-center">
            <i class="material-icons opacity-10">dashboard</i>
            <span class="nav-link-text ms-1">Dashboard</span>
          </div>
        </a>			
      </li>
			
		  <li>
        <a href="AdminCreateNew.php">
          <div class="text-white me-2 d-flex align-items-center">
          <i class="material-icons opacity-10">person</i>
            <span class="nav-link-text ms-1">Create New Users</span>
          </div>
        </a>		
		  </li>

		  <li>
        <a href="AdminEditUser.php">
          <div class="text-white me-2 d-flex align-items-center">
            <i class="material-icons opacity-10">person</i>
            <span class="nav-link-text ms-1">Configure User Settings</span>
          </div>
        </a>		
		  </li>

		  <li>
        <a href="AdminAddSchedule.php">
          <div class="text-white me-2 d-flex align-items-center">
            <i class="material-icons opacity-10">table_view</i>
            <span class="nav-link-text ms-1">Add Department Schedule</span>
          </div>
        </a>		
		  </li>

		  <li>
        <a href="AdminEditSchedule.php">
          <div class="text-white me-2 d-flex align-items-center">
            <i class="material-icons opacity-10">receipt_long</i>
            <span class="nav-link-text ms-1">Edit Department Schedule</span>
          </div>
        </a>		
		  </li>
      <br/>

		</ul>
	</div>
</div>