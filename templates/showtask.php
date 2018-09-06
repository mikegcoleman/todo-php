<!-- Begin showtask -->
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
                <div class="card-footer">
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
                                      <a class="nav-link" href="/edittask.php?id=<?php echo $task["id"] ?>"> <i class="fas fa-edit"></i></a>
                                  </li>
                              <?php } ?>
                              <li class="nav-item">
                                  <a class="nav-link" href="/deletetask.php?id=<?php echo $task["id"] ?>"> <i class="fas fa-trash-alt"></i></a>
                              </li>
                              <li class="nav-item">
                                  <form method="post" action="/completetask.php?id=<?php echo $task["id"] ?>">
                                      <button type="submit" class="btn btn-link">
                                          <?php if ($task["isComplete"] == 'false') { ?>
                                              <i class="fas fa-check"></i>
                                          <?php } else { ?>
                                              <i class="fas fa-redo-alt"></i>
                                          <?php } ?>
                                      </button>
                                  </form>
                              </li>
                          </ul>
                      </div>  
                  </div>
              </div>
            </div> <!-- Card -->   
           <p>
<!-- End showtask -->