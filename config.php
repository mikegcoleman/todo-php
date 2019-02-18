<?php
  $host       = getenv('HOST');
  $username   = getenv('USER');
  $password   = getenv('PASSWORD');
  echo "--------------";
  echo "Environment variables: <br>";
  echo "Host: " . $host . "<br";
  echo "User: " . $username . "<br";
  echo "Password: " . $password . "<br";

  $dsn        = "mysql:host=$host;dbname=tasks";
  $options    = array(
                  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                );
