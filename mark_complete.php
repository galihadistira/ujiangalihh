<?php
include 'db.php';

$id = $_GET['id'];
$conn->query("UPDATE todos SET status = 1 WHERE id = $id");

header("Location: index.php");
exit();
?>
