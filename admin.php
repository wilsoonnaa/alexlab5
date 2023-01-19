<?php
    require("db.php");
    if (isset($_POST["submit"])) 
    {
        $name = $_POST["name"];
        $assignedTo = $_POST["price"];
        $deadline = $_POST["deadlines"];
        $db->query("INSERT INTO tasks (name, assignedTo, deadline) VALUES ('$name', '$assignedTo', '$deadline')");
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css" />
    <title>Document</title>
</head>

<body>
    
    <form method="POST" action="create.php">
        Task name: <input type="text" name="task_name" required /><br />
        Task solver: <input type="text" name="assignedTo" /><br />
        Deadline: <input type="date" name="deadline" /><br />
        <input type="submit" value="Save" />
    </form>
    
    <a href="index.php"><strong>Back to home</strong></a>
</body>

</html>