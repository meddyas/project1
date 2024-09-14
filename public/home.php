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
   <link rel="icon" type="image/png" sizes="500x500" href="uploaded_img/salut2.jpeg">
   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">
    <style>
        img {
            border: none !important; 
        }
    </style>

</head>
<body>
   
<?php include 'components/header.php'; ?>
<div class="home-bg">

<section class="home">

   <div class="swiper home-slider">
   
   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <div class="image">
            <img src="uploaded_img/bbb.jpg" alt="">
         </div>
         <div class="content">
            <span>50% Off</span>
            <h3>Latest Creatine</h3>
            <a href="category.php?category=Creatine" class="btn">Shop Now</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="uploaded_img/yyb.jpg" alt="">
         </div>
         <div class="content">
            <span> 50% off</span>
            <h3>Latest Whey</h3>
            <a href="category.php?category=whey" class="btn">Shop Now.</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="uploaded_img/222.jpg" alt="">
         </div>
         <div class="content">
            <span> 50% off</span>
            <h3>Latest Accessories</h3>
            <a href="category.php?category=Accessories" class="btn">Shop Now.</a>
         </div>
      </div>

   </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

</div>

<section class="category py-10 bg-gray-100">
   <h1 class="heading text-4xl font-bold text-center mb-10 text-gray-800">Shop by Category</h1>

   <div class="container mx-auto">
      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">

         <a href="category.php?category=Creatine" class="group bg-white rounded-lg shadow-lg hover:shadow-2xl transition duration-300 ease-in-out p-6 flex flex-col items-center">
            <img src="uploaded_img/12.jpeg" alt="Creatine" class="w-32 h-32 object-cover rounded-full mb-4 transition duration-300 transform group-hover:scale-110">
            <h3 class="text-xl font-semibold text-gray-800 group-hover:text-red-500">Creatine</h3>
         </a>

         <a href="category.php?category=whey" class="group bg-white rounded-lg shadow-lg hover:shadow-2xl transition duration-300 ease-in-out p-6 flex flex-col items-center">
            <img src="uploaded_img/yyb.jpg" alt="Whey" class="w-32 h-32 object-cover rounded-full mb-4 transition duration-300 transform group-hover:scale-110">
            <h3 class="text-xl font-semibold text-gray-800 group-hover:text-red-500">Whey</h3>
         </a>

         <a href="category.php?category=accessories" class="group bg-white rounded-lg shadow-lg hover:shadow-2xl transition duration-300 ease-in-out p-6 flex flex-col items-center">
            <img src="uploaded_img/02.jpg" alt="Accessories" class="w-32 h-32 object-cover rounded-full mb-4 transition duration-300 transform group-hover:scale-110">
            <h3 class="text-xl font-semibold text-gray-800 group-hover:text-red-500">Accessories</h3>
         </a>
        

      </div>
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
     $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
      <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
      <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_product['name']; ?></div>
      <div class="flex">
         <div class="price"><span>DT.</span><?= $fetch_product['price']; ?><span>/-</span></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
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