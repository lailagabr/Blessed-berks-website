<?php
include("connection.php");
include("navbar.php");
$mate= 1;
$selectpets="SELECT * FROM `pet` WHERE `mate` = $mate ";
$runselpet= mysqli_query($connect,$selectpets);
$records = mysqli_query($connect, "SELECT * FROM pet");
$row = mysqli_fetch_array($records);


?>
<html>

<head>
    <title>Blissed Berks</title>
    
    <link rel="stylesheet" href="css/marriage.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton+SC&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<div class="content">
    <!-- cat or dog buttons -->
     <!-- dev please delete cat or dog buttons  -->
    <!-- <div class="types">
        <button type="button" class="type1"><i class="fa-solid fa-dog"></i></button>
        <button type="button" class="type2"><i class="fa-solid fa-cat"></i></button>
    </div> -->

    
<!-- dev we want intro to the page or any heading sentence to complete the design  -->

    <!-- cards -->
     
     
    <div class="cards1">
        <br>
        <br><br>

      
        <?php foreach($runselpet as $row) { 
            $image_path = 'images/' . ($row['pet_photo']);
        ?>
        <!-- start card  -->
        <div class="card">
            <img class="pet-img" src="<?php echo $image_path; ?>" alt="<?php echo ($row['pet_photo']); ?>">
            <h1><?php echo ($row['pet_name']); ?></h1>
            <p><?php echo ($row['pet_gender']); ?></p>
            <li class="location"><i class="fa-solid fa-location-dot"> <?php echo ($row['pet_address']); ?></i></li>
           
            <a href="petprofile.php">
                <button id="d.salma" type="button" class="details">view pet</button>
            </a>
        </div>
        <!-- end card  -->
        <?php } ?>
        <!-- end card  -->
        </div>

</body>

</html>
<!-- comment cards bellow  -->
        <!-- <div class="card"><img src="images/069fb4480463c5e90e01635ef3637ede.jpg" alt="">
            <h1>Bosi</h1>
            <p>Female</p>
            <li class="location"><i class="fa-solid fa-location-dot"> 5 Bulvarno-Kudriavska Street</i></li>
            <button class="fav"><i class="fa-regular fa-heart"></i></button>
            <button type="button" class="details">details</button>
        </div>
        <div class="card"><img src="images/61b80cbded1c9adf895b20ba2ffd0867.jpg" alt="">
            <h1>Shico</h1>
            <p>Male</p>
            <li class="location"><i class="fa-solid fa-location-dot"> 5 Bulvarno-Kudriavska Street</i></li>
            <button class="fav"><i class="fa-regular fa-heart"></i></button>
            <button type="button" class="details">details</button>
        </div>
        <div class="card"><img src="images/8b7bce10bbf62a17076f34dd8a85e37b.jpg" alt="">
            <h1>honda</h1>
            <p>Female</p>
            <li class="location"><i class="fa-solid fa-location-dot"> 5 Bulvarno-Kudriavska Street</i></li>
            <button class="fav"><i class="fa-regular fa-heart"></i></button>
            <button type="button" class="details">details</button>
        </div>

        <div class="card"><img src="images/9632e4619c423e0a574030f35de36791.jpg" alt="">
            <h1>daisey</h1>
            <p>Female</p>
            <li class="location"><i class="fa-solid fa-location-dot"> 5 Bulvarno-Kudriavska Street</i></li>
            <button class="fav"><i class="fa-regular fa-heart"></i></button>
            <button type="button" class="details">details</button>
        </div>
        <div class="card"><img src="images/d166db18e0acd3da62c33afa5bb8e962.jpg" alt="">
            <h1>kyara</h1>
            <p>Female</p>
            <li class="location"><i class="fa-solid fa-location-dot"> 5 Bulvarno-Kudriavska Street</i></li>
            <button class="fav"><i class="fa-regular fa-heart"></i></button>
            <button type="button" class="details">details</button>
        </div>
        <div class="card"><img src="images/15a8e5d7bc0011c973b3fa37e490bd7a.jpg" alt="">
            <h1>Pupsy</h1>
            <p>Male</p>
            <li class="location"><i class="fa-solid fa-location-dot"> 5 Bulvarno-Kudriavska Street</i></li>
            <button class="fav"><i class="fa-regular fa-heart"></i></button>
            <button type="button" class="details">details</button>
        </div>
        <div class="card"><img src="images/b700216bc4d7dc735296070948edbe17.jpg" alt="">
            <h1>Roy</h1>
            <p>Male</p>
            <li class="location"><i class="fa-solid fa-location-dot"> 5 Bulvarno-Kudriavska Street</i></li>
            <button class="fav"><i class="fa-regular fa-heart"></i></button>
            <button type="button" class="details">details</button>
        </div>
    </div> -->
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
            <h2>services</h2>
            <a href="pets cats.php">Products</a>
            <a href="mating.php">Mariage</a>
            <a href="userprofile.php">user profile</a>
            <a href="cart.php">Cart</a>
        </div>
        <div class="info">
            <h2>Information</h2>
            <p>+201155667710 <br>team1234@gmail.com <br></p>
        </div>
        <div class="tips">
            <h2>tips</h2>
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
