<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header("location:index.php");
	}
	$username = $_SESSION['username'];
	$user = null;
	if(!isset($_GET['q'])){
		$user=$username;
	}else{
		$user = $_GET['q'];
    }
    
    $_SESSION["start"]=0;
	
?>

<!doctype html>
<html class="fixed">

<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>Home | Water Quality Monitoring</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="JSOFT Admin - Responsive HTML5 Template">
    <meta name="author" content="JSOFT.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
    <link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
    <link rel="stylesheet" href="assets/vendor/morris/morris.css" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="assets/stylesheets/theme.css" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

    <!-- Head Libs -->
    <script src="assets/vendor/modernizr/modernizr.js"></script>

</head>

<body>
    <section class="body">

    <?php 
    //Creating the header
    include "php/header.php";
    generateHeader();
    ?>
        <div class="inner-wrapper">
    <?php
    include "php/sidebar.php";
    generateSidebar();
    ?>

            <section role="main" class="content-body">
                <?php
                generateSubHeader("home");
                ?>

                <div class="row">
                <div class="col-md-13 ui-sortable" data-plugin-portlet="" id="portlet-1" style="min-height: 150px;">
							<section class="panel panel-primary" id="panel-1" data-portlet-item="" style="opacity: 1;">
								<header class="panel-heading portlet-handler">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Welcome to The Students Learning Portal</h2>
								</header>
								<div class="panel-body" style="display: block;">
                                    This Portal is the part of our Project of Software Construction Course. 
                                    It has the following features as of now,<br>
                                    1. Three different types of user accounts (Admin/Teachers/Students)<br>
                                    2. Teachers can add Students, and their performances.<br>
                                    3. Admin can add teachers.<br>
                                    4. Students can login and see their performances on the tests they performed.<br>
                                    5. Pictures of students performa can be uploaded by Teachers.<br>
                                    6. Database maintains all the records.<br>
								</div>
							</section>
						</div>
                </div> 
                <?php
                include "php/database_methods.php";
                $name=get_single_attribute("select name from teachers where id = (select id from users where username='".$_SESSION["username"]."')","name");
                $school=get_single_attribute("select school from teachers where id = (select id from users where username='".$_SESSION["username"]."')","school");
                $qualification=get_single_attribute("select qualification from teachers where id = (select id from users where username='".$_SESSION["username"]."')","qualification");
                echo '<section class="panel">
                <header class="panel-heading bg-tertiary">
                    <div class="panel-heading-profile-picture">
                        <img src="assets/images/apple-touch-icon-precomposed.png">
                    </div>
                </header>
                <div class="panel-body">
                    <h4 class="text-semibold mt-sm">'.$name.'</h4>
                    <p>School Name: <b>'.$school.'</b></p>
                    <p>Teacher Qualification: <b>'.$qualification.'</b></p>
                    <hr class="solid short">
                    <p><a href="#"><i class="fa fa-user mr-xs"></i> Add Students data</a></p>
                    <p><a href="#"><i class="fa fa-lock mr-xs"></i> View Your Students</a></p>
                    <p><a href="php/logout.php"><i class="fa fa-power-off mr-xs"></i> Logout</a></p>
                </div>
            </section>';
                ?>   
            </section>
            
        </div>
    </section>

    <!-- Vendor -->
    <script src="assets/vendor/jquery/jquery.js"></script>
    <script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
    <script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
    <script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
    <script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

    <!-- Specific Page Vendor -->
    <script src="assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
    <script src="assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
    <script src="assets/vendor/jquery-appear/jquery.appear.js"></script>
    <script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
    <script src="assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
    <script src="assets/vendor/flot/jquery.flot.js"></script>
    <script src="assets/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
    <script src="assets/vendor/flot/jquery.flot.pie.js"></script>
    <script src="assets/vendor/flot/jquery.flot.categories.js"></script>
    <script src="assets/vendor/flot/jquery.flot.resize.js"></script>
    <script src="assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>
    <script src="assets/vendor/raphael/raphael.js"></script>
    <script src="assets/vendor/morris/morris.js"></script>
    <script src="assets/vendor/gauge/gauge.js"></script>
    <script src="assets/vendor/snap-svg/snap.svg.js"></script>
    <script src="assets/vendor/liquid-meter/liquid.meter.js"></script>
    <script src="assets/vendor/jqvmap/jquery.vmap.js"></script>
    <script src="assets/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
    <script src="assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
    <script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
    <script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
    <script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
    <script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
    <script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
    <script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="assets/javascripts/theme.js"></script>

    <!-- Theme Custom -->
    <script src="assets/javascripts/theme.custom.js"></script>

    <!-- Theme Initialization Files -->
    <script src="assets/javascripts/theme.init.js"></script>


    <!-- Examples -->
    <script src="assets/javascripts/dashboard/examples.dashboard.js"></script>
</body>

</html>