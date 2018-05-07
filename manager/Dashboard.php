<?php

    ob_start(); // Output Buffering Start
    session_start();

    if(isset($_SESSION['Username']) && $_SESSION['AdminLevel'] == 0){


        $loaderScript = '';
        include 'init.php';        
        
        // Total Blood Quantity Query

        $stmt = $con->prepare   ("  SELECT 
                                        SUM(Blood.Quantity) AS Quantity
                                    FROM 
                                        Blood, BloodType
                                    WHERE
                                        Blood.bloodTypeid = BloodType.id
                                ");

        $stmt->execute();
        $row = $stmt->fetch();
                    
        // Total Number of Admins Query

        $stmt2 = $con->prepare   (" SELECT 
                                        COUNT(id) AS AllMembers
                                    FROM 
                                        Members
                                ");

        $stmt2->execute();
        $row2 = $stmt2->fetch();

        // Number of Pending Admins Query

        $stmt3 = $con->prepare   (" SELECT 
                                        COUNT(id) AS PendingMembers
                                    FROM 
                                        Members
                                    WHERE 
                                        registrationApproved = 0
                                ");

        $stmt3->execute();
        $row3 = $stmt3->fetch();

        // Number of Fixed Blood Centers Query

        $stmt4 = $con->prepare   (" SELECT 
                                        COUNT(id) AS FixedCenters
                                    FROM 
                                        BloodCenter, Center
                                    WHERE
                                        BloodCenter.id = Center.bloodCenterid
                                ");

        $stmt4->execute();
        $row4 = $stmt4->fetch();

        // Number of Fixed Blood Centers Query

        $stmt6 = $con->prepare   (" SELECT 
                                        COUNT(id) AS FixedCenters
                                    FROM 
                                        BloodCenter, Center
                                    WHERE
                                        BloodCenter.id = Center.bloodCenterid && BloodCenter.registrationApproved = 0
                                ");

        $stmt6->execute();
        $row6 = $stmt6->fetch();

        // Number of All Mobile Blood Centers Query

        $stmt8 = $con->prepare   (" SELECT 
                                        COUNT(id) AS MobileCenters
                                    FROM 
                                        BloodCenter
                                    WHERE
                                        BloodCenter.bloodCenterTypeid = 2
                                ");

        $stmt8->execute();
        $row8 = $stmt8->fetch();

        // Number of All Mobile Blood Centers Query

        $stmt9 = $con->prepare   (" SELECT 
                                        COUNT(id) AS PendingMobileCenters
                                    FROM 
                                        BloodCenter
                                    WHERE
                                        BloodCenter.bloodCenterTypeid = 2 && BloodCenter.registrationApproved = 0
                                ");

        $stmt9->execute();
        $row9 = $stmt9->fetch();

        // Blood Type and Quanitiy Query

        $stmt5 = $con->prepare   ("  SELECT 
                                        SUM(Blood.Quantity) AS Quantity , BloodType.name As BloodType
                                    FROM 
                                        Blood, BloodType
                                    WHERE
                                        Blood.bloodTypeid = BloodType.id
                                    GROUP BY BloodType.name
                                ");

        $stmt5->execute();
        $row5 = $stmt5->fetchAll();

?>

        <div id="wrapper">
            <div id="page-wrapper">
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h3>Admin Dashboard</h3>
                    <div class="row" id="main">

                        <!-- Start Blood Quantity Panel -->

                        <div class="col-sm-12 col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-sitemap fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="text-total"><?php echo $row['Quantity']; ?></div>
                                            <p class="titles">Total Blood Quantity</p>
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

                        <div class="col-sm-6 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-sitemap fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="text-total"><?php echo $row2['AllMembers']; ?></div>
                                            <p class="titles">Total Admins</p>
                                        </div>
                                    </div>
                                </div>
                                <a class="panel-footer detail-link clearfix btn-block" href="members.php">
                                    <span class="pull-left">View All</span>
                                    <span class="pull-right">
                                        <i class="fa fa-chevron-circle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>

                        <!-- End Admin Number Panal -->

                        <!-- Start Pending Admin Number Panal -->

                        <div class="col-sm-6 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-sitemap fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="text-total"><?php echo $row3['PendingMembers']; ?></div>
                                            <p class="titles">Pending Admins</p>
                                        </div>
                                    </div>
                                </div>
                                <a class="panel-footer detail-link clearfix btn-block" href="members.php?do=Manage&page=Pending">
                                    <span class="pull-left">View All</span>
                                    <span class="pull-right">
                                        <i class="fa fa-chevron-circle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>

                        <!-- End Pending Admin Number Panal -->

                        <!-- Start Fixed Centers Panal -->

                        <div class="col-sm-6 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-sitemap fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="text-total"><?php echo $row4['FixedCenters']; ?></div>
                                            <p class="titles">Fixed Blood Centers</p>
                                        </div>
                                    </div>
                                </div>
                                <a class="panel-footer detail-link clearfix btn-block" href="fixedcenters.php">
                                    <span class="pull-left">View All</span>
                                    <span class="pull-right">
                                        <i class="fa fa-chevron-circle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>

                        <!-- End Fixed Centers Panal -->

                        <!-- Start Fixed Centers Panal -->

                        <div class="col-sm-6 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-sitemap fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="text-total"><?php echo $row6['FixedCenters']; ?></div>
                                            <p class="titles">Pending Fixed Blood Centers</p>
                                        </div>
                                    </div>
                                </div>
                                <a class="panel-footer detail-link clearfix btn-block" href="fixedcenters.php?do=Manage&page=Pending">
                                    <span class="pull-left">View All</span>
                                    <span class="pull-right">
                                        <i class="fa fa-chevron-circle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>

                        <!-- End Fixed Centers Panal -->

                        <!-- Start Mobile Centers Panal -->

                        <div class="col-sm-6 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-sitemap fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="text-total"><?php echo ($row8['MobileCenters']); ?></div>
                                            <p class="titles">Mobile Blood Centers</p>
                                        </div>
                                    </div>
                                </div>
                                <a class="panel-footer detail-link clearfix btn-block" href="mobilecenters.php">
                                    <span class="pull-left">View All</span>
                                    <span class="pull-right">
                                        <i class="fa fa-chevron-circle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>

                        <!-- End Mobile Centers Panal -->

                        <!-- Start Pending Mobile Centers Panal -->

                        <div class="col-sm-6 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-sitemap fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="text-total"><?php echo ($row9['PendingMobileCenters']); ?></div>
                                            <p class="titles">Pending Mobile Blood Centers</p>
                                        </div>
                                    </div>
                                </div>
                                <a class="panel-footer detail-link clearfix btn-block" href="mobilecenters.php?do=Manage&page=Pending">
                                    <span class="pull-left">View All</span>
                                    <span class="pull-right">
                                        <i class="fa fa-chevron-circle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>

                        <!-- End Pending Mobile Centers Panal -->

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