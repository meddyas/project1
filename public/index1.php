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


   <link rel="stylesheet" href="1/css/animate.css">
   <link rel="stylesheet" type="text/css" href="1/css/style1.css">
    <style>
        img {
            border: none !important; 
        }
    </style>

</head>
<body>
	<header>
<?php include 'components/user_headeracceuil.php'; ?>
	</header>
  <section class="home wow flash" id="home">
  	 <div class="container">
  	 	  <h1 class="wow slideInLeft" data-wow-delay="1s">It's <span>gym</span> time. Let's go</h1>
  	 	  <h1 class="wow slideInRight" data-wow-delay="1s">We are ready to <span>fit you</span></h1>
  	 </div>
  	  
  	      <a href="#about" class="go-down">
  	      	  <i class="fa fa-angle-down" aria-hidden="true"></i>
  	      </a>
  	 
  </section>
  <section class="about" id="about">
  	  <div class="container">
  	  	  <div class="content">
  	  	  	   <div class="box wow bounceInUp">
  	  	  	   	   <div class="inner">
  	  	  	   	   	   <div class="img">
  	  	  	   	   	   	  <img src="images/about1.jpg" alt="about" />
  	  	  	   	   	   </div>
                       <div class="text">
                       	   <h4>Free Consultation</h4>
                       	   <p>Take advantage of our free consultation to explore how we can help you achieve your fitness goals. This no-obligation session allows us to assess your needs and discuss personalized options that fit your lifestyle. It’s the perfect starting point for your journey towards better health and wellness.</p>
                       </div>
  	  	  	   	   </div>
  	  	  	   </div>
  	  	  	   	<div class="box wow bounceInUp" data-wow-delay="0.2s">
  	  	  	   	   <div class="inner">
  	  	  	   	   	   <div class="img">
  	  	  	   	   	   	  <img src="images/about2.jpg" alt="about" />
  	  	  	   	   	   </div>
                       <div class="text">
                       	   <h4>Best Training</h4>
                       	   <p>Experience the best training with our expert instructors who provide top-notch guidance and support. Our programs are designed to deliver effective workouts tailored to your goals, ensuring you get the most out of every session. Whether you're aiming to build strength, increase endurance, or enhance overall fitness, our training offers the highest quality and results-driven approach.</p>
                       </div>
  	  	  	   	   </div>
  	  	  	   </div>
  	  	  	   <div class="box wow bounceInUp" data-wow-delay="0.4s">
  	  	  	   	   <div class="inner">
  	  	  	   	   	   <div class="img">
  	  	  	   	   	   	  <img src="images/about3.jpg" alt="about" />
  	  	  	   	   	   </div>
                       <div class="text">
                       	   <h4>Build Perfect Body</h4>
                       	   <p>Achieve your ideal physique with our customized programs designed to build a perfect body. Our expert trainers create tailored workouts and nutrition plans that focus on your individual goals, helping you sculpt, strengthen, and define your body effectively. Start your journey towards a fitter, stronger you today.</p>
                       </div>
  	  	  	   	   </div>
  	  	  	   </div>
  	  	  </div>
  	  </div>
  </section>

 <section class="service" id="service">
 	<div class="container">
 		 <div class="content">
 		 	  <div class="text box wow slideInLeft">
                  <h2>Services</h2>
                  <p>Our services offer tailored solutions to enhance your fitness journey. From personalized training programs designed to meet your unique goals to expert nutrition guidance for making healthier choices, we provide comprehensive support every step of the way.</p>
                  <p>Additionally, our wellness consultations provide holistic advice to help you achieve a balanced lifestyle. Whether you're aiming to boost your fitness, refine your diet, or seek overall wellness support, our dedicated team is here to assist you.</p>
                  <a href="" class="btn">Start Now</a>
 		 	  </div>
 		 	  <div class="accordian box wow slideInRight">
 		 	  	    <div class="accordian-container active">
 		 	  	    	<div class="head">
 		 	  	    		<h4>Cardiovascular Equipment</h4>
 		 	  	    		<span class="fa fa-angle-down"></span>
 		 	  	    	</div>
 		 	  	    	<div class="body">
 		 	  	    		<p>Cardiovascular equipment, like treadmills and bikes, improves endurance and strengthens the heart, ideal for cardio workouts.</p>
 		 	  	    	</div>
 		 	  	    </div>
 		 	  	    <div class="accordian-container">
 		 	  	    	<div class="head">
 		 	  	    		<h4>Strength Training Equipment</h4>
 		 	  	    		<span class="fa fa-angle-up"></span>
 		 	  	    	</div>
 		 	  	    	<div class="body">
 		 	  	    		<p>Strength training equipment, such as dumbbells and weight machines, helps build muscle and increase physical strength.</p>
 		 	  	    	</div>
 		 	  	    </div>
 		 	  	    <div class="accordian-container">
 		 	  	    	<div class="head">
 		 	  	    		<h4>Group Fitness Class</h4>
 		 	  	    		<span class="fa fa-angle-up"></span>
 		 	  	    	</div>
 		 	  	    	<div class="body">
 		 	  	    		<p>Group fitness classes offer a fun and motivating way to exercise with others, providing structured workouts led by an instructor to improve fitness and well-being.</p>
 		 	  	    	</div>
 		 	  	    </div>
 		 	  	    <div class="accordian-container">
 		 	  	    	<div class="head">
 		 	  	    		<h4>Other Services</h4>
 		 	  	    		<span class="fa fa-angle-up"></span>
 		 	  	    	</div>
 		 	  	    	<div class="body">
 		 	  	    		<p>Other services include personalized training programs, nutrition advice, and wellness consultations, designed to support your overall health and fitness goals.</p>
 		 	  	    	</div>
 		 	  	    </div>
 		 	  </div>
 		 </div>
 	</div>
 </section>
 
