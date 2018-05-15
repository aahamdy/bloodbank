<?php 
session_start();
include 'init.php'; 


// Slect all the Countries

$stmt = $con->prepare   ("  SELECT 
                                BC.name AS hosbitalName , BT.name AS bloodType , B.Quantity, B.price, B.priceForHospital,
                                BC.address, Center.phone, Center.email, C.name AS Country, D.name AS District
                            FROM 
                                BloodCenter AS BC, Country AS C , BloodType AS BT, Blood AS B,
                                Center, Distirct AS D
                            WHERE
                                BC.countryid = C.id AND BC.districtid = D.id AND BC.registrationApproved = 1
                                AND B.bloodCenterid = BC.id AND B.bloodTypeid = BT.id AND Center.bloodCenterid = BC.id
                            ");

        $stmt->execute();
        $rows = $stmt->fetchAll();

?>



<div id="wrapper" class="go-section">
    <div class="row">
        <div class="container">
            <h2 class="text-center">Blood Banks</h2>
            <hr>
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Blood Type</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Price for Hospital</th>
                        <th>Address</th>
                        <th>District</th>
                        <th>Country</th>
                        <th>Phone</th>
                        <th>E-mail</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                    foreach ($rows as $row) {
                ?>
                    <tr>
                        <td><?php echo $row['hosbitalName']; ?></td>
                        <td><?php echo $row['bloodType']; ?></td>
                        <td><?php echo $row['Quantity']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['priceForHospital']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['District']; ?></td>
                        <td><?php echo $row['Country']; ?></td>                        
                        <td><?php echo '0' . $row['phone']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        
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
