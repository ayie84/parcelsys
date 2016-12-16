<?php
/*
@Title 		: Parcel Management System
@Filename 	: courier.php
@Author		: Restu Lestari Resources
@date		: 13-11-16
refdashboard : http://themestruck.com/download-file/?theme-name=harmony

*/

// Start Session
// Comment this line to off the authentication session	
	session_start();
		
		// if session is not set this will redirect to login page
		 if( !isset($_SESSION['SESS_MEMBER_ID']) ) {
		  header("Location: index.php");
		  exit;
		 }
 // End Session


include 'inc/function.php';
//auth();
debugScript();//comment this line to debug
con2db();
pageTitle("PMS Dashboard");
include 'inc/header.php';
list($total,$nottaken,$taken)=parcelCalc();
?>

    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
           <!-- <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            --> 
            <li class=""><a href="parcel.php">Register Parcel</a></li>
             <li class=""><a href="parcelByPtj.php">Register Parcel By PTJ</a></li>
             <li class=""><a href="parcelBulk.php">Register Parcel Bulk</a></li>
          </ul>
        <!--  <ul class="nav nav-sidebar">
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
          </ul> -->
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>

         
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-body bk-primary text-light">
							<div class="stat-panel text-center">
								<div class="stat-panel-number h1 "><?php echo $total; ?></div>
								<div class="stat-panel-title text-uppercase">Total Parcel Today</div>
							</div>
						</div>	
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-body bk-primary text-light">
							<div class="stat-panel text-center">
								<div class="stat-panel-number h1 "><?php echo $taken ; ?></div>
								<div class="stat-panel-title text-uppercase">Total Parcel Taken</div>
							</div>
						</div>	
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-body bk-primary text-light">
							<div class="stat-panel text-center">
								<div class="stat-panel-number h1 "><?php echo $nottaken; ?></div>
								<div class="stat-panel-title text-uppercase">Total Parcel Balance</div>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>
						


          <!--<h2 class="sub-header">Chart</h2>-->
          <div class="table-responsive">
            <?php //include 'chartParcelByPtj.php'; ?>
          </div>
        </div>
      </div>


<?php

 
include 'inc/footer.php';
?>