<?php
require 'db.php';


if (isset ($_POST['name']) ) {
  $name = $_POST['name'];
  $sql = 'INSERT INTO category(NAME) VALUES(:name)';
  
  $statement = $conn->prepare($sql);
  if($statement->execute([':name'=>$name])){
      header("location: list.php");
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
           <h1 class="AddHead">Create Category</h1>
       </div>
<div class="AddContainer">
       <form method="post">
           <div class="form-group">
               <label for="InputCategory">Category Name</label><br>
               <input type="text" name="name" class="form-control" id="InputCategory">
           </div><hr>
           <button type="submit" class="btn" name="submit">Submit</button>
       </form>
   </div>
    </div>
</body>
</html>