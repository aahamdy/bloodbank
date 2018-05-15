<?php 

/* 
=======================================================
== Template Page
=======================================================
*/

    ob_start(); // Output Buffering Start

    session_start();

    if(isset($_SESSION['Username']) && $_SESSION['AdminLevel'] == 0){

        include 'init.php';

        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

        if ($do == 'Manage') {          // Mange Page 

            $query = '';

            if (isset($_GET['page']) && $_GET['page'] == 'Pending') {

                $query = 'AND registrationApproved = 0';

            }

            $stmt = $con->prepare("SELECT * FROM Members WHERE adminLevel != 0 $query");
            $stmt->execute();
            $rows = $stmt->fetchAll();

            $stmt2 = $con->prepare("SELECT BloodCenter.name FROM BloodCenter, Members WHERE Members.bloodCenterid = BloodCenter.id");
            $stmt2->execute();
            $rows2 = $stmt2->fetchAll();
            ?>



            
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row" id="main">
                    <!-- Page Heading -->
                    <div class="go-title">
                        <div class="pull-right"><a href="members.php?do=Add"><div class="btn btn-primary"><i class="fa fa-plus"></i> Add New Admin</div></a></div>
                        <h3>Mange Members</h3>
                        <div class="go-line"></div>
                    </div>
                    <!-- Page Content -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div id="response">
                            </div>
                            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" id="example" width="100%">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Blood Center</th>
                                        <th>Control</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php
                                    foreach($rows as $row) {
                                        echo '<tr>';
                                            echo '<td>' . $row['id'] . '</td>';
                                            echo '<td>' . $row['fname'] . " " . $row['lname'] . '</td>';
                                            echo '<td>' . $row['email'] . '</td>';
                                            echo '<td>' . $row['phone'] . '</td>';
                                            echo '<td>' . $rows2[$row['id']-1]['name'] . '</td>';
                                            echo '<td>  
                                                <a href="members.php?do=Edit&userid='. $row['id'] .'" style="padding:5px" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="members.php?do=Delete&userid='. $row['id'] .'" style="padding:5px" class="btn btn-danger confirm"><i class="fa fa-close"></i> Delete</a> ';
                                                
                                                if($row['registrationApproved'] == 0) {
                                                    echo '<a href="members.php?do=Activate&userid='. $row['id'] .'" style="padding:5px" class="btn btn-info"><i class="fa fa-close"></i> Activate</a>';
                                                }

                                            echo '</td>';
                                        echo '</tr>';
                                    }
                        ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
    
<?php
    
        } elseif($do == 'Add') {        // Add New Admin Page 
            
            $stmt = $con->prepare(" SELECT 
                                        id, name    
                                    FROM 
                                        BloodCenter
                                    WHERE
                                        registrationApproved = 1
                                    ORDER BY
                                        name
                                    ");
            $stmt->execute();
            $rows = $stmt->fetchAll();

            
            ?>

            <div id="wrapper">  
                <div id="page-wrapper">
                    <div class="container-fluid">
                        <div class="row" id="main">

                            <!-- Page Heading -->
                            <div class="go-title">
                                <h3>Add New Admin</h3>
                                <div class="go-line"></div>
                            </div>
                            <!-- Page Content -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div id="response">
                                    </div>
                                    <form method="POST" action="?do=Insert" class="form-horizontal form-label-left">

                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Username
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" name="user" placeholder="Enter your Username" required="required" type="text">
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Password
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" name="pass" placeholder="Should be Long and Strong" required="required" type="password">
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> First Name
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" name="fname" placeholder="First Name" required="required" type="text">
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Last Name
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" name="lname" placeholder="Last Name" required="required" type="text">
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Email Address
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" name="email" placeholder="Admin Email" required="required"
                                                    type="email">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Phone Number
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" name="phone" placeholder="Admin Phone Number" required="required"
                                                    type="number">
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Blood Center
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control col-md-7 col-xs-12" name="center">

                                                <?php
                                                    foreach ($rows as $row) { ?>
                                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                                    <?php }
                                                ?>
                                            
                                            </select>
                                            </div>
                                        </div>

                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <button type="submit" class="btn btn-success btn-block">Add Admin</button>
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
        } elseif($do == 'Insert') {     // Insert Admin Page

            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                
                echo '<div id="wrapper">  
                        <div id="page-wrapper">
                            <div class="container-fluid">';
                echo '<h1 class="text-center">Insert Admin</h1>';
                // Get Variables From the Form

                $user       = $_POST['user'];
                $pass       = $_POST['pass'];
                $fname      = $_POST['fname'];
                $lname     = $_POST['lname'];
                $email      = $_POST['email'];
                $phone      = $_POST['phone'];
                $center     = $_POST['center'];
                $hashPass   = md5($pass);


                // Check If User Exist in Database

                $check  = checkItem("username","Members",$user);
                $check2 = checkItem("email","Members",$email);

                if ($check == 1) {

                    $theMsg = '<div class="alert alert-danger">Sorry This Username is Exists</div>';
                    redirectHome($theMsg, 'back');

                } elseif ($check2 == 1) {

                    $theMsg = '<div class="alert alert-danger">Sorry This Email is Exists</div>';
                    redirectHome($theMsg, 'back');
                
                }else {

                    // Insert User Info in Database

                    $stmt = $con->prepare(" INSERT INTO `Members`
                                                (`username`, `password`, `fname`, `lname`, `email`, `phone`, `bloodCenterid`, `adminLevel`, `registrationApproved`) 
                                            VALUES 
                                            (:user, :pass, :fname, :lname, :email, :phone, :center, 1 ,1)
                                        ");
                    $stmt->execute(array(
                        'user'      =>  $user,
                        'pass'      =>  $hashPass,
                        'fname'     =>  $fname,
                        'lname'     =>  $lname,
                        'email'     =>  $email,
                        'phone'     =>  $phone,
                        'center'    =>  $center
                    ));

                    // Echo Success Message

                    $theMsg = '<div class="alert alert-success">' . $stmt->rowCount() . ' Record Inserted</div>'; 
                    redirectHome($theMsg, 'back');
                }
                
            } else {

                echo '<div id="wrapper">  
                <div id="page-wrapper">
                    <div class="container-fluid">';

                echo '<h1 class="text-center">Insert Member</h1>';

                $theMsg =  "<div class='alert alert-danger'>Sorry You Cannot Browse This Page Directly</div>";
                redirectHome($theMsg, 'back');

                echo '          </div>
                        </div>
                    </div>
                    ';


            }
            
            echo '          </div>
                        </div>
                    </div>
                    ';
        
        } elseif($do == 'Edit') {            // Edit Admin Page

            // Check if the GET request userid is Numeric and get the Integer value of it 

            $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;

            // Select all the data depends on this id

            $stmt = $con->prepare   (" SELECT * FROM Members WHERE id = ? LIMIT 1 ");

            // Execute the Query

            $stmt->execute(array($userid));

            // Featch the data

            $row = $stmt->fetch();

            // The Row Count

            $count = $stmt->rowCount();

            // If there is Such ID Show the Form


            $stmt2 = $con->prepare(" SELECT 
                                        id, name    
                                    FROM 
                                        BloodCenter
                                    WHERE
                                        registrationApproved = 1
                                    ORDER BY
                                        name
                                    ");
            $stmt2->execute(array());
            $rows = $stmt2->fetchAll();


            if ($count > 0 ) {  ?>

                <div id="wrapper">  
                <div id="page-wrapper">
                    <div class="container-fluid">
                        <div class="row" id="main">

                            <!-- Page Heading -->
                            <div class="go-title">
                                <h3>Edit Admin</h3>
                                <div class="go-line"></div>
                            </div>
                            <!-- Page Content -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div id="response">
                                    </div>
                                    <form method="POST" action="?do=Update" class="form-horizontal form-label-left">
                                    <input type="hidden" name="userid" value="<?php echo $userid ?>">
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

                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Blood Center
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control col-md-7 col-xs-12" name="center">

                                                <?php
                                                    foreach ($rows as $row2) { 
                                                        
                                                        if($row2['id'] == $row['bloodCenterid']) { ?>
                                                            <option value="<?php echo $row2['id']; ?>" selected ><?php echo $row2['name']; ?></option>
                                                        <?php 
                                                        
                                                        } else {

                                                        ?>
                                                            <option value="<?php echo $row2['id']; ?>"><?php echo $row2['name']; ?></option>
                                                        <?php }

                                                    }
                                                ?>
                                            
                                            </select>
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
            
        } elseif($do == 'Update') {     // Update Admin Page

            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                
                echo '<div id="wrapper">  
                        <div id="page-wrapper">
                            <div class="container-fluid">';
                echo '<h1 class="text-center">Update Admin</h1>';

                // Get Variables From the Form

                $id         = $_POST['userid'];
                $pass       = $_POST['pass'];
                $fname      = $_POST['fname'];
                $lname      = $_POST['lname'];
                $email      = $_POST['email'];
                $phone      = $_POST['phone'];
                $center     = $_POST['center'];

                // Password Trick

                $pass = empty($_POST['newpassword']) ? $_POST['oldpassword'] : md5($_POST['newpassword']);

                // Update the Database with this Info

                $stmt = $con->prepare(" UPDATE Members SET 
                                            password = ?, fname = ?, lname = ?, email = ?, phone = ? , bloodCenterid = ? 
                                        WHERE 
                                            id = ?
                                    ");
                $stmt->execute(array($pass, $fname, $lname, $email, $phone, $center, $id));

                // Echo Success Message

                $theMsg = '<div class="alert alert-success">' . $stmt->rowCount() . ' Record Inserted</div>'; 
                redirectHome($theMsg, 'back');
                
            } else {

                echo '<div id="wrapper">  
                <div id="page-wrapper">
                    <div class="container-fluid">';

                echo '<h1 class="text-center">Insert Member</h1>';

                $theMsg =  '<div class="alert alert-danger">Sorry You Cannot Browse this Page Directly</div>';
                redirectHome($theMsg, 'back');

            }
            
            echo '          </div>
                        </div>
                    </div>
                    ';
    
        } elseif($do == 'Delete') {     // Delete Admin Page

            echo '<div id="wrapper">  
                    <div id="page-wrapper">
                        <div class="container-fluid">';

            echo            '<h1 class="text-center">Delete Admin</h1>';
 
             // Check if the GET request userid is Numeric and get the Integer value of it 
 
             $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;
 
             // Select all the data depends on this id
 
             $check = checkItem("id","Members",$userid);
 
             // If there is Such ID Show the Form
 
             if($check > 0) {
                 
                 $stmt = $con->prepare("DELETE FROM Members WHERE id = :id");
                 $stmt->bindParam(':id', $userid);
                 $stmt->execute();   
                 
                 $theMsg = '<div class="alert alert-success">' . $stmt->rowCount() . ' Record Deleted</div>'; 
                 redirectHome($theMsg, 'back');
 
             } else {
 
                 $theMsg = '<div class="alert alert-danger">This ID Is Not Exist</div>';
                 redirectHome($theMsg);
             
             }
             
             echo '          </div>
                        </div>
                    </div>
                    ';

        } elseif($do == 'Activate') {



            echo '<div id="wrapper">  
                    <div id="page-wrapper">
                        <div class="container-fluid">';

            echo            '<h1 class="text-center">Activate Admin</h1>';

            // Check if the GET request userid is Numeric and get the Integer value of it 

            $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;

            // Select all the data depends on this id

            $check = checkItem("id","Members",$userid);

            // If there is Such ID Show the Form

            if($check > 0) {
                
                $stmt = $con->prepare("UPDATE Members SET registrationApproved = 1 WHERE id = ?");
                $stmt->execute(array($userid));   
                
                $theMsg = '<div class="alert alert-success">' . $stmt->rowCount() . ' Record Activated</div>'; 
                redirectHome($theMsg, 'back');

            } else {

                $theMsg = '<div class="alert alert-danger">This ID Is Not Exist</div>';
                redirectHome($theMsg);
            
            }
            
            echo '          </div>
            </div>
        </div>
        ';

        }

        include $tpl . 'footer.php';

    } else {

        header('Location: ../Home.php');
        exit();

    } 

    ob_end_flush();

?>