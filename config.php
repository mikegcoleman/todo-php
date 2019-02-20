<?php
  require("./connectvalues.php");

  $dsn        = "mysql:host=$host;dbname=tasks";

  $options    = array(
                  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                );
