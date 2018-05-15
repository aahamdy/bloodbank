<?php 

# Title Function that Echo the page title in case this page has variable $pageTitle
# and Echo Defult Title for others

function getTitle () {
    
    global $pageTitle;

    if(isset($pageTitle)) {

        echo $pageTitle;
    
    } else {
        
        echo 'Default Title';
    
    }

}


/*
** Home Redirect Function
** $theMsg = Echo The Message
** $url = The Redirect link
** $seconds = Seconds Before Redirecting
*/

function redirectHome ($theMsg, $url = null, $seconds = 3){

    if ($url === null) {
        $url = '../Home.php';
        $link = 'Homepage';
    } else {

        if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '') {
            $url = $_SERVER['HTTP_REFERER'];
            $link = 'Previous Page';
        } else {
            $url = '../Home.php';
            $link = 'Homepage';
        }
    }

    echo $theMsg;
    echo "<div class='alert alert-info'>You Will Be Redirected to $link After $seconds Seconds.</div>";
    header("refresh:$seconds;url=$url");
    exit();
}


/*
** Function to Check Item in Database
** $select = The Iteam to Select [Ex: user, item, category]
** $from = The Table to select From [Ex: users, iteams, categories]
** $value = The Value of Select
*/

function checkItem ($select, $from, $value) {

    global $con;

    $statement = $con->prepare("SELECT $select FROM $from WHERE $select = ?");
    $statement->execute(array($value));
    $count = $statement->rowCount();

    return $count;

}

/*
** Count Number of Iteam Function v1.0
** Function to Count Number of Item Rows 
** $item = The Iteam to Count
** $table = The Table to Choose From
*/

function countItems($item, $table) {

    global $con;

    $stmt2 = $con->prepare("SELECT COUNT($item) FROM $table");
    $stmt2->execute();

    return $stmt2->fetchColumn();

}

/*
** Get Latest Records Function v1.0
** Function To Get Latest Items From Database 
** $select = Field to Select
** $table = The Table To Choose From
** $order = The Descending Ordering 
** $limit = Number of Recordes to Get
*/

function getLatest($select, $table, $order, $limit = 5) {

    global $con;

    $stmt = $con->prepare("SELECT $select FROM $table ORDER BY $order DESC LIMIT $limit");
    $stmt->execute();
    $rows = $stmt->fetchAll();

    return $rows;
}