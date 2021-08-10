<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'DELETE FROM category WHERE ID=:id';
$statement = $conn->prepare($sql);
if ($statement->execute([':id' => $id])) {
    header("location: list.php");
}
