<?php 
    require "../configs/config.php";
    require "./common.php";
        
        try {
        $connection = new PDO($dsn, $username, $password, $options);

        $new_task = array(
            "summary"       => escape($_POST['summary']),
            "details"       => escape($_POST['details']),
            "priority"      => escape($_POST['priority']),
            "isComplete"    => escape($_POST['isComplete'])
        );

        if ($_POST['dueDate']) {
            $new_task+= ["dueDate" => escape($_POST['dueDate'])];
        }

        $sql = sprintf(
            "INSERT INTO %s (%s) values (%s)",
            "tasks",
            implode(", ", array_keys($new_task)),
            ":" . implode(", :", array_keys($new_task)));
        
        $statement = $connection->prepare($sql);
        $statement->execute($new_task);
        
        header ("location: /index.php");
        }
    
        catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
?>