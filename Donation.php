<?php 
session_start();
include 'init.php'; 


// Slect all the Countries

$stmt = $con->prepare   (" SELECT 
                                BC.name, BC.address, BC.fromTime, BC.toTime, C.name AS country, BCT.name AS type, D.name as district
                            FROM
                                BloodCenter AS BC, Country AS C, BloodCenterType AS BCT, Distirct AS D
                            WHERE
                                BC.countryid = C.id AND BC.bloodCenterTypeid = BCT.id AND BC.districtid = D.id AND 
                                BC.registrationApproved = 1
                        ");

        $stmt->execute();
        $rows = $stmt->fetchAll();
?>



<div id="wrapper" class="go-section">
    <div class="row">
        <div class="container">
            <h2 class="text-center">Donation</h2>
            <hr>
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>District</th>
                        <th>Country</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                    foreach ($rows as $row) {
                ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['district']; ?></td>
                        <td><?php echo $row['country']; ?></td>
                        <td><?php echo $row['fromTime']; ?></td>
                        <td><?php echo $row['toTime']; ?></td>
                        <td><?php echo $row['type']; ?></td>
                    </tr>
        <?php
            }
        ?>
            
            </tbody>
        </table>
        </div>
    </div>
</div>


</div>

<?php  include $tpl .'footer.php'; ?>
