<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM category WHERE ID=:id';
$statement = $conn->prepare($sql);
$statement->execute([':id' => $id]);
$catname = $statement->fetch(PDO::FETCH_OBJ);
if (isset($_POST['name'])) {
    $name = $_POST['name'];

    $sql = 'UPDATE category SET NAME=:name WHERE ID=:id';
    $statement = $conn->prepare($sql);
    if ($statement->execute([':name' => $name, ':id' => $id])) {
        header("location:list.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operation</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="AddHeader">
        <h1 class="AddHead">Manage Category</h1>
    </div>
    <div class="AddContainer">
        <form method="post" onsubmit="return validate1()">
            <div class="form-group">
                <label for="InputCategory">Category Name</label><br>
                <input type="text" value="<?= $catname->NAME; ?>" name="name" class="form-control" id="InputCategory"><br>
                <span id="err1"></span>
            </div>
            <hr>
            <button type="submit" class="btn" name="submit">Submit</button>
        </form>
    </div>
    </div>
    <script src="myjs.js"></script>
</body>

</html>