<?php
/*
@Title 		: Parcel Management System
@Filename 	: courier.php
@Author		: Fit3
@date		: 13-11-16
refdashboard : http://themestruck.com/download-file/?theme-name=harmony

*/
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
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li class=""><a href="parcel.php">New Parcel</a></li>
             <li class=""><a href="parcelByPtj.php">New Parcel By PTJ</a></li>
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