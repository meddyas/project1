<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="icon" type="image/png" sizes="500x500" href="uploaded_img/salut2.jpeg">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/userheader2.php'; ?>


<section class="about">

   <div class="row">

      <div class="image">
         <img src="uploaded_img/1111.jpeg" alt="">
      </div>

      <div class="content">
         <h3>Fit fusion's Message:</h3>
         <p>Notre salle de sport est un lieu dédié à votre bien-être et à votre performance. Avec des équipements de pointe, des coachs qualifiés, et une variété de cours collectifs comme le yoga et la danse, nous vous aidons à atteindre vos objectifs, qu'il s'agisse de remise en forme, de perte de poids ou de renforcement musculaire. Rejoignez notre communauté et transformez votre corps et votre esprit dans un environnement motivant et convivial..</p>
         <a href="contact.php" class="btn">Contact Us</a>
      </div>

   </div>

</section>

<section class="reviews">
   
   <h1 class="heading">Client's Reviews.</h1>

   <div class="swiper reviews-slider">

   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <img src="uploaded_img/takwa.jpg" alt="">
         <p>"Une salle de sport exceptionnelle ! Les coachs sont toujours à l'écoute et savent motiver. J'ai pu atteindre mes objectifs de perte de poids grâce à leur programme personnalisé. Les équipements sont modernes, et l'ambiance est très conviviale."</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3> <a href="" target="_blank">Takwa Khiari</a></h3>
      </div>

      <div class="swiper-slide slide">
         <img src="uploaded_img/louey.jpg" alt="">
         <p>"J'adore venir ici ! Il y a une grande variété de cours collectifs, et l'équipe est vraiment professionnelle. Grâce aux conseils des coachs, j'ai amélioré ma condition physique en peu de temps. Je recommande cette salle à 100 % !"</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3><a href="" target="_blank">Louey Hdoussa</a></h3>
      </div>

      <div class="swiper-slide slide">
         <img src="uploaded_img/krouma.jpg" alt="">
         <p>"Le yoga et la danse proposés sont géniaux ! L'ambiance est relaxante et motivante à la fois. Les espaces sont toujours propres, et l'atmosphère est très agréable. C'est l'endroit idéal pour se dépasser et se détendre."</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3><a href="" target="_blank">Ahmed zouari</a></h3>
      </div>
      </div>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>









<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
        slidesPerView:1,
      },
      768: {
        slidesPerView: 2,
      },
      991: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>