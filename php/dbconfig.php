<?php
  session_start();

  $host = 'sql300.epizy.com';
  $user = 'epiz_22338357';
  $password = 'radnikdoo23';
  $dbname = 'epiz_22338357_shopit';

  #set dsn
  $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
  #create instance
  $pdo = new PDO($dsn, $user, $password);
  #setting defaults
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  /*{
    "alg": "HS256",
    "typ": "JWT"
  }*/
  
?>
