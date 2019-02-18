<?php
  $host       = getenv('HOST');
  $username   = getenv('USER');
  $password   = getenv('PASSWORD');
  $dsn        = "mysql:host=$host;dbname=tasks";
  $options    = array(
                  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                );
