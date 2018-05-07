<?php

    ob_start(); // Output Buffering Start
    session_start();

    if(isset($_SESSION['Username']) && $_SESSION['AdminLevel'] == 1){

        include 'init.php';
    
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
                                <form method="POST" action="#" class="form-horizontal form-label-left">
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Blood Group Name
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12" name="name" value="A+" required="required" type="text" readonly>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slug">Blood Quantity
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="slug" class="form-control col-md-7 col-xs-12" name="slug" value="a+" placeholder="Quantity Of The Blood Type"
                                                required="required" type="text">
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <button type="submit" class="btn btn-success btn-block">Update Blood Quantity</button>
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

        include $tpl . 'footer.php';

    } else {

        header('Location: login.php');
        exit();
        
    }

?>