<?php
  $host       = "<endpoint>";
  $username   = "<username>";
  $password   = "<password>";
  $dbname     = "<database>";
  $dsn        = "mysql:host=$host;dbname=$dbname";
  $options    = array(
                  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                );