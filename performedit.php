<?php
    require "../configs/config.php";
    require "./common.php";

    try {
        $connection = new PDO($dsn, $username, $password, $options);
    
        $task =[
        "id"            => escape($_POST['id']),
        "summary"       => escape($_POST['summary']),
        "details"       => escape($_POST['details']),
        "priority"      => escape($_POST['priority']),
        "isComplete"    => escape($_POST['isComplete'])
        ];

        if ($_POST['dueDate']) {
            $task += ["dueDate" => escape($_POST['dueDate'])];
        } else {
            $task += ["dueDate" => NULL];
        }

        $sql = "UPDATE tasks 
                SET  
                summary = :summary, 
                details = :details, 
                priority = :priority, 
                dueDate = :dueDate, 
                isComplete  = :isComplete 
                WHERE id = :id";
    
        $statement = $connection->prepare($sql);
        $statement->execute($task);

        header ("location: /index.php");
    }

    
    catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
?>