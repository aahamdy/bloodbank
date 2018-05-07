<?php

    ob_start(); // Output Buffering Start
    session_start();

    if(isset($_SESSION['Username']) && $_SESSION['AdminLevel'] == 0){

        include 'init.php';

        $stmt = $con->prepare   ("  SELECT 
                                        SUM(Blood.Quantity) AS Quantity , BloodType.name As BloodType
                                    FROM 
                                        Blood, BloodType
                                    WHERE
                                        Blood.bloodTypeid = BloodType.id
                                    GROUP BY BloodType.name
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
                                            <th>Blood Group Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($rows as $row) {
?>
                                            <tr>
                                                <td><?php echo $row['BloodType']; ?></td>
                                                <td><?php echo $row['Quantity']; ?></td>
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