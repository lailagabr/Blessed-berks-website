<?php
include("connection.php");
$select="SELECT * FROM `user` ";
$runselect=mysqli_query($connect ,$select);
?>
<html>

<head>
    <link rel="stylesheet" href="css/userprofile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!DOCTYPE html>
    <html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user profile</title>
</head>

<body>


    <div class="main">

        <!-- <div class="pet-img">
            <img src="images/dog.jpg" class="pet-img">
        </div> -->
<?php
foreach($runselect as $data ) {
?>


        <div class="pet-txt">
            <h1>
                <?php echo $data ['user_name'] ?>
            </h1>
            <hr><br>
            <h3>
                <ul class="pet-details">

                    <li> <?php echo $data ['user_phone']?> </li>
                    <li> <?php echo $data ['user_gender']?> </li>
                </ul>
            </h3>
            <br><br><br>

            <h2>Address</h2> <br><br>

            <h4> <?php echo $data ['user_address']?> </h4>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <!-- <h5>4 / june 2020</h5> <br> -->

            <!-- <h4>vaccine 2</h4>
            <h5>13 / may 2024</h5> <br>

            <h4>vaccine 3</h4>
            <h5> 2/ july 2024</h5> -->


            <div class="reminder">

            </div>
            <a href="petprofile.php">
            <div class="information">
                <h2>your pets profile</h2>
                <img src="images/dog.jpg" alt="">
            </div>
        </a>
        <?php } ?>
        </div>
    </div>
</body>

</html>