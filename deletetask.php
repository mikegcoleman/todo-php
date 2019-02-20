<?php
    require "../configs/config.php";
    require "./common.php";
    /*
    if (isset($_POST['submit'])) {
        try {
            $connection = new PDO($dsn, $username, $password, $options);
           
            $id = $_POST['id'];

            $sql = "DELETE FROM tasks WHERE id = :id";

            echo $sql . "<p>";
        
            $statement = $connection->prepare($sql);
            $statement->bindValue(':id', $id);
            $statement->execute();
      
        } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
      } 
    */

    if (isset($_GET['id'])) {
        try {	
            $connection = new PDO($dsn, $username, $password, $options);
            
            $id = $_GET['id'];

            $sql = "SELECT * FROM tasks WHERE id = :id";
            $statement = $connection->prepare($sql);
            $statement->bindValue(':id', $id);
            $statement->execute();

            $task = $statement->fetch(PDO::FETCH_ASSOC);

        }   catch(PDOException $error) {
                echo $sql . "<br>" . $error->getMessage();
        }
    }
?>


<?php require("./templates/header.php"); ?>

    <div class="container">
        <?php require("./templates/nav.php"); ?>
        <?php 
        if ($statement->rowCount() != 0) { ?>
            <div class="card border-primary" style="width: 50%"> 
              <div class="card-header">
              <div class="row">
                  <div class="col-sm">
                    Due By:  
                    <?php if ($task["dueDate"] != '') {
                        echo date('n/j/Y',strtotime($task["dueDate"]));
                      } else  { 
                          echo "Not specified";
                      } ?> <!-- else -->
                  </div>
                  <div class="col-sm">
                      <?php
                       switch($task["priority"]) { 
                          case 'Normal': ?>
                            <span class="badge float-right badge-warning">Priority: Normal</span> <?php
                            break; 
                          case 'High': ?>
                            <span class="badge float-right badge-danger">Priority: High</span> <?php
                            break; 
                          case 'Low': ?>
                            <span class="badge float-right badge-success">Priority: Low</span> <?php
                          break;
                        } ?>
                  </div>
                </div> <!-- Row #1 -->
                </div> <!-- Header -->
                <div class="card-body">
                  <h5 class ="card-title"><?php echo $task["summary"]; ?></h5>
                  <p class="card-text"><?php echo $task["details"]; ?></p>
                </div> <!-- Body -->
                <div class="card card-footer">
                  <div class = "row">
                      <div class = "col-sm">
                          <?php if ($task["isComplete"] == 'false') { ?>
                              <h4><span class="badge badge-secondary">Incomplete</span></h4>
                          <?php } else { ?>
                              <h4><span class="badge badge-secondary">Complete</span></h4>
                          <?php } ?>
                      </div>
                      <div class = "col-sm">
                          <ul class="nav justify-content-end nav-pills card-header-pills">
                              <?php if ($task["isComplete"] == 'false') { ?>
                                  <li class="nav-item">
                                      <a class="nav-link"> <i class="fas fa-edit"></i></a>
                                  </li>
                              <?php } ?>
                              <li class="nav-item">
                                  <a class="nav-link"> <i class="fas fa-trash-alt"></i></a>
                              </li>
                              <li class="nav-item">       
                                    <?php if ($task["isComplete"] == 'false') { ?>
                                        <a class="nav-link"> <i class="fas fa-check"></i></a>
                                    <?php } else { ?>
                                        <a class="nav-link"> <i class="fas fa-redo-alt"></i></a>
                                    <?php } ?>                               
                              </li>
                          </ul>
                      </div>  
                  </div>
              </div>
            </div> <!-- Card -->   
           <p>
           <div class ="row" style="width: 53%">
                    <div class="col-sm">
                        <form method="post" action="/performdelete.php?id=<?php echo $id ?>">
                            <input type="submit" name="submit" class="btn btn-danger" value="Delete Task">
                        </form>
                    </div>
                    <div class="col-sm">
                         <a class="btn btn-primary float-right"  href="/" role="button">Cancel</a>
                    </div>
                    
                  </div>

            
        <?php } else {
            echo "<h4>Error: No records returned</h4>";
        } ?>
    </div> <!-- container -->
    
<?php require("./templates/footer.php"); ?>