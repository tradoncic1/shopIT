<?php
  session_start();

  $host = 'localhost';
  $user = 'root';
  $password = 'radnikdoo23';
  $dbname = 'shopit';

  #set dsn
  $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
  #create instance
  $pdo = new PDO($dsn, $user, $password);
  #setting defaults
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
