<?php
session_start();

if(isset($_POST['logout'])) {
  session_start();
  session_destroy();

  header('location: ../index.html');
}

 ?>

 <title>Logged In</title>
 <form name="logout" method="post">
   <input type="submit" name="logout" value="log out">
 </form>
