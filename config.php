<?php
  $host       = "<insert database endpoint";
  $username   = "<insert username>";
  $password   = "<insert password>";
  $dbname     = "tasks"; 
  $dsn        = "mysql:host=$host;dbname=$dbname"; 
  $options    = array(
                  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                );     