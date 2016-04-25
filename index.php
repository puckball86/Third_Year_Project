<?php

 require_once 'header.php';
 /*
  * the homw page for the site
  */
 
 echo "<br><span class='main'>Welcome to $appname,";
 
 /*
  * checks if the user is logged in and displays what their status is
  */
 if ($loggedin)
 {
     echo " $user, you are already logged in.";
 }
 else{
     echo ' please sign up and/or log in to join in.';
 }
 
?>

        </span><br><br>
    </body>
</html>
