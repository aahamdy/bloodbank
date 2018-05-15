<?php
    ob_start(); // Output Buffering Start
    session_start();

    $dashboard_admin='';

    if(isset($_SESSION['Username']) && $_SESSION['AdminLevel'] == 1){

        include 'init.php';

        $stmt = $con->prepare   ("  SELECT 
                                        Blood.bloodCenterid, Blood.Quantity, Blood.price, Blood.priceForHospital, BloodType.name As BloodType, BloodType.id As Bloodid
                                    FROM 
                                        Blood, BloodType
                                    WHERE
                                        Blood.bloodCenterid = (SELECT Members.bloodCenterid FROM Members WHERE Members.id = ?) && Blood.bloodTypeid = BloodType.id
                                ");

        $stmt->execute(array($_SESSION['ID']));
        $rows = $stmt->fetchAll();
?>

        <div id="wrapper">
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row" id="main">
                        <!-- Page Heading -->
                        <div class="go-title">
                            <h3>Blood Quantity</h3>
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
                                            <th>Blood Group Name</th>
                                            <th>Blood Quantity (Liter)</th>
                                            <th>Price for Individuals (LE)</th>
                                            <th>Price for Hospitals (LE)</th>
                                            <th>Controls</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($rows as $row) {
?>
                                            <tr>
                                                <td><?php echo $row['BloodType']; ?></td>
                                                <td><?php echo $row['Quantity'];?></td>
                                                <td><?php echo $row['price']; ?></td>
                                                <td><?php echo $row['priceForHospital']; ?></td>
                                                <td><a href="Edit.php?btype=<?php echo $row['Bloodid'];?>" style="padding:3px 7px" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a></td>
                                            </tr>
<?php
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
    
        include $tpl . 'footer.php'; 

    } else {

        header('Location: login.php');
        exit();

    }

?>