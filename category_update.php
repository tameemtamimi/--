<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once('connect.php');
    // var_dump($_FILES);
    $id = $_POST['id'];
    $name = $_POST['name'];
    $img = '';
    $description = $_POST['description'];

    if($_FILES['img']['error'] == 0){
        $img = $_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], 'images/'.$img);
    }
    if($img == ''){
        $sql = "UPDATE `category` SET `name`='$name',`description` = '$description' WHERE `c_id` = $id";
    }
    else{
        $sql = "UPDATE `category` SET `name`='$name',`img` = '$img',`description` = '$description' WHERE `c_id` = $id";
    }
    if(mysqli_query($conn, $sql))
    {
        echo 'succed';
    }
  else{
    echo 'error';
  }
}
header ('Location: category.php');