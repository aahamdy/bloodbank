<?php

    ob_start(); // Output Buffering Start
    session_start();
    $dashboard_admin='';
    
    if(isset($_SESSION['Username']) && $_SESSION['AdminLevel'] == 1){

        include 'init.php';

        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
        
        if ($do == 'Manage') {

        $stmt = $con->prepare   ("  SELECT 
                                        Blood.Quantity, Blood.price, Blood.priceForHospital, BloodType.name As BloodType
                                    FROM 
                                        Blood, BloodType
                                    WHERE
                                        Blood.bloodCenterid = (SELECT Members.bloodCenterid FROM Members WHERE Members.id = ?) && Blood.bloodTypeid = BloodType.id
                                        AND BloodType.id = ?
                                ");

        $stmt->execute(array($_SESSION['ID'], $_GET['btype']));
        $rows = $stmt->fetch();


?>  

        <div id="wrapper">
            <div id="page-wrapper">
                <div class="container-fluid">
              
                    <div class="row" id="main">

                        <!-- Page Heading -->
                        <div class="go-title">
                            <div class="pull-right">
                                <a href="BloodQuantity.php" class="btn btn-default btn-back">
                                    <i class="fa fa-arrow-left"></i> Back</a>
                            </div>
                            <h3>Edit Blood Quantity</h3>
                            <div class="go-line"></div>
                        </div>
                        <!-- Page Content -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div id="response"></div>
                                <form method="POST" action="?do=Insert" class="form-horizontal form-label-left">
                                <input type="hidden" name="bloodid" value="<?php echo $_GET['btype'] ?>">
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Blood Group Name
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12" name="type" value="<?php echo $rows['BloodType'];?>" required="required" type="text" readonly>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Blood Quantity
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="slug" class="form-control col-md-7 col-xs-12" name="quantity" value="<?php echo $rows['Quantity'];?>" placeholder="Quantity Of The Blood Type"
                                                required="required" type="text">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Price for Individuals
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="slug" class="form-control col-md-7 col-xs-12" name="price" value="<?php echo $rows['price'];?>" required="required" type="text">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Price for Hospitals
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="slug" class="form-control col-md-7 col-xs-12" name="priceforh" value="<?php echo $rows['priceForHospital'];?>" required="required" type="text">
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <button type="submit" class="btn btn-success btn-block">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>


<?php 
        }  elseif($do == 'Insert') {     // Edit Admin Page

            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                
                echo '<div id="wrapper">  
                        <div id="page-wrapper">
                            <div class="container-fluid">';
                echo '<h1 class="text-center">Edit Blood Center</h1>';
                // Get Variables From the Form

                $quantity   = $_POST['quantity'];
                $price      = $_POST['price'];
                $priceforh  = $_POST['priceforh'];
                $bloodid    = $_POST['bloodid'];

                // Insert User Info in Database

                $stmt = $con->prepare("  UPDATE
                                            Blood 
                                        SET 
                                            Quantity = ?, price = ?, priceForHospital = ?
                                        WHERE 
                                            Blood.bloodCenterid =  (SELECT Members.bloodCenterid FROM Members WHERE Members.id = ?)
                                            AND Blood.bloodTypeid = (SELECT BloodType.id FROM BloodType WHERE BloodType.id = ?)
        ");
                $stmt->execute(array($quantity, $price, $priceforh, $_SESSION['ID'] ,$bloodid));

                // Echo Success Message
            
                $theMsg = '<div class="alert alert-success"> Record Updated</div>'; 
                redirectHome($theMsg, 'back');
            } else {

                echo '<div id="wrapper">  
                <div id="page-wrapper">
                    <div class="container-fluid">';

                echo '<h1 class="text-center">Edit Blood Center</h1>';

                $theMsg =  '<div class="alert alert-danger">Sorry You Cannot Browse this Page Directly</div>';
                redirectHome($theMsg, 'back');

            }
            
            
            echo '          </div>
                        </div>
                    </div>
                    ';
        
        }  else {

            header('Location: ../Home.php');
            exit();
        }
    include $tpl . 'footer.php';
    }

?>