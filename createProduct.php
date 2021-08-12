<?php
require 'db1.php';


if (isset($_POST['submit'])) {
    $name = $_POST['productname'];
    $price = $_POST['price'];
    $img = $_POST['img'];
   /* $img = $_FILES['img']['name'];
    $tmp_dir=$_FILES['img']['tmp_name'];
    $imageSize=$_FILES['img']['size'];
    $upload_dir='uploads';
    $imagExt=strtolower(pathinfo($img,PATHINFO_EXTENSION));
    $valid_ext*/
    $select = $_POST['selectCat'];

    $sql = 'INSERT INTO product(name,price,image,select_opt) VALUES(:name,:price,:img,:select_opt)';

    $statement = $conn->prepare($sql);
    if ($statement->execute([':name' => $name, ':price' => $price, ':img' => $img, ':select_opt' => $select])) {
        header("location: listProduct.php");
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
        <h1 class="AddHead">Create Product</h1>
    </div>
    <div class="AddContainer">
        <form method="post" onsubmit="return validateForm()"> 
            <div class="form-group">
                <div class="row">
                <label for="nameProduct">Product Name</label><br>
                <input type="text" name="productname" class="form-control" id="nameProduct" ><br>
                <span id="err1"></span>
                </div>
                <div class="row">
                <label for="priceProduct">Product Price</label><br>
                <input type="text" name="price" class="form-control" id="priceProduct" ><br>
                <span id="err2"></span>
                </div>
                <div class="row">
                <label for="imageProduct">Upload Image</label><br>
                <div id="file">
                <input type="file" name="img" class="form-control" id="imageProduct" ></div><br>
                <span id="err3"></span>
                </div>
                <div class="row">
                <label for="cat">Select Category</label><br>
               
                <select name="selectCat" id="optcategory">
                    <option value="select">--select--</option>
                    <?php 
                    while($catname = $statement->fetch()){
                        echo "<option>".$catname['NAME']."</option>";
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