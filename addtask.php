
<?php require("./templates/header.php"); ?>
<?php require("./common.php"); ?>
<?php require("../configs/config.php"); ?>

    <div class="container">
        <?php require "./templates/nav.php" ?>
        <div class="card" style="width: 50%">
        <form method="post" style="padding: 20px" action="./performadd.php">
            <div class="form-group">
                <label for="summary" class="text-primary">Summary</label>
                <input class="form-control" id="summary" name="summary">

                <label for="details" class="text-primary">Details</label>
                <textarea class="form-control" id="details" rows="3" name="details"></textarea>
            
                <label for="priority" class="text-primary">Priority</label>
                <select class="form-control" id="priority" name="priority">
                    <option>Low</option>
                    <option selected>Normal</option>
                    <option>High</option>
                </select>

                <label for="dueDate" class="text-primary">Due Date:</label>
                <input type="date" class="form-control" id="dueDate" name="dueDate">
                <input id="isComplete" name="isComplete" type="hidden" value="false">
            </div>
                <input  type="submit" class="btn btn-primary" name="submit" value="Add Task">
        </form>
        </div>
    </div> <!-- container -->

<?php require("./templates/footer.php"); ?>