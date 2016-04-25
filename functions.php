<?php
/*
 * defing the host, database name, username, password and the applications name
 */

    
$dbhost = 'localhost';
$dbname = 'hostdb';
$dbuser = 'root';
$dbpass = "";
$appname = "ChatterBox";

/*
 * opens a connection and selects the database
 */
 $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if($connection->connect_error){ 
    die($connection->connect_error);   
}
/*
 * createTable checks if the table already exists and if not creates it
 */
function createTable($name, $query)
{
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table '$name' created or already exists.<br>";
}

/*
 * issues a query to MySQL
 * outputs an error mmessage if there is a failure
 */
function queryMysql($query)
{
    global $connection;
    
    $result = $connection->query($query);
    if(!$result){ 
        die($connection->error);
    }
    return $result;
}

/*
 * destroys a PHP session
 * clears its data to log out users
 */
function destroySession()
{
    $_SESSION=array();
    
    if(session_id() != "" || isset($_COOKIE[session_name()]))
    {
        setcookie(session_name(), '', time()-259200, '/');
    }    
    session_destroy();
    
}

/*
 * removes possible harmful code
 * and tags from user input
 */
function sanitizeString($var)
{
    global $connection;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $connection->real_escape_string($var);
}

/*
 * displays user profile picture and the "about me" message if present
 */
function showProfile($user)
{
    if(file_exists("$user.jpg"))
    {
        echo "<img src= '$user.jpg' style='float:left;'>";
    }
$result = queryMysql("SELECT * FROM profiles WHERE user='$user'");

    if($result->num_rows)
    {
        $row = $result->fetch_array(MYSQL_ASSOC);
        echo stripslashes($row['text']) . "<br style='clear:left;'><br>";
    }
}




