<?php require ("db.php");
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET["id"];
    $task = $db->query("SELECT * FROM tasks WHERE id=$id")->fetchAll();


    $task = $task[0];
    
    
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $assignedTo = $_POST['assignedTo'];
    $deadline = $_POST['deadline'];

    $db->query("UPDATE task SET name='$name', assignedTo='$assignedTo', deadline='$deadline' WHERE id=$id");
    echo '<script>
    alert("Task succesfully updated");
    location.href = "index.php";
    </script>';
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
    

    <form method="POST" action="update.php?id=<?= $id ?>">
        Task name: <input type="text" name="task_name" required value="<?php echo $task["name"]?>" /><br />
        Task solver: <input type="text" name="assignedTo" value="<?php echo $task["assignedTo"]?>" /><br />
        Deadline: <input type="date" name="deadline" value="<?php echo $task["deadline"]?>" /><br />
        <input type="hidden" value="<?php echo $task["id"]?>" name="id"/>
        <input type="submit" value="Save" />
    </form>
    <a href="index.php"><strong>Back to home</strong></a>

</body>

</html>