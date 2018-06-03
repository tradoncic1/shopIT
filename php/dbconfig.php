<?php
  session_start();

  $host = 'fdb21.awardspace.net';
  $user = '2736254_shopit';
  $password = 'radnikdoo23';
  $dbname = '2736254_shopit';

  #set dsn
  $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
  #create instance
  $pdo = new PDO($dsn, $user, $password);
  #setting defaults
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
