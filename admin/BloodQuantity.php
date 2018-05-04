<?php

    include 'init.php';
    
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
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>A+</td>
                                        <td>3</td>
                                        <td>
                                            <form method="POST" action="#">
                                                <a href="Edit.html" class="btn btn-primary btn-xs">
                                                    <i class="fa fa-edit"></i> Edit </a>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>B+</td>
                                        <td>6</td>
                                        <td>
                                            <form method="POST" action="#">
                                                <a href="Edit.html" class="btn btn-primary btn-xs">
                                                    <i class="fa fa-edit"></i> Edit </a>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>O+</td>
                                        <td>4</td>
                                        <td>
                                            <form method="POST" action="#">
                                                <a href="Edit.html" class="btn btn-primary btn-xs">
                                                    <i class="fa fa-edit"></i> Edit </a>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>AB+</td>
                                        <td>1</td>
                                        <td>
                                            <form method="POST" action="#">
                                                <a href="Edit.html" class="btn btn-primary btn-xs">
                                                    <i class="fa fa-edit"></i> Edit </a>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>A-</td>
                                        <td>8</td>
                                        <td>
                                            <form method="POST" action="#">
                                                <a href="Edit.html" class="btn btn-primary btn-xs">
                                                    <i class="fa fa-edit"></i> Edit </a>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>B-</td>
                                        <td>13</td>
                                        <td>
                                            <form method="POST" action="#">
                                                <a href="Edit.html" class="btn btn-primary btn-xs">
                                                    <i class="fa fa-edit"></i> Edit </a>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>O-</td>
                                        <td>9</td>
                                        <td>
                                            <form method="POST" action="#">
                                                <a href="Edit.html" class="btn btn-primary btn-xs">
                                                    <i class="fa fa-edit"></i> Edit </a>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>AB-</td>
                                        <td>7</td>
                                        <td>
                                            <form method="POST" action="#">
                                                <a href="Edit.html" class="btn btn-primary btn-xs">
                                                    <i class="fa fa-edit"></i> Edit </a>
                                            </form>
                                        </td>
                                    </tr>
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

<?php include $tpl . 'footer.php'; ?>