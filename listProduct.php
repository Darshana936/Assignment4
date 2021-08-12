<?php
require 'db1.php';
$sql = 'SELECT * FROM product';
$statement = $conn->prepare($sql);
$statement->execute();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Products</title>
    <link rel="stylesheet" href="styleproduct.css">
</head>

<body>

    <div class="AddHeader ListHeader">
        <h1 class="AddHead ListHead">Manage Product</h1>
    </div>

    <div class="container">
        <div class="btn-top">
            <a href="createProduct.php"><input type="button" class="btn-create" value="Create Category"></a>
        </div>
        <div class="table-body">
            <table class="table">
            
                <tr>
                    <th>ID</th>
                    <th>PRODUCT NAME</th>
                    <th>PRODUCT PRICE</th>
                    <th>PRODUCT IMAGE</th>
                    <th>PRODUCT CATEGORY</th>
                    <th>PRODUCT ACTION</th>
                </tr>
            
                <?php while ($row = $statement->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    
                    echo "<td>" . $row['price'] . "</td>";
                 
                    echo '<td> <img src="'. $row['image'] .'" width="50" height="50">'."</td>";
                    echo "<td>" . $row['select_opt'] . "</td>";
                    echo "<td>";
                    echo '<a href="editproduct.php?id=' . $row['id'] . '" class="btn-info bt">Edit</a>';
                    echo '<a href="deleteproduct.php?id=' . $row['id'] . '"class="btn-danger bt">Delete</a>';
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
           
            </table>
        </div>

    </div>

</body>
</hmtl>