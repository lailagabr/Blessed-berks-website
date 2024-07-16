<?php
include("connection.php");
include("navbar.php");
$select = "SELECT * FROM `user` LIMIT 1";
$runselect=mysqli_query($connect ,$select);
$sel="SELECT * FROM `pet` LIMIT 1";
$run_pet=mysqli_query($connect , $sel);
?>
<html>
    <head>
        <link rel="stylesheet" href="css/userdes.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <!DOCTYPE html>
        <html lang="en">
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blissed Berks</title>
        <link rel="stylesheet" href="https://fonts.google.com/">



       
    </head>

    <body>
        <!-- beg of navbar -->
    <!-- <div class="navbar">
        <div class="logo">
            <h2>Blissed Berks</h2>
        </div>


        <div class="links">
            <ul>
                <li><i class="fa-solid fa-house-chimney"></i></li>
                <li><i class="fa-brands fa-product-hunt"></i></li>
                <li><i class="fa-solid fa-cart-shopping"></i></li>
                <li><i class="fa-solid fa-paw"></i></li>
                <li><i class="fa-regular fa-id-badge"></i></li>
                <li><i class="fa-solid fa-thumbs-up"></i></li>



            </ul>
        </div>
    </div> -->


    <!-- end of navbar -->

                   <div class="user-info">
                   <?php foreach($runselect as $data ) { 
                    ?>
                    
                    <div class="user-img">
                        <img src="images/user.jpg" class="user-img" alt="">
                    </div>
                    <div  class="user-txt">
                        <h1>
                        <?php echo $data ['user_name'] ?>
                        </h1>
                        <hr><br>
                        <h3>
                            <ul class="user-details">
                                <li><?php echo $data ['user_phone']?></li>
                                <li><?php echo $data ['user_gender']?></li>
                                <li><?php echo $data ['user_address']?>  </li>

                        </ul></h3>
                        <br>

                        <!--
                        <h2>About</h2> <br>

                        <h4>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure libero vitae beatae
                             dolorem quibusdam incidunt vel pariatur cupiditate perspiciatis ad!</h4>-->
                             <?php } ?>

                    </div>
                </div> 

                    <!--cards-->
                    <div class="pets">
                        <div class="pet-card">
                            <?php foreach( $run_pet as $value ) {
                                $image_path = 'images/' . ($value['pet_photo']);
                                ?>
                            <div class="card-img"  > <img   src="<?php echo $image_path; ?>" alt="<?php echo ($value['pet_photo']); ?>"></div>
                            <div> <a href="./petprofile.php">
                                <h2 class="pet-name"><?php echo $value ['pet_name'] ?></h2></a>
                                <?php } ?>
                        </div>  
                        <style>
                            img{
                                width: 230px;
                                height: 200px;
                                border-radius:50%;
                            }
                        </style>
                        </div>
                        <a href="petprofileform.php">
                        <div class="pet-card">
                            <div class="card-img"><i class="fa-solid fa-plus" class="pet-icon"></i></div> 
                            <div> 
                                <a href="./petprofileform.php" ><p class="add-yours">Add Your Pet!</p></a>
                            </div>   
                        </div>
                        </a>
                    </div>


    </body>
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
</html>