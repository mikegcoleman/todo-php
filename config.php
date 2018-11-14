<?php
  $host       = "<endpoint>";
  $username   = "<username>";
  $password   = "<password>";
  $dsn        = "mysql:host=$host;dbname=tasks";
  $options    = array(
                  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                );
