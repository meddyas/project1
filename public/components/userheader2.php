<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fit Fusion Store</title>
    <link href="path/to/your/tailwind.css" rel="stylesheet"> 
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> 
    <link rel="stylesheet" href="css/style.css">
    <style>
        img {
            border: none !important; 
        }
    </style>

</head>
<body class="bg-gray-100">

<?php
if(isset($message)){
    foreach($message as $message){
        echo '
        <div class="bg-red-500 text-white p-4 rounded-md mb-4 flex justify-between items-center">
            <span>'.$message.'</span>
            <i class="fas fa-times cursor-pointer" onclick="this.parentElement.remove();"></i>
        </div>
        ';
    }
}
?>

<header class="bg-white shadow-md">
        <section class="container mx-auto flex justify-between items-center p-4">
            <a href="shop1.html" class="flex items-center">
                <img src="uploaded_img/preview.png" alt="Logo" style="height: 100px;" class="mr-2">
                <span class="text-6xl font-bold text-gray-800">
                    Fit Fusion<span ></span>
                </span>
            </a>
        </a>

        <nav class="space-x-4">
        <a href="index1.php" class="text-gray-800 text-3xl hover:text-blue-600">Acceuil</a>
            <a href="home.php" class="text-gray-800 text-3xl hover:text-blue-600">Home</a>
            <a href="about.php" class="text-gray-800 text-3xl hover:text-blue-600">About Us</a>
            <a href="orders.php" class="text-gray-800 text-3xl hover:text-blue-600">Orders</a>
            <a href="shop.php" class="text-gray-800 text-3xl hover:text-blue-600">Shop Now</a>
            <a href="contact.php" class="text-gray-800 text-3xl hover:text-blue-600">Contact Us</a>
        </nav>

        <div class="flex space-x-4 items-center">
            <?php
                $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id =?");
                $count_wishlist_items->execute([$user_id]);
                $total_wishlist_counts = $count_wishlist_items->rowCount();

                $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id =?");
                $count_cart_items->execute([$user_id]);
                $total_cart_counts = $count_cart_items->rowCount();
            ?>
            <div id="menu-btn" class="fas fa-bars cursor-pointer"></div>
            <a href="search_page.php" class="text-gray-800 text-3xl hover:text-blue-600 flex items-center">
                <i class="fas fa-search mr-1"></i> Search
            </a>
            <a href="wishlist.php" class="text-gray-800 text-3xl hover:text-blue-600 flex items-center">
                <i class="fas fa-heart mr-1"></i> <span>(<?= $total_wishlist_counts;?>)</span>
            </a>
            <a href="cart.php" class="text-gray-800 text-3xl hover:text-blue-600 flex items-center">
                <i class="fas fa-shopping-cart mr-1"></i> <span>(<?= $total_cart_counts;?>)</span>
            </a>
            <div id="user-btn" class="fas fa-user text-3xl cursor-pointer" ></div>
        </div>

        <div id="profile" class="absolute right-0 mt-4  bg-white shadow-lg rounded-lg p-4 hidden">
            <?php
                if(isset($user_id) && $user_id > 0){
                    $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id =?");
                    $select_profile->execute([$user_id]);
                    if($select_profile->rowCount() > 0){
                        $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
            ?>
            <p class="font-bold  text-gray-800"><?= $fetch_profile["name"];?></p>
            <a href="update_user.php" class="block text-blue-600 mt-2">Update Profile</a>
            <a href="components/user_logout.php" class="block text-red-600 mt-2" onclick="return confirm('logout from the website?');">Logout</a>
            <?php
                    }else{
            ?>
            <p class="text-red-600">User not found!</p>
            <?php
                    }
                }else{
            ?>
            <p>Please Login Or Register First to proceed!</p>
            <div class="flex space-x-4 mt-2">
                <a href="user_register.php" class="btn btn-primary">Register</a>
                <a href="user_login.php" class="btn btn-secondary">Login</a>
            </div>
            <?php
                }
            ?>
        </div>
    </section>
</header>

<script>
    
    document.getElementById('user-btn').addEventListener('click', function() {
        document.getElementById('profile').classList.toggle('hidden');
    });

 
    window.addEventListener('click', function(event) {
        const profileMenu = document.getElementById('profile');
        const userBtn = document.getElementById('user-btn');
        if (!profileMenu.contains(event.target) && !userBtn.contains(event.target)) {
            profileMenu.classList.add('hidden');
        }
    });
</script>

</body>
</html>
