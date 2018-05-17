<?php

    ob_start(); // Output Buffering Start
    session_start();
    $dashboard_admin='';
    
    if(isset($_SESSION['Username']) && $_SESSION['AdminLevel'] == 1){

        include 'init.php';

        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

        if ($do == 'Manage') {
            $stmt = $con->prepare(" SELECT * FROM Members WHERE id = ? LIMIT 1 ");

            // Execute the Query

            $stmt->execute(array($_SESSION['ID']));

            // Featch the data

            $row = $stmt->fetch();

            // The Row Count

            $count = $stmt->rowCount();

            if ($count > 0 ) {  ?>

                <div id="wrapper">  
                <div id="page-wrapper">
                    <div class="container-fluid">
                        <div class="row" id="main">

                            <!-- Page Heading -->
                            <div class="go-title">
                                <h3>Edit Profile</h3>
                                <div class="go-line"></div>
                            </div>
                            <!-- Page Content -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div id="response">
                                    </div>
                                    <form method="POST" action="?do=Update" class="form-horizontal form-label-left">
                                    <input type="hidden" name="userid" value="<?php echo $_SESSION['ID'] ?>">
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Password
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="hidden" name="oldpassword" value="<?php echo $row['password']?>" />
                                                <input class="form-control col-md-7 col-xs-12" name="newpassword" placeholder="Should be Long and Strong" type="password">
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> First Name
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" name="fname" placeholder="First Name" value="<?php echo $row['fname']?>" required="required" type="text">
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Last Name
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" name="lname" placeholder="Last Name" value="<?php echo $row['lname']?>" required="required" type="text">
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Email Address
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" name="email" placeholder="Admin Email" value="<?php echo $row['email']?>" required="required"
                                                    type="email">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Phone Number
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" name="phone" placeholder="Admin Phone Number" value="<?php echo $row['phone']?>" required="required"
                                                    type="number">
                                            </div>
                                        </div>

                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <button type="submit" class="btn btn-success btn-block">Save</button>
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


            <?php    
            } else {

                echo '<div id="wrapper">  
                <div id="page-wrapper">
                    <div class="container-fluid">';

                echo '<h1 class="text-center">Update Member</h1>';

                $theMsg =  "<div class='alert alert-danger'>There Is No Such ID</div>";
                redirectHome($theMsg, 'back');

                echo '          </div>
                        </div>
                    </div>
                    ';
            }

        } elseif ($do == 'Update') {        // Update Admin Page

                 if($_SERVER['REQUEST_METHOD'] == 'POST') {

                
                    echo '<div id="wrapper">  
                            <div id="page-wrapper">
                                <div class="container-fluid">';
                    echo '<h1 class="text-center">Update Admin</h1>';
    
                    // Get Variables From the Form
    
                    $id         = $_SESSION['ID'];
                    $pass       = $_POST['pass'];
                    $fname      = $_POST['fname'];
                    $lname      = $_POST['lname'];
                    $email      = $_POST['email'];
                    $phone      = $_POST['phone'];
    
                    // Password Trick
    
                    $pass = empty($_POST['newpassword']) ? $_POST['oldpassword'] : md5($_POST['newpassword']);
    
                    // Update the Database with this Info
    
                    $stmt = $con->prepare(" UPDATE Members SET 
                                                password = ?, fname = ?, lname = ?, email = ?, phone = ?
                                            WHERE 
                                                id = ?
                                        ");
                    $stmt->execute(array($pass, $fname, $lname, $email, $phone, $id));
    
                    // Echo Success Message
    
                    $theMsg = '<div class="alert alert-success">' . $stmt->rowCount() . ' Record Inserted</div>'; 
                    redirectHome($theMsg, 'back');
                    
                } else {
    
                    echo '<div id="wrapper">  
                    <div id="page-wrapper">
                        <div class="container-fluid">';
    
                    echo '<h1 class="text-center">Update Admin</h1>';
    
                    $theMsg =  '<div class="alert alert-danger">Sorry You Cannot Browse this Page Directly</div>';
                    redirectHome($theMsg, 'back');
    
                }
                
                echo '          </div>
                            </div>
                        </div>
                        ';

        }

        include $tpl . 'footer.php'; 

    } else {

        header('Location: login.php');
        exit();

    }

    ob_end_flush();
    
?>