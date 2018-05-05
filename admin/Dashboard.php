<?php

    ob_start(); // Output Buffering Start
    session_start();

    if(isset($_SESSION['Username'])){


        $loaderScript = '';
        include 'init.php';        
        
        ?>

        <div id="wrapper">
            <div id="page-wrapper">
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h3>Admin Dashboard</h3>
                    <div class="row" id="main">

                        <!-- Start Blood Quantity Panel -->

                        <div class="col-sm-6 col-md-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-sitemap fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="text-total">15</div>
                                            <p class="titles">Total Blood Quantity!</p>
                                        </div>
                                    </div>
                                </div>
                                <a class="panel-footer detail-link clearfix btn-block" href="BloodQuantity.php">
                                    <span class="pull-left">View All</span>
                                    <span class="pull-right">
                                        <i class="fa fa-chevron-circle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>

                        <!-- End Blood Quantity Panel -->

                        <!-- Start Admin Number Panel -->

                        <div class="col-sm-6 col-md-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-sitemap fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="text-total">15</div>
                                            <p class="titles">Total Blood Quantity!</p>
                                        </div>
                                    </div>
                                </div>
                                <a class="panel-footer detail-link clearfix btn-block" href="BloodQuantity.php">
                                    <span class="pull-left">View All</span>
                                    <span class="pull-right">
                                        <i class="fa fa-chevron-circle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>

                        <!-- End Admin Number Panal -->

                        <!-- Start Pending Admin Number Panal -->

                        <div class="col-sm-6 col-md-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-sitemap fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="text-total">15</div>
                                            <p class="titles">Total Blood Quantity!</p>
                                        </div>
                                    </div>
                                </div>
                                <a class="panel-footer detail-link clearfix btn-block" href="BloodQuantity.php">
                                    <span class="pull-left">View All</span>
                                    <span class="pull-right">
                                        <i class="fa fa-chevron-circle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>

                        <!-- End Pending Admin Number Panal -->
                    </div>
                    
                    <!-- Start Pi Chart -->

                    <div class="col-sm-6 col-md-4" id="piechart"></div>

                    <!-- End Pi Chart -->

                    <!-- Start Normal Chart -->

                    <div class="col-sm-6 col-md-4" id="chartContainer" style="height: 300px; width: 98%;"></div>

                    <!-- End Normal Chart -->
                    
                </div>
            </div>
        </div>


<?php 

        include $tpl . 'footer.php'; 

    } else {

        header('Location: login.php');
        exit();

    }

    ob_end_flush();


?>