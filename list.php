<?php
require 'db.php';
$sql = 'SELECT * FROM category';
$statement = $conn->prepare($sql);
$statement->execute();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Categories</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="AddHeader ListHeader">
        <h1 class="AddHead ListHead">Manage Category</h1>
    </div>

    <div class="container">
        <div class="btn-top">
            <a href="Create.php"><input type="button" class="btn-create" value="Create Category"></a>
        </div>
        <div class="table-body">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>ACTION</th>
                </tr>

                <?php while ($catname = $statement->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $catname['ID'] . "</td>";
                    echo "<td>" . $catname['NAME'] . "</td>";
                    echo "<td>";
                    echo '<a href="edit.php?id=' . $catname['ID'] . '" class="btn-info bt">Edit</a>';
                    echo '<a href="delete.php?id=' . $catname['ID'] . '"class="btn-danger bt">Delete</a>';
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>

    </div>

</body>
</hmtl>