<section class="classes" id="classes">
	<div class="container">
		 <div class="content">
		 	  <div class="box img wow slideInLeft">
		 	  	 <img src="images/class2.png" alt="classes" />
		 	  </div>
		 	  <div class="box text wow slideInRight">
		 	  	 <h2>Our Classes</h2>
		 	  	 <p>Our classes offer a diverse range of workouts, from high-energy cardio to focused strength training, ensuring there’s something for everyone to achieve their fitness goals.</p>
		 	  	<div class="class-items">
		 	  	 <div class="item wow bounceInUp">
                     <div class="item-img">
                     	 <img src="images/class1.jpg" alt="classes" />
                     	 <div class="price">
                     	 	 300DT
                     	 </div>
                     </div>
                     <div class="item-text">
                     	  <h4>Stretching Training</h4>
                     	  <p>Stretching training improves flexibility and reduces muscle tension. Our sessions focus on enhancing your range of motion and preventing injuries, helping you feel more agile and relaxed.</p>
                     	  <a href="">Get Details</a>
                     </div>
		 	  	 </div>
		 	  	 <div class="item wow bounceInUp">
                     <div class="item-text">
                     	  <h4>Stretching Training</h4>
                     	  <p>Stretching training helps increase flexibility and ease muscle tension. Our sessions are designed to enhance your mobility and improve overall muscle health, promoting a balanced and injury-free workout experience.</p>
                     	  <a href="">Get Details</a>
                     </div>
                     <div class="item-img">
                     	 <img src="images/class1.jpg" alt="classes" />
                     	 <div class="price">
                     	 	 300DT
                     	 </div>
                     </div>
		 	  	 </div>
		 	  	</div>
		 	  </div>
		 </div>
	</div>
