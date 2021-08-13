<?php
require 'db1.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM product WHERE id=:id';
$statement = $conn->prepare($sql);
$statement->execute([':id' => $id]);
$proname = $statement->fetch(PDO::FETCH_OBJ);
if (isset($_POST['submit'])) {
    $name = $_POST['productname'];
    $price = $_POST['price'];
    $img = $_FILES['pro_image']['name'];
    $target = "./images/" . $img;
    $target_db = "images/" . $img;
    move_uploaded_file($_FILES["pro_image"]["tmp_name"], $target);
    $select = $_POST['selectCat'];

    $sql = 'UPDATE product SET name=:name, price=:price, image=:img, select_opt=:select_opt WHERE id=:id';
    $statement = $conn->prepare($sql);
    if ($statement->execute([':name' => $name, ':price' => $price, ':img' => $target_db, ':select_opt' => $select, ':id' => $id])) {
        header("location:listProduct.php");
    }
}



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
    <title>CRUD Operation</title>
    <link rel="stylesheet" href="styleproduct.css">
</head>

<body>

    <div class="AddHeader">
        <h1 class="AddHead">Manage Product</h1>
    </div>
    <div class="AddContainer">
        <form method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
            <div class="form-group">
                <div class="row">
                    <label for="nameProduct">Product Name</label><br>
                    <input type="text" value="<?= $proname->name; ?>" name="productname" class="form-control" id="nameProduct"><br>
                    <span id="err1"></span>
                </div>
                <div class="row">
                    <label for="priceProduct">Product Price</label><br>
                    <input type="text" value="<?= $proname->price; ?>" name="price" class="form-control" id="priceProduct"><br>
                    <span id="err2"></span>
                </div>
                <div class="row">
                    <label for="imageProduct">Upload Image</label><br>
                    <div id="file">
                        <input type="file" value="<?= $proname->image; ?>" name="pro_image" class="form-control" id="imageProduct">
                    </div><br>
                    <span id="err3"></span>
                </div>
                <div class="row">
                    <label for="cat">Select Category</label><br>

                    <select name="selectCat" id="optcategory" value="<?= $proname->select_opt; ?>">

                        <?php
                        while ($catname = $statement->fetch()) {
                            echo "<option>" . $catname['NAME'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <hr>
            <button type="submit" class="btn" name="submit">Submit</button>
        </form>
    </div>
    </div>
    <script src="validationProduct.js"></script>
</body>

</html>