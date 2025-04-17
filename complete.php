<?php
include './db.php';
$conn->query("update tasks set completed = 1 where id=".$_GET['taskId']);
header('Location: index.php');
?>