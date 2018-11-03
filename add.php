<?php 
include 'db.php';

if (isset($_POST['submit'])) {
    $task = htmlspecialchars($_POST['task']);
    $sql = "insert into tasks (task) values ('$task')";
    $val = $db->query($sql);
    if ($val) {
        header('Location: index.php');
    }
}
?>