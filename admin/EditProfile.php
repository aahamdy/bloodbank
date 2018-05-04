<?php

    include 'init.php';
    
?>

    <div id="wrapper">  
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row" id="main">

                    <!-- Page Heading -->
                    <div class="go-title">
                        <h3>Admin Profile</h3>
                        <div class="go-line"></div>
                    </div>
                    <!-- Page Content -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div id="response">
                            </div>
                            <form method="POST" action="#" class="form-horizontal form-label-left" enctype="multipart/form-data">

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> First Name
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control col-md-7 col-xs-12" name="name" placeholder="First Name" value="Genius" required="required" type="text">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Last Name
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control col-md-7 col-xs-12" name="name" placeholder="Last Name" value="Admin" required="required" type="text">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Email Address
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control col-md-7 col-xs-12" name="email" placeholder="Admin Email" value="admin@gmail.com" required="required"
                                            type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Phone Number
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control col-md-7 col-xs-12" name="phone" placeholder="Admin Phone Number" value="000 000 000" required="required"
                                            type="text">
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <button type="submit" class="btn btn-success btn-block">Update profile</button>
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
        <!-- /#page-wrapper -->
    </div>


<?php include $tpl . 'footer.php'; ?>