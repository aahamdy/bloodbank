<?php 

    session_start();
    $noNavbar   = '';

    if(isset($_SESSION['Username'])){
        header('Location: Dashboard.php');  // Redirect to Dashboard Page
    }    

    include 'init.php';

    // Check if user is Coming from HTTP POST Request

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $username   = $_POST['user'];
        $password   = $_POST['pass'];
        $hashedPass = md5($password);

        // Check if the User is Exist in the Database

        $stmt = $con->prepare   ("  SELECT 
                                        id, username, password 
                                    FROM 
                                        Members 
                                    WHERE
                                        username = ? 
                                    AND 
                                        password = ? 
                                    AND 
                                        adminLevel = 0
                                    LIMIT 1
                                ");

        $stmt->execute(array($username, $hashedPass));
        $row = $stmt->fetch();
        $count = $stmt->rowCount();

        // If Count > 0 This Mean Database Contain Record About this Username

        if ($count > 0) {

            $_SESSION['Username'] = $username;  // Register Session Name
            $_SESSION['ID'] = $row['id'];   // Register Session ID 
            header('Location: Dashboard.php');  // Redirect to Dashboard Page
            exit();
            
        }


    }

?>

    
    <form class="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <h4 class="text-center">Admin Login</h4>
        <input class="form-control" type="text"      name="user" placeholder="Username" autocomplete="off" />
        <input class="form-control" type="password"  name="pass" placeholder="Password" autocomplete="new-password" />
        <input class="btn btn-primary btn-block" type="submit"    value= "Login">
    </form>


<?php include $tpl . 'footer.php'; ?>