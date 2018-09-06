<?php
  $host       = "mysql";
  $username   = "root";
  $password   = "password";
  $dbname     = "tasks"; 
  $dsn        = "mysql:host=$host;dbname=$dbname"; 
  $options    = array(
                  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                );     