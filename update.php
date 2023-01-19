<?php
    require('db.php');

    if ($_SERVER['REQUEST_METHOD'] === 'GET'){
        $id = $_GET['id'];

        $item = $db->query("SELECT * FROM tasks WHERE id=$id")->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($item) > 0) {
        $item = $item[0];
    }
    }else if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id=$_POST['id'];
        $name=$_POST['name'];
        $assignedTo=$_POST['assignedTo'];
        $deadline=$_POST['deadline'];

        $db->query("UPDATE tasks SET name='$name', assignedTo='$assignedTo', deadline='$deadline' WHERE id=$id");

        echo '<script>
        alert("Updated.")
        </script>';
        header('location:index.php');
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
        Task name: <input type="text" name="task_name" required value="<?php echo $item["name"]?>" /><br />
        Task solver: <input type="text" name="assignedTo" value="<?php echo $item["assignedTo"]?>" /><br />
        Deadline: <input type="date" name="deadline" value="<?php echo $item["deadline"]?>" /><br />
        <input type="hidden" value="<?php echo $id ?>" name="id"/>
        <input type="submit" value="Save" />
    </form>
    <a href="index.php"><strong>Back to home</strong></a>

</body>

</html>