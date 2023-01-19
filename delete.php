<?php
    require('db.php');
       
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $db->query("DELETE FROM tasks WHERE id=$id");
        }

    echo '<script>
    alert("Task deleted.");
    location.href="index.php"
    </script>'
?>