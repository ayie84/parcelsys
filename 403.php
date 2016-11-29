<?php
/*
@Title 		: Parcel Management System
@Filename 	: 403.php
@Author		: Fit3
@date		: 13-11-16
*/
include 'inc/function.php';
debugScript(); //comment this line for debug error msg
pageTitle("Pages Not Found");
$navbar= '0';
include 'inc/header.php';
?>
     <!-- small navbar -->
        <nav class="navbar navbar-default navbar-fixed-top bootstrap-admin-navbar-sm" role="navigation">
            <div class="container">
                
            </div>
        </nav>

        <!-- content -->
        <div class="container-fluid spacer">
            <div class="row-fluid">
                <div class="col-lg-12">
                    <div class="centering text-center error-container">
                        <div class="text-center">
                            <h2 class="without-margin">Don't worry. It's <span class="text-warning"><big>403</big></span> error only.</h2>
                            <h4 class="text-warning">Access denied</h4>
                        </div>
                        <div class="text-center">
                            <h3><small>Choose an option below</small></h3>
                        </div>
                        <hr>
                        <ul class="pager">
                            
                            <li><a href="index.php">Index</a></li>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>   

<?php
include 'inc/footer.php';
?>