<?php
  $endpoint   = "<endpoint>";
  $username   = "<username>";
  $password   = "<password>";
  $dbname     = "<database>";
  $dsn        = "mysql:host=$endpoint;dbname=$dbname";
  $options    = array(
                  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                );