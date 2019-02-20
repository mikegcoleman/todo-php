<?php
    require "../configs/config.php";
    
    try {
        $connection = new PDO($dsn, $username, $password, $options);
    
        $id = $_GET['id'];
        
        $sql = "SELECT isComplete FROM tasks WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();

        $state = $statement->fetch(PDO::FETCH_ASSOC);


        if ($state['isComplete'] == 'false') {
            $isComplete = 'true';
        } else {
            $isComplete = 'false';
        }

        $sql = "UPDATE tasks 
                SET   
                    isComplete  = :isComplete 
                WHERE id = :id";
    
        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->bindValue(':isComplete', $isComplete);
        $statement->execute();

        header ("location: /index.php");
        

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
?>