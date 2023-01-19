<?php
    require("db.php");
    $task = $db->query("SELECT * FROM task")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="@@@@@-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <h1>Task list</h1>
    <div class="container">
        <?php

        foreach ($task as $task) {
        ?>
            <div class="task-card">
                <span class="task-card-name"><?php echo $task["name"] ?></span>
                <div class="task-content">
                    <span class="task-card-assignedTo"><?php echo $task["assignedTo"] ?></span>
                    <span class="task-card-deadline"><?php echo $task["deadline"] ?></span>
                    <a class="hyperlinks" href="update.php?id=<?php echo $task["id"]?>">Update</a>
                    <a class="hyperlinks" href="delete.php?id=<?php echo $task["id"]?>">Delete</a>
                </div>
            </div>
        <?php
        }

        ?>
       
    </div>

    <a href="create.php"><strong>Add a new task!</strong></a>
</body>

</html>