


<?php

  /* DATABASE CONNECTION*/


        $db['db_host'] = 'localhost';
        $db['db_user'] = 'root';
        $db['db_pass'] = '';
        $db['db_name'] = 'company';

      foreach($db as $key=>$value){
          define(strtoupper($key),$value);
      }
      global $connection;
      $connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
      if(!$connection){
          die("Cannot Establish A Secure Connection To The Host Server At The Moment!");
      }

      try{
          $db = new PDO('mysql:dbhost=localhost;dbname=company;charset=utf8','root','');


      }
      catch(Exception $e){

          die($e);
      }

      /*DATABASE CONNECTION */



?>