</section>

 <section class="start-today">
 	<div class="container">
 		 <div class="content">
 		 	  <div class="box text wow slideInLeft">
 		 	  	 <h2>Start Your Training Today</h2>
 		 	  	 <p>Start your training today and take the first step towards achieving your fitness goals. Our expert guidance and tailored programs are here to help you every step of the way,</p>
 		 	  	 <a href="" class="btn">Start Now</a>
 		 	  </div>
 		 	  <div class="box img wow slideInRight">
 		 	  	 <img src="images/gallery4.jpg" alt="start today" />
 		 	  </div>

 		 </div>
 	</div>
 </section>
  <section class="schedule" id="schedule">
  	 <div class="container">
  	 	  <div class="content">
  	 	  	   <div class="box text wow slideInLeft">
  	 	  	   	   <h2>Classes Schedule</h2>
  	 	  	   	   <p>
  	 	  	   	   Check out our classes schedule to find the perfect workout for your routine. With a variety of options and times available, you can easily fit fitness into your day and stay on track with your goals.
  	 	  	   	   </p>
  	 	  	   	   <img src="images/schedule1.png" alt="schedule" />
  	 	  	   </div>
  	 	  	   <div class="box timing wow slideInRight">
                   <table class="table">
                   	 <tbody>
                   	 	<tr>
                   	 		<td class="day">Monday</td>
                   	 		<td><strong>9:00 AM</strong></td>
                   	 		<td>Cardio Blast <br/> 9:00 to 10:00 AM</td>
                   	 		<td>Room No:210</td>
                   	 	</tr>
                   	 	<tr>
                   	 		<td class="day">Tuesday</td>
                   	 		<td><strong>14:00 AM</strong></td>
                   	 		<td>Yoga Flow<br/> 14:00 to 15:00 AM</td>
                   	 		<td>Room No:210</td>
                   	 	</tr>
                   	 	<tr>
                   	 		<td class="day">Wednesday</td>
                   	 		<td><strong>17:00 AM</strong></td>
                   	 		<td>Zumba Dance <br/> 17:00 to 19:00 AM</td>
                   	 		<td>Room No:210</td>
                   	 	</tr>
                   	 	<tr>
                   	 		<td class="day">Thursday</td>
                   	 		<td><strong>20:00 AM</strong></td>
                   	 		<td>Strength Training <br/> 20:00 to 22:00 AM</td>
                   	 		<td>Room No:210</td>
                   	 	</tr>
                   	 	<tr>
                   	 		<td class="day">Friday</td>
                   	 		<td><strong>9:00 AM</strong></td>
                   	 		<td>Core Strength
								<br/> 9:00 to 10:00 AM</td>
                   	 		<td>Room No:210</td>
                   	 	</tr>
                   	 	<tr>
                   	 		<td class="day">Saturday</td>
                   	 		<td><strong>21:00 AM</strong></td>
                   	 		<td>Stretch and Recovery <br/> 21:00 to 10:00 AM</td>
                   	 		<td>Room No:210</td>
                   	 	</tr>
                   	 </tbody>
                   </table>
  	 	  	   </div>
  	 	  </div>
  	 </div>
  </section>
  <section class="gallery" id="gallery">
  	 <h2>Workout Gallery</h2>
  	<div class="content">
  		 <div class="box wow slideInLeft">
  		 	 <img src="images/gallery1.jpg" alt="gallery" />
  		 </div>
  		 <div class="box wow slideInRight">
  		 	 <img src="images/gallery2.jpg" alt="gallery" />
  		 </div>
  		 <div class="box wow slideInLeft">
  		 	 <img src="images/gallery3.jpg" alt="gallery" />
  		 </div>
  		 <div class="box wow slideInRight">
  		 	 <img src="images/gallery4.jpg" alt="gallery" />
  		 </div>
  	</div>
  </section>
  <section class="contact" id="contact">
     <div class="container">
        <div class="content">
            <div class="box form wow slideInLeft">
               <form>
                  <input type="text" placeholder="Enter Name">
                  <input type="text" placeholder="Enter Email">
                  <input type="text" placeholder="Enter Mobile">
                  <textarea placeholder="Enter Message"></textarea>
                  <button type="submit">Send Message</button>
               </form>
            </div>
            <div class="box text wow slideInRight">
                 <h2>Get Connected with Gym</h2>
                  <p class="title-p">Get connected with our gym to stay updated on classes, special offers, and fitness tips. Follow us on social media, subscribe to our newsletter, or visit our website to ensure you never miss out on exciting updates and opportunities.</p>
                  <div class="info">
                      <ul>
                          <li><span class="fa fa-map-marker"></span> tunisia, House no 11, manouba </li>
                          <li><span class="fa fa-phone"></span>+219 53784151</li>
                          <li><span class="fa fa-envelope"></span> yhdoussa@gmail.com</li>
                      </ul>
                  </div>
                  <div class="social">
                       <a href="https://www.facebook.com/?locale=fr_FR"><span class="fa fa-facebook"></span></a>
                       <a href="https://fr.linkedin.com/"><span class="fa fa-linkedin"></span></a>
                       <a href="https://www.skype.com/fr/"><span class="fa fa-skype"></span></a>
                       <a href="https://www.youtube.com/"><span class="fa fa-youtube-play"></span></a>
                  </div>

                  <div class="copy">
                      PowerBy &copy; FIT FUSION
                  </div>
            </div>
        </div>
     </div>
  </section>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
	$(document).ready(function(){

      $(".ham-burger, .nav ul li a").click(function(){
       
        $(".nav").toggleClass("open")

        $(".ham-burger").toggleClass("active");
      })      
      $(".accordian-container").click(function(){
      	$(".accordian-container").children(".body").slideUp();
      	$(".accordian-container").removeClass("active")
      	$(".accordian-container").children(".head").children("span").removeClass("fa-angle-down").addClass("fa-angle-up")
      	$(this).children(".body").slideDown();
      	$(this).addClass("active")
      	$(this).children(".head").children("span").removeClass("fa-angle-up").addClass("fa-angle-down")
      })

       $(".nav ul li a, .go-down").click(function(event){
         if(this.hash !== ""){

              event.preventDefault();

              var hash=this.hash; 

              $('html,body').animate({
                scrollTop:$(hash).offset().top
              },800 , function(){
                 window.location.hash=hash;
              });

              // add active class in navigation
              $(".nav ul li a").removeClass("active")
              $(this).addClass("active")
         }
      })
})

</script>
<script src="1/js/wow.min.js"></script>
<script>
    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       0,
      }
    );
    wow.init();
  </script>
</body>
</html>






