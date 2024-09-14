<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

if(isset($_POST['add_membership'])){

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

   $select_membership = $conn->prepare("SELECT * FROM `membership` WHERE name = ?");
   $select_membership->execute([$name]);

   
      $insert_membership = $conn->prepare("INSERT INTO `membership`(name, details, price, image_01, image_02, image_03) VALUES(?,?,?,?,?,?)");
      $insert_membership->execute([$name, $details, $price, $image_01, $image_02, $image_03]);

      if($insert_membership){
         if($image_size_01 > 2000000 OR $image_size_02 > 2000000 OR $image_size_03 > 2000000){
            $message[] = 'image size is too large!';
         }else{
            move_uploaded_file($image_tmp_name_01, $image_folder_01);
            move_uploaded_file($image_tmp_name_02, $image_folder_02);
            move_uploaded_file($image_tmp_name_03, $image_folder_03);
            $message[] = 'new membership added!';
         }

      }

   }  

if(isset($_GET['delete'])){

   $delete_id = $_GET['delete'];
   $delete_membership_image = $conn->prepare("SELECT * FROM `membership` WHERE id = ?");
   $delete_membership_image->execute([$delete_id]);
   $fetch_delete_image = $delete_membership_image->fetch(PDO::FETCH_ASSOC);
   unlink('../uploaded_img/'.$fetch_delete_image['image_01']);
   unlink('../uploaded_img/'.$fetch_delete_image['image_02']);
   unlink('../uploaded_img/'.$fetch_delete_image['image_03']);
   $delete_membership = $conn->prepare("DELETE FROM `membership` WHERE id = ?");
   $delete_membership->execute([$delete_id]);
   $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE pid = ?");
   $delete_cart->execute([$delete_id]);
   $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE pid = ?");
   $delete_wishlist->execute([$delete_id]);
   header('location:mem.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>membership</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="icon" type="image/png" sizes="500x500" href="456.jpg">
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="add-products">

   <h1 class="heading">Add membership</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <div class="flex">
         <div class="inputBox">
            <span>membership Name (required)</span>
            <input type="text" class="box" required maxlength="100" placeholder="enter membership name" name="name">
         </div>
         <div class="inputBox">
            <span>membership Price (required)</span>
            <input type="number" min="0" class="box" required max="9999999999" placeholder="enter membership price" onkeypress="if(this.value.length == 10) return false;" name="price">
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
            <span>membership description (required)</span>
            <textarea name="details" placeholder="enter membership details" class="box" required maxlength="500" cols="30" rows="10"></textarea>
         </div>
      </div>
      
      <input type="submit" value="add membership" class="btn" name="add_membership">
   </form>

</section>

<section class="show-products">

   <h1 class="heading">membership Added.</h1>

   <div class="box-container">

   <?php
      $select_membership = $conn->prepare("SELECT * FROM `membership`");
      $select_membership->execute();
      if($select_membership->rowCount() > 0){
         while($fetch_membership = $select_membership->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <div class="box">
      <img src="../uploaded_img/<?= $fetch_membership['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_membership['name']; ?></div>
      <div class="price">DT.<span><?= $fetch_membership['price']; ?></span>/-</div>
      <div class="details"><span><?= $fetch_membership['details']; ?></span></div>
      <div class="flex-btn">
         <a href="update_mem.php?update=<?= $fetch_membership['id']; ?>" class="option-btn">update</a>
         <a href="mem.php?delete=<?= $fetch_membership['id']; ?>" class="delete-btn" onclick="return confirm('delete this membership?');">delete</a>
      </div>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">no membership added yet!</p>';
      }
   ?>
   
   </div>

</section>

