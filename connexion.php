<?php 
      $db_dsn  = "mysql:dbname=evalutation;host=localhost;charset=utf8";
       $db_username = "root";
      $db_password = "toor";
      $pdo = new PDO(
        $db_dsn,
        $db_username,
        $db_password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET lc_time_names = \'fr_FR\''));
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 ?>