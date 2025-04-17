<?php
include './db.php';
$conn->query("delete from tasks where id=".$_GET['taskId']);
header('Location: index.php');
?>