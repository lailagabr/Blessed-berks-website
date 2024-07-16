<?php
Include("connection.php");
include("navbar.php");
$category_id= 2;
$select="SELECT * FROM `product`  JOIN `category` ON `product` . `category_id` = `category` . `category_id` WHERE `category`.`category_id` = $category_id";
$run_select=mysqli_query($connect,$select);
$fetch = mysqli_fetch_all($run_select, MYSQLI_ASSOC);
?>
<html>

<head>
    <title>Blissed Berks</title>
    
    <link rel="stylesheet" href="css/pets.css">
    <link rel="stylesheet" href="css/marriage.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton+SC&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <style>
            .cart{
                /* background-color: teal; */
                position: relative;
    left: 0px;
    top: 0px;
            }
            h3{
                color: #f8f9fa;
            }

            .fav{ background-color: transparent;}
            
        </style>

    
</head>

<body>
    <div class="content">
        <!-- cat or dog buttons -->
        <div class="types">
            <a href="./pets dogs.php">
            <button type="button" class="type1"><i class="fa-solid fa-dog"></i></button></a>
            <button type="button" class="type2"><i class="fa-solid fa-cat"></i></button>
        </div>


        <!-- categories buttons -->
        <!-- <div class="categories">
            <button type="button" class="btn3">food</button>
            <button type="button" class="btn3">toys</button>
            <button type="button" class="btn3">clothes</button>
            <button type="button" class="btn3">litter</button>
        </div> -->
        

        <div class="cards1">
            <!-- cards -->
            <!-- start card  -->
             <?php foreach ($fetch as $data){
                $image_path = 'images/' . ($data['product_photo']);
                ?>
                
            <div class="card"><img class="img" src="<?php echo $image_path; ?>" alt="<?php echo ($data['product_photo']); ?>">
                <h2><?php echo $data ['product_name'] ?></h2>
                <p>$<?php echo $data ['product_price'] ?></p>
                <a href="add_to_wishlist.php?add=<?php echo $data['product_id']; ?>" class="fav">
                <i class="fa-regular fa-heart"></i></a>
                <!-- <a href="wishlist.html">
                <button class="fav"><i class="fa-regular fa-heart"></i></button>
            </a> -->
                <!-- <a href="cart.php">
                    <button class="cart"><i class="fa-solid fa-cart-shopping"></i></button>
                </a> -->
                <button class="cart"><i class="fa-solid fa-cart-shopping"></i></button>
            <a href="add_to_cart.php?add=<?php echo $data['product_id']; ?>"><button type="button" class="btn btn-outline-secondary w-50 btn3">details  <i class="fa-solid fa-paw" style="color: #d4b2a7;"></i></button></a>
                <!-- <a href="pdetails.html">
                    <button type="button" class="details">details</button>
                </a> -->
            </div><?php } ?>
            </div>


            <!-- end card  -->
<!-- comment cards bellow  -->
            <!-- <div class="card"><img src="images/Untitled Project1.jpg" alt="">
                <h2>Warm Fleece Dog Clothes Costume for Dogs</h2>
                <p>$17.60</p>
                <button class="fav"><i class="fa-regular fa-heart"></i></button>
                <button type="button" class="details">details</button>
            </div>
            <div class="card">
                <img src="images/s-l960.webp" alt="">
                <h2>Deluxe Gold Cat Collar Heavy Duty New</h2>
                <p>$22.80</p>
                <button class="fav"><i class="fa-regular fa-heart"></i></button>
                <button class="cart"><i class="fa-solid fa-cart-shopping"></i></button>
                <button type="button" class="details">details</button>
            </div>
            <div class="card">
                <img src="images/Untitled Project.jpg" alt="">
                <h2>Migma Adult Dog Dry Food 20 Kg</h2>
                <p>$26.93</p>
                <button class="fav"><i class="fa-regular fa-heart"></i></button>
                <button class="cart"><i class="fa-solid fa-cart-shopping"></i></button>
                <button type="button" class="details">details</button>
            </div>

            <div class="card"><img src="images/507e86ef7341709c76fa139ed499ee13.jpg" alt="">
                <h2>Minimalist Pet Hoodie 100% cotton</h2>
                <p>$17.60</p>
                <button class="fav"><i class="fa-regular fa-heart"></i></button>
                <button class="cart"><i class="fa-solid fa-cart-shopping"></i></button>
                <button type="button" class="details">details</button>
            </div>
            <div class="card"><img src="images/Alpha-Cats-Dry-Food-4kg.jpg.webp" alt="">
                <h2>Bond Dog Dry Food All Life Stages 20 kg</h2>
                <p>$17.60</p>
                <button class="fav"><i class="fa-regular fa-heart"></i></button>
                <button class="cart"><i class="fa-solid fa-cart-shopping"></i></button>
                <button type="button" class="details">details</button>
            </div>
            <div class="card">
                <img src="images/Fashion-Wide-Leather-Dog-Collar-Swiss-Mountain-Dog-S26_LRG.webp" alt="">
                <h2>Fancy Leather Swiss Dog Collar with Brass Plates</h2>
                <p>$22.80</p>
                <button class="fav"><i class="fa-regular fa-heart"></i></button>
                <button class="cart"><i class="fa-solid fa-cart-shopping"></i></button>
                <button type="button" class="details">details</button>
            </div>
            <div class="card">
                <img src="images/71neSGiVC3L.jpg" alt="">
                <h2>Cat Harness and Leash Escape Cat Walking Vest</h2>
                <p>$54.99</p>
                <button class="fav"><i class="fa-regular fa-heart"></i></button>
                <button class="cart"><i class="fa-solid fa-cart-shopping"></i></button>
                <button type="button" class="details">details</button>
            </div>         <button class="cart"><i class="fa-solid fa-cart-shopping"></i></button> -->
            
            <!-- comment till here  -->




            <footer>
        <div class="left">
            <h1 class="l">Blissed Berks</h1>
            <p>your premier source for top-quality pet supplies! <br> Discover everything your furry friends need from
                <br> food to toys and more.
                Explore our curated selection <br> and join a community passionate about providing the <br> best for
                their pets.</p>
        </div>
        <div class="services">
            <h3 >services</h3>
            <a href="pets cats.php">Products</a>
            <a href="mating.php">Mariage</a>
            <a href="userprofile.php">user profile</a>
            <a href="cart.php">Cart</a>
        </div>
        <div class="info">
            <h3>Information</h3>
            <p>+201155667710 <br>team1234@gmail.com <br></p>
        </div>
        <div class="tips">
            <h3>tips</h3>
            <p>
                1.Exercise Daily:Keep them active for health. <br>
                2.Feed Well:Provide balanced meals. <br>
                3.Check-ups Needed:Regular vet visits matter.</p>
        </div>
        <div class="social">
            <i class="fa-brands fa-facebook lol"></i>
            <i class="fa-brands fa-instagram lol"></i>
            <i class="fa-brands fa-x-twitter lol"></i>
            <i class="fa-brands fa-linkedin lol"></i>
        </div>
    </footer>

    </body>

</html>
