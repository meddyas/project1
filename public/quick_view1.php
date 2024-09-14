<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Quick view</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="icon" type="image/png" sizes="500x500" href="uploaded_img/salut2.jpeg">
   <link rel="stylesheet" href="css/style.css">
   <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
   
<?php include 'components/userheader2.php'; ?>

<section class="quick-view">

   <h1 class="heading">Quick view</h1>

   <?php
     $pid = $_GET['pid'];
     $select_membership = $conn->prepare("SELECT * FROM `membership` WHERE id = ?"); 
     $select_membership->execute([$pid]);
     if($select_membership->rowCount() > 0){
      while($fetch_membership = $select_membership->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="box">
      <input type="hidden" name="pid" value="<?= $fetch_membership['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_membership['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_membership['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_membership['image_01']; ?>">
      <div class="row">
         <div class="image-container">
            <div class="main-image">
               <img src="uploaded_img/<?= $fetch_membership['image_01']; ?>" alt="">
            </div>
            <div class="sub-image">
               <img src="uploaded_img/<?= $fetch_membership['image_01']; ?>" alt="">
               <img src="uploaded_img/<?= $fetch_membership['image_02']; ?>" alt="">
               <img src="uploaded_img/<?= $fetch_membership['image_03']; ?>" alt="">
            </div>
         </div>
         <div class="content">
            <div class="name"><?= $fetch_membership['name']; ?></div>
            <div class="flex">
               <div class="price"><span>DT.</span><?= $fetch_membership['price']; ?><span>/-</span></div>
               <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
            </div>
            <div class="details"><?= $fetch_membership['details']; ?></div>
            <div class="flex-btn">
               <input type="submit" value="add to cart" class="btn" name="add_to_cart">
               <input class="option-btn" type="submit" name="add_to_wishlist" value="add to wishlist">
            </div>
         </div>
      </div>
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no membership added yet!</p>';
   }
   ?>

</section>



