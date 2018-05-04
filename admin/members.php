<?php 

/* 
=======================================================
== Template Page
=======================================================
*/

    ob_start(); // Output Buffering Start

    session_start();

    if(isset($_SESSION['Username'])){

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
                        <div class="pull-right"><a href="#"><div class="btn btn-primary"><i class="fa fa-plus"></i> Add New Admin</div></a></div>
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
    
        } elseif($do == 'Add') {

        } elseif($do == 'Insert') {

        } elseif($do == 'Edit') {

        } elseif($do == 'Update') {

        } elseif($do == 'Delete') {

        } elseif($do == 'Activate') {

        }

        include $tpl . 'footer.php';

    } else {

        header('Location: main.php');
        exit();

    }

    ob_end_flush();

?>