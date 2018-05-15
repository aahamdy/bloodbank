<div class="theme2">

<div class="row">
        <div class="pull-left gologo">
            <a href="Home.php"><img class="img-responsive" src="layout/images/LOGO.png" alt="Blood Bank"></a>
        </div>

</div>

<nav class="navbar navbar-bootsnipp " role="navigation" id="nav_bar">
        
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="animbrand">
                    <div class="navbar-brand" href=""></div>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="Home.php" class="">Blood Banks</a></li>
                    <li><a href="Donation.php" class="">Donation</a></li>
                    
                    <?php if(!isset($_SESSION['Username'])){
                        echo '<li><a href="manager/login.php" class="">Login</a></li>';
                    }?>

                    <?php if(isset($_SESSION['Username'])){
                        echo '<li><a href="manager/logout.php" class="">Logout</a></li>';
                    }?>
                    
                    
                </ul>
            </div>
        </div>
    </nav>
