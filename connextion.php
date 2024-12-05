<?php

   $server = "localhost";         
   $dbname = "crud_etudiant";
   $usrename = "root";
   $password = "";

   try {
      $dsn="mysql:host=$server; dbname=$dbname";
      $conn= new PDO($dsn,$usrename,$password);
      $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // echo "connexion reussie";
   

   } catch (PDOException $e){
      echo "erreur!!!".$e->getMessage();
   }

