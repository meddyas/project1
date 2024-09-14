<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

if(isset($_POST['add_activitys'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);
   $details = $_POST['details'];
   $details = filter_var($details, FILTER_SANITIZE_STRING);

   $image_01 = $_FILES['image_01']['name'];
   $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
   $image_size_01 = $_FILES['image_01']['size'];
   $image_tmp_name_01 = $_FILES['image_01']['tmp_name'];
   $image_folder_01 = '../uploaded_img/'.$image_01;

   $image_02 = $_FILES['image_02']['name'];
   $image_02 = filter_var($image_02, FILTER_SANITIZE_STRING);
   $image_size_02 = $_FILES['image_02']['size'];
   $image_tmp_name_02 = $_FILES['image_02']['tmp_name'];
   $image_folder_02 = '../uploaded_img/'.$image_02;

   $image_03 = $_FILES['image_03']['name'];
   $image_03 = filter_var($image_03, FILTER_SANITIZE_STRING);
   $image_size_03 = $_FILES['image_03']['size'];
   $image_tmp_name_03 = $_FILES['image_03']['tmp_name'];
   $image_folder_03 = '../uploaded_img/'.$image_03;

   $select_activitys = $conn->prepare("SELECT * FROM `activitys` WHERE name = ?");
   $select_activitys->execute([$name]);

   
      $insert_activitys = $conn->prepare("INSERT INTO `activitys`(name, details, price, image_01, image_02, image_03) VALUES(?,?,?,?,?,?)");
      $insert_activitys->execute([$name, $details, $price, $image_01, $image_02, $image_03]);

      if($insert_activitys){
         if($image_size_01 > 2000000 OR $image_size_02 > 2000000 OR $image_size_03 > 2000000){
            $message[] = 'image size is too large!';
         }else{
            move_uploaded_file($image_tmp_name_01, $image_folder_01);
            move_uploaded_file($image_tmp_name_02, $image_folder_02);
            move_uploaded_file($image_tmp_name_03, $image_folder_03);
            $message[] = 'new activitys added!';
         }

      }

   }  

if(isset($_GET['delete'])){

   $delete_id = $_GET['delete'];
   $delete_activitys_image = $conn->prepare("SELECT * FROM `activitys` WHERE id = ?");
   $delete_activitys_image->execute([$delete_id]);
   $fetch_delete_image = $delete_activitys_image->fetch(PDO::FETCH_ASSOC);
   unlink('../uploaded_img/'.$fetch_delete_image['image_01']);
   unlink('../uploaded_img/'.$fetch_delete_image['image_02']);
   unlink('../uploaded_img/'.$fetch_delete_image['image_03']);
   $delete_activitys = $conn->prepare("DELETE FROM `activitys` WHERE id = ?");
   $delete_activitys->execute([$delete_id]);
   $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE pid = ?");
   $delete_cart->execute([$delete_id]);
   $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE pid = ?");
   $delete_wishlist->execute([$delete_id]);
   header('location:activitys.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>activitys</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="icon" type="image/png" sizes="500x500" href="456.jpg">
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="add-products">

   <h1 class="heading">Add activitys</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <div class="flex">
         <div class="inputBox">
            <span>activitys Name (required)</span>
            <input type="text" class="box" required maxlength="100" placeholder="enter activitys name" name="name">
         </div>
         <div class="inputBox">
            <span>activitys Price (required)</span>
            <input type="number" min="0" class="box" required max="9999999999" placeholder="enter activitys price" onkeypress="if(this.value.length == 10) return false;" name="price">
         </div>
        <div class="inputBox">
            <span>Image 01 (required)</span>
            <input type="file" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        <div class="inputBox">
            <span>Image 02 (required)</span>
            <input type="file" name="image_02" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        <div class="inputBox">
            <span>Image 03 (required)</span>
            <input type="file" name="image_03" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
         <div class="inputBox">
            <span>activitys description (required)</span>
            <textarea name="details" placeholder="enter activitys details" class="box" required maxlength="500" cols="30" rows="10"></textarea>
         </div>
      </div>
      
      <input type="submit" value="add activitys" class="btn" name="add_activitys">
   </form>

</section>

<section class="show-products">

   <h1 class="heading">activitys Added.</h1>

   <div class="box-container">

   <?php
      $select_activitys = $conn->prepare("SELECT * FROM `activitys`");
      $select_activitys->execute();
      if($select_activitys->rowCount() > 0){
         while($fetch_activitys = $select_activitys->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <div class="box">
      <img src="../uploaded_img/<?= $fetch_activitys['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_activitys['name']; ?></div>
      <div class="price">DT.<span><?= $fetch_activitys['price']; ?></span>/-</div>
      <div class="details"><span><?= $fetch_activitys['details']; ?></span></div>
      <div class="flex-btn">
         <a href="update_activitys.php?update=<?= $fetch_activitys['id']; ?>" class="option-btn">update</a>
         <a href="activitys.php?delete=<?= $fetch_activitys['id']; ?>" class="delete-btn" onclick="return confirm('delete this activitys?');">delete</a>
      </div>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">no activitys added yet!</p>';
      }
   ?>
   
   </div>

</section>

