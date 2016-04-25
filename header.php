<?php

session_start();

echo "<!DOCTYPE html>\n<html><head>";

require_once 'functions.php';

$userstr = ' (Guest)';

/*
 * checks if the session variable user is assigned a value
 * if it has a user has logged in and $loggedin is set to true
 */
if(isset($_SESSION['user']))
{
    $user = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr = "     $user";
}
else{ 
    $loggedin = FALSE;
}

echo  "<title>$appname$userstr</title>"
        . "<link rel='stylesheet' " ."href='styles.css' type='text/css'>" .
 "</head><body><center><canvas id='logo' width='624' " .
 "height='96'>$appname</canvas></center>" .
 "<div class='appname'>$appname$userstr</div>" .
 "<script src='javascript.js'></script>";
/*
 *When logged in the header bar layout is setup here 
 * The else statement is the layout befor the user is loggend in
 * giving them the options login/sign up
*/
if($loggedin)
{
    echo "<br ><ul class='menu'>" .
 "<li><a href='members.php?view=$user'>Home</a></li>" .
 "<li><a href='members.php'>Members</a></li>" .
 "<li><a href='friends.php'>Friends</a></li>" .
 "<li><a href='messages.php'>Messages</a></li>" .
 "<li><a href='profile.php'>Edit Profile</a></li>" .
 "<li><a href='logout.php'>Log out</a></li></ul><br>";
}else{
        echo("<br><ul class='menu'>" .
        "<li><a href='index.php'>Home</a></li>" .
        "<li><a href='signup.php'>Sign up</a></li>" .
        "<li><a href='login.php'>Log in</a></li></ul><br>" .
        "<span class='info'>&#8658; You must be logged in to " .
        "view this page.</span><br><br>");
    }




