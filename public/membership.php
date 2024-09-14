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
   <title>FIT FUSION</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="icon" type="image/png" sizes="500x500" href="uploaded_img/salut2.jpeg">

   <link rel="stylesheet" href="css/style.css">
    <style>
        img {
            border: none !important; 
        }
    </style>

</head>
<body>
   
<?php include 'components/user_header4.php'; ?>
<div class="home-bg">

<section class="home">

   <div class="swiper home-slider">
   
   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <div class="image">
         <img src="uploaded_img/salut.jpeg" alt="">
         </div>
         <div class="content">
            <h3>Sports hall subscription</h3>
            <a href="category.php?category=yuga" class="btn">join Now</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="uploaded_img/m1.jpeg" alt="">
         </div>
         <div class="content">
      
            <h3>zumba</h3>
            <a href="category.php?category=zumba" class="btn">join Now.</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="dance.jpeg" alt="">
         </div>
         <div class="content">
          
            <h3>dance</h3>
            <a href="category.php?category=dance" class="btn">join Now.</a>
         </div>
      </div>

   </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

</div>


   </div>
</section>

   </div>
</section>

   <div class="swiper-pagination"></div>

   </div>

</section>


   <div class="swiper-pagination"></div>

   </div>

</section>

<section class="home-products">

   <h1 class="heading">Latest abonnement</h1>

   <div class="swiper products-slider">

   <div class="swiper-wrapper">

   <?php
     $select_membership = $conn->prepare("SELECT * FROM `membership` LIMIT 6"); 
     $select_membership->execute();
     if($select_membership->rowCount() > 0){
      while($fetch_membership = $select_membership->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_membership['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_membership['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_membership['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_membership['image_01']; ?>">
      <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
      <a href="quick_view1.php?pid=<?= $fetch_membership['id']; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?= $fetch_membership['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_membership['name']; ?></div>
      <div class="flex">
         <div class="price"><span>DT.</span><?= $fetch_membership['price']; ?><span>/-</span></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no a membership added yet!</p>';
   }
   ?>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>









<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".hom-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
    },
});

 var swiper = new Swiper(".category-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
         slidesPerView: 2,
       },
      650: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
      1024: {
        slidesPerView: 5,
      },
   },
});

var swiper = new Swiper(".products-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      550: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>