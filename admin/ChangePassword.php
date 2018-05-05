<?php

    ob_start(); // Output Buffering Start
    session_start();

    if(isset($_SESSION['Username'])){

        include 'init.php';
    
?>

        <div id="wrapper">
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row" id="main">

                        <!-- Page Heading -->
                        <div class="go-title">
                            <h3>Change Password</h3>
                            <div class="go-line"></div>
                        </div>
                        <!-- Page Content -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div id="response">

                                </div>
                                <form method="POST" action="#" class="form-horizontal form-label-left">
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Current Password
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="form-control col-md-7 col-xs-12" name="cpass" placeholder="Current Password" required="required" type="password">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slug"> New Password
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="form-control col-md-7 col-xs-12" name="newpass" placeholder="New Password" required="required" type="password">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number"> Re-Type New Password
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="form-control col-md-7 col-xs-12" name="renewpass" placeholder="Re-Type New Password" required="required" type="password">
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <button id="update_pass" type="submit" class="btn btn-success btn-block">Change Password</button>
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