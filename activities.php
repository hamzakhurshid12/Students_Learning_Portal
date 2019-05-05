<?php
session_start();
?>

<!doctype html>
<html class="fixed">

<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Data Table | Water Quality Monitoring</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

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
		<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

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
                generateSubHeader("Students Data");
                ?>
                <section class="panel">
                    <header class="panel-heading">
                        <div class="panel-actions">
                            <a href="#" class="fa fa-caret-down"></a>
                            <a href="#" class="fa fa-times"></a>
                        </div>

                        <h2 class="panel-title">Students Data</h2>
                    </header>
                    <div class="panel-body">
                        <table class="table table-bordered table-striped" id="datatable-ajax">
                            <thead>
                                <tr>
                                    <th width="16%">Date</th>
                                    <th width="16%">Student Name</th>
                                    <th width="16%">Age</th>
                                    <th width="16%">Class</th>
                                    <th width="16%">Pre-Test</th>
                                    <th width="16%">Post-Test</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "php/database_credentials.php";
                                include "php/database_methods.php";
                                $conn=mysqli_connect($GLOBALS["servername"],$GLOBALS["username"],$GLOBALS["password"],$GLOBALS["database"]);
                                $sql="select id,name,age,class from students where teacher_id=(select id from users where username='".$_SESSION["username"]."')";
                                $result=mysqli_query($conn,$sql);
                                if(mysqli_num_rows($result)>0){
                                    while($row=mysqli_fetch_assoc($result)){
                                        $date=get_single_attribute("select date from activities where student_id=".$row["id"],"date");
                                        $pre_image=get_single_attribute("select pre_image from activities where student_id=".$row["id"],"pre_image");
                                        $post_image=get_single_attribute("select post_image from activities where student_id=".$row["id"],"post_image");
                                        $teacher=get_single_attribute("select name from teachers where id = (select id from users where username='".$_SESSION["username"]."')","name");
                                        echo '<tr><td>'.$date.'</td><td>'.$row["name"].'</td><td>'.$row["age"].'</td><td>'.$row["class"].'</td><td><a target="_blank" href="'.$pre_image.'"><img style="max-height:50px;max-width:50px;" src="'.$pre_image.'"></a></td><td><a target="_blank" href="'.$post_image.'"><img style="max-height:50px;max-width:50px;" src="'.$post_image.'"></a></td></tr>';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </section>
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
		<script src="assets/vendor/select2/select2.js"></script>
		<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="assets/javascripts/tables/examples.datatables.ajax.js"></script>
</body>

</html>