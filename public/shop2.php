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
   <title>Shop</title>
   
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/userheader2.php'; ?>

<section class="products">

   <h1 class="heading">Latest Activitys.</h1>

   <div class="box-container">

   <?php
     $select_activitys = $conn->prepare("SELECT * FROM `activitys`"); 
     $select_activitys->execute();
     if($select_activitys->rowCount() > 0){
      while($fetch_activitys = $select_activitys->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="box">
      <input type="hidden" name="pid" value="<?= $fetch_activity['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_activity['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_activity['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_activity['image_01']; ?>">
      <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
      <a href="quick_view.php?pid=<?= $fetch_activity['id']; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?= $fetch_activity['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_activitys['name']; ?></div>
      <div class="flex">
         <div class="price"><span>DT.</span><?= $fetch_activity['price']; ?><span>/-</span></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no activitys found!</p>';
   }
   ?>

   </div>

</section>













<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>