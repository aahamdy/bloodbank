
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <!-- <span class="sr-only">Toggle navigation</span> -->
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="Dashboard.php">
                    <img class="logo" src="layout/images/LOGO.png" alt="LOGO">
                </a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><?php 
                            if(isset($_SESSION['Username'])){
                                echo $_SESSION['Username'] . ' ';
                            } else {
                                echo "Admin ";
                            }?><b class="fa fa-angle-down"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="EditProfile.php">
                                <i class="fa fa-fw fa-user"></i> Edit Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php">
                                <i class="fa fa-fw fa-power-off"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="Dashboard.php">
                            <i class="fa fa-fw fa-home"></i> Dashboard</a>
                    </li>

                    <li>
                        <a href="BloodQuantity.php">
                            <i class="fa fa-fw fa-sitemap"></i> Blood Quantity</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

