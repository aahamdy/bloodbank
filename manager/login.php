<?php 

    session_start();
    $noNavbar   = '';
    $loginstyle = '';

    if(isset($_SESSION['Username']) && $_SESSION['AdminLevel'] == 0){
        
        header('Location: Dashboard.php');  // Redirect to Manager Dashboard Page
    
    } elseif (isset($_SESSION['Username']) && $_SESSION['AdminLevel'] == 1){
        
        header('Location: ../admin/Dashboard.php');  // Redirect to Admin Dashboard Page
    
    }

    include 'init.php';

    // Check if user is Coming from HTTP POST Request

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $username   = $_POST['user'];
        $password   = $_POST['pass'];
        $hashedPass = md5($password);

        // Check if the User is Exist in the Database

        $stmt = $con->prepare   ("  SELECT 
                                        id, username, password, adminLevel 
                                    FROM 
                                        Members 
                                    WHERE
                                        username = ? 
                                    AND 
                                        password = ? 
                                    LIMIT 1
                                ");

        $stmt->execute(array($username, $hashedPass));
        $row = $stmt->fetch();
        $count = $stmt->rowCount();

        // If Count > 0 This Mean Database Contain Record About this Username

        if ($count > 0) {

            $_SESSION['Username'] = $username;              // Register Session Name
            $_SESSION['ID'] = $row['id'];                   // Register Session ID
            $_SESSION['AdminLevel'] = $row['adminLevel'];   // Register Addmin Level
            
            if(isset($_SESSION['Username']) && $_SESSION['AdminLevel'] == 0){
        
                header('Location: Dashboard.php');  // Redirect to Manager Dashboard Page
            
            } elseif (isset($_SESSION['Username']) && $_SESSION['AdminLevel'] == 1){
                
                header('Location: ../admin/Dashboard.php');  // Redirect to Admin Dashboard Page
            
            }

            exit();
            
        }


    }

?>

    <div class="container">
    <div class="info">
        <h1>Login Form</h1>
    </div>
    </div>
    <div class="form">
        <div class="thumbnail"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/></div>
        <form class="login-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <input type="text"      name="user" placeholder="Username" autocomplete="off" />
            <input type="password"  name="pass" placeholder="Password" autocomplete="new-password" />
            <button>login</button>
            <p class="message">Not registered? <a href="#">Create an account</a></p>
        </form>
    </div>   
    </form>


     
     

<?php include $tpl . 'footer.php'; ?>