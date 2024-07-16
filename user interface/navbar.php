  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navbar</title>
    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- link css  -->
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/cart.css.css">
    
    <!-- link icons  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
      

  </head>
  <body>
    


  <!--start navbar-->
  <nav class="navbar">
    <div class="logo">
      <h2>blissed berks</h2>
    </div>
    <ul>
        
    <li><a href="./home_page.html" style="color: #d08770;">Home</a></li>
            <li><a href="./pets dogs.php ">products</a></li>
            <li><a href="./mating.php">mating</a></li>
            <li><a href="./signup.php">signup</a></li>
            <li><a href="./petdes.php">profile</a></li>

                <!-- <li>
      <button type="button" class="btn sp" style="color: #ea7c80;
      border-color: #ea7c80;"><li><a class="active" href="signup.html">sign</a></li></i></button>
    </li> -->

                <li>
                    <a href="./add_to_wishlist.php" class="nicon">
                        <button type="button" class="btn" style="color: #d08770;
      border-color: #d08770;"><i class="fa-regular fa-heart"></i></button>
                </li>
                </a>
                <li>
                    <a id="toggleBtn" class="nicon" href="./newcart.php">
                        <button type="button" class="btn" style="color: #d08770;
      border-color: #d08770;"><i class="fa-solid fa-cart-shopping"></i></button></a>
                </li>
    </ul>

  </nav>
  <!--end navbar-->
  <div id="sideNav" class="side-nav d-none">
        <!-- <h1>Shopping Cart</h1> -->

        <!-- <div class="card">
            <div>
                <img src="collar.webp" alt="" class="cartimg">
            </div>
            <div class="details">
                <h4>Dog Collar</h4>
                <div class="row">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    <h4>1</h4>
                    <i class="fa fa-minus-circle" aria-hidden="true"></i>
                </div>
            </div>
        </div> -->

        <!-- bs card  -->
        <div class="row">
            <h2>
                shopping cart
            </h2>
            <div class="content">
            <?php
                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $data) { ?>
                <div class="card">
                    <div class="product">
                        <div class="first">
                            <img src="images/0b0165d42d9b3db0e540d0ee947d08a1.jpg" alt="">
                            <h5 class="card-title"><?php echo($data['product_name']); ?></h5>
                        </div>

                        <div class="second">
                            <h5 class="card-title"><?php echo ($data['product_price']); ?></h5>
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            <h5>1</h4>
                                <i class="fa fa-minus-circle" aria-hidden="true"></i>

                        </div>
                        <a class="btn btn-light" href="add_to_cart.php?remove=<?php echo($data['id']); ?>">Remove</a>
                        
                    </div>
                </div>
                <?php }
                } else { }?>

            </div>
            <div class="card cbtn">
                <a href="#" class="btn btn-light">check out</a>
            </div>

        </div>
        <!-- end bs card  -->


        <!-- <a href="" class="settings"><i class="fa-solid fa-gear"></i></a> -->
    </div>
    <!-- end side nav  -->

    <!-- bootstrap js link -->
    <script src="js/bootstrap.min.js"></script>

    <!-- main js -->
    <script src="js/cart.js"></script>


</body>
</html>