<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

  require_once 'header.php';
  
  if (isset($_SESSION['user']))
  {
    destroySession();
    header("Location: index.php");
  }
  else{
      echo "<div class='main'><br>" ."You are already logged out.";
  }
  
?>

    <br><br></div>
  </body>
</html>