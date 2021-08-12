<?php
require 'db1.php';
$id = $_GET['id'];
$sql = 'DELETE FROM product WHERE id=:id';
$statement = $conn->prepare($sql);
if ($statement->execute([':id' => $id])) {
    header("location: listProduct.php");
}
