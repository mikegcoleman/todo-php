<?php
	try {	
		require "./config.php";
		require "./common.php";

		$connection = new PDO($dsn, $username, $password, $options);

		$sql = "SELECT * FROM tasks";

		$statement = $connection->prepare($sql);
      $statement->execute();
      $result = $statement->fetchAll();	
      $failed=FALSE;

	} catch(PDOException $error) {
      echo "<h4>Error accessing database - Please confirm the connection settings?</h4><br><br>";
      echo $sql . "<br>" . $error->getMessage();
      $failed=TRUE;
	}
?>

<?php require("./templates/header.php"); ?>
    <div class="container">
      <?php 
         require("./templates/nav.php");
         if (!$failed) {
            if (!$result && $statement->rowCount() == 0) { ?>
               <h4> No tasks to display. Add one above.</h4>
            <?php } 
            else 
            { 
               foreach ($result as $task) { 
               require("./templates/showtask.php");
               } // <!-- foreach --> 
            }    // <!-- else -->
         } ?>
   </div> <!-- container -->

<p class="font-weight-light font-italic" style="padding: 20px">
Front-end host: <?php echo gethostname(); ?><br>
Database host: <?php echo $host; ?>
</p>

 <?php require("./templates/footer.php"); ?>