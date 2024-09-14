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
   
<?php include 'components/user_header3.php'; ?>
<div class="home-bg">

<section class="home">

   <div class="swiper home-slider">
   
   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <div class="image">
            <img src="uploaded_img/salut4.jpg" alt="">
         </div>
         <div class="content">
            <h3>yuga</h3>
            <a href="category1.php?category=yuga" class="btn">join Now</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="uploaded_img/salut5.jpg" alt="">
         </div>
         <div class="content">
      
            <h3>zumba</h3>
            <a href="category1.php?category=zumba" class="btn">join Now.</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="uploaded_img/dance1.jpg" alt="">
         </div>
         <div class="content">
          
            <h3>dance</h3>
            <a href="category1.php?category=dance" class="btn">join Now.</a>
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

   <h1 class="heading">Latest products</h1>

   <div class="swiper products-slider">

   <div class="swiper-wrapper">

   <?php
     $select_activitys = $conn->prepare("SELECT * FROM `activitys` LIMIT 6"); 
     $select_activitys->execute();
     if($select_activitys->rowCount() > 0){
      while($fetch_activity = $select_activitys->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_activitys['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_activitys['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_activitys['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_activity['image_01']; ?>">
      <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
      <a href="quick_view2.php?pid=<?= $fetch_activity['id']; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?= $fetch_activity['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_activity['name']; ?></div>
      <div class="flex">
         <div class="price"><span>DT.</span><?= $fetch_activity['price']; ?><span>/-</span></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no activitys added yet!</p>';
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

var swiper = new Swiper(".home-slider", {
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