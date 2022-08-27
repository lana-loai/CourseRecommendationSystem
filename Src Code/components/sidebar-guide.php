<style>
	/* Guide Styling */
#sidebar3 {
  border-radius: 20px;
  margin: 40px;
  min-height: 700px;
  min-width: 250px;
  max-width: 300px;
  color: #fff;
  -webkit-transition: all 0.3s;
  -o-transition: all 0.3s;
  transition: all 0.3s;
  position: relative;
  z-index: 0; }

  #sidebar3 ul.components {
    padding: 0; }
  #sidebar3 ul li {
    font-size: 16px; }
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
        background:steelblue;}

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
		<ul class="list-unstyled components mb-5 text-center shadow-lg">
			<li>
				<div class="card-body3 little-profile3">
					<div class="pro-img3 align-center"> 
	                	<img src="images/profile_icon1.jfif" alt="user">
	                </div> 
            	</div>
            </li>

			<li> 
				<h3 class="m-b-0" style="font-size:20px;"><?php echo "Counselor ID : ".$gc_id; ?></h3>
      </li>
			
      <li>
        <p style="font-size:13px;"> Department of <?php echo $department['dept_name_full']; ?> <br/>
			</li>
			
		  <li>
		    <a href="GCProfile.php"> Profile</a>
		  </li>

		  <li>
		    <a href="GCStdList.php"> Students </a>
		  </li>


		</ul>
	</div>
</div>
