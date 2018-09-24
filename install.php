<?php

/**
 * Open a connection via PDO to create a
 * new database and table with structure.
 *
 */
echo "creating database";
echo "<br>";

require "../configs/config.php";

try {
    echo "<br> Connecting to " . $host . " as " . $username . " with password " . $password . "<p>";
	$connection = new PDO("mysql:host=$host", $username, $password, $options);
	$sql = file_get_contents("data/init.sql");
	$connection->exec($sql);
	
	echo "Database and table users created successfully.";
} catch(PDOException $error) {
	echo "ERROR!! - " . $sql . "<br>" . $error->getMessage();
}