<?php
include("connection.php");
include("navbar.php");
$records = mysqli_query($connect, "SELECT * FROM pet");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Profile</title>
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/petprofile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


    <style>
            
          
            body {
    height: auto;
}
        </style>
</head>
<body>
<?php
$data = mysqli_fetch_array($records);
    
    $vaccine_date = new DateTime($data['vaccine_date']);
    $reminder_date = clone $vaccine_date;
    $reminder_date->modify('+1 month');
  
    $today = new DateTime();
    $interval = $today->diff($reminder_date);
    $formatted_reminder_date = $reminder_date->format('d/m/Y'); 

    if ($interval->invert) {
        $reminder_text = "Past due. The next vaccine was due on $formatted_reminder_date.";
    } else {
        $reminder_text = "Your next vaccine is on $formatted_reminder_date.";
    }

    
    $image_path = 'images/' . ($data['pet_photo']);
    
?>
    <div class="main">


        <div class="pet-img">
            <img class="pet-img" src="<?php echo $image_path; ?>" alt="<?php echo ($data['pet_photo']); ?>">
        </div>

        <div class="pet-txt">
            <h1><?php echo ($data['pet_name']); ?></h1>
            <hr><br>
            <h3>
                <ul class="pet-details">
                    <li><?php echo ($data['pet_type']); ?></li>
                    <li><?php echo ($data['pet_gender']); ?></li>
                    <li><?php echo ($data['pet_age']); ?></li>
                </ul>
            </h3>
            <br>
            <h2>About</h2><br>
            <h4><?php echo ($data['vaccine_name']); ?></h4>
            <h5><?php echo ($data['vaccine_date']); ?></h5><br>
            <div class="reminder">
                <?php echo ($reminder_text); ?>
            </div>
            <div class="information">
                <?php echo ($data['pet_bio']); ?>
            </div>
        </div>
    </div>
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
