<?php
include "php/amcharts.php";
?>
<!doctype html>
<html class="fixed">
<head>
<?php
getamChartsScripts();
?>
		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Data Charts | Water Quality Monitoring</title>
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
            <section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
						
										<h2 class="panel-title">Graph Inputs</h2>
									</header>
									<div class="panel-body">
										<form class="form-horizontal form-bordered" method="get">
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputSuccess">Data Source</label>
												<div class="col-md-6">
													<select class="form-control input-sm mb-md" id="sourceDropdown">
														<option value="S1">Source 1</option>
														<option value="S2">Source 2</option>
                                                        <option value="S3">Source 3</option>
                                                        <option value="S4">Source 4</option>
														<option value="S5">Source 5</option>
                                                        <option value="S6">Source 6</option>
                                                        <option value="S7">Source 7</option>
														<option value="S8">Source 8</option>
                                                        <option value="S9">Source 9</option>
                                                        <option value="S10">Source 10</option>
														<option value="S11">Source 11</option>
                                                        <option value="S12">Source 12</option>
                                                        <option value="Reservoir">Reservoir</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="col-md-3 control-label" for="inputSuccess">Data Type</label>
												<div class="col-md-6">
                                                <select class="form-control input-sm mb-md" id="typeDropdown">
														<option value="3">Temperature</option>
														<option value="4">Turbidity</option>
                                                        <option value="5">pH</option>
                                                        <option value="6">Alkilinity</option>
														<option value="7">Hardness (CaCO3)</option>
                                                        <option value="8">Conductance</option>
                                                        <option value="9">Calcium</option>
														<option value="10">Total Dissolved Solids</option>
                                                        <option value="11">Chlorides</option>
                                                        <option value="12">Nitrate (NO2)</option>
														<option value="13">Fecal Chloriform Count</option>
													</select>
                                                </div>
											</div>
										</form>
									</div>
                                </section>
                                
                                


                <?php
                generateSubHeader("Data Charts");
                ?>
                <div id="dataChart">
                    <?php 
                    getamChartsDiv(3, 'S2');
                    ?>
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
        

                
        <script>
        $("#sourceDropdown, #typeDropdown").change(function(){
            var source=$("#sourceDropdown option:selected").val();
            var type=$("#typeDropdown option:selected").val();
            $.ajax({url: "php/amcharts.php?index="+type+"&reservoir="+source, success: function(result){
                $("#dataChart").html(result);
                console.log(result);
            }});
        });
        </script>
</body>

</html>