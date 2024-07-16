<?php
include("connection.php");
include("navbar.php");

if (isset($_POST['signenter'])) {
    $user_name = $_POST['user_name'];
    $user_phone = $_POST['user_phone'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $security_q=$_POST['user_qa'];
    
    if (isset($_POST['confirm_password'])) {
        $confirm_password = $_POST['confirm_password'];
    } else {
        $confirm_password = "";
    }
    
    $user_address = $_POST['user_address'];
    $user_gender = $_POST['user_gender'];
    
    $passwordhashing = password_hash($user_password, PASSWORD_DEFAULT);
    
    $lowercase=preg_match('@[a-z]@' , $user_password);
    $uppercase=preg_match('@[A-Z]@' , $user_password);
    $numbers=preg_match('@[0-9]@' , $user_password);
    $characters=preg_match('@[^/w]@' , $user_password);
    
    $select="SELECT * FROM `user` WHERE `user_email` ='$user_email'";
    $run_select=mysqli_query($connect, $select);
    
    $rows=mysqli_num_rows($run_select);
    if($rows>0){
        echo "this Email is already taken";
    }else if($lowercase < 1 || $uppercase < 1 || $numbers < 1 || $characters < 1 ){
        echo "password must at least contain at least 1 uppercase, lowercase, number, and character";
    }else if(strlen($user_phone)!=11){
        echo "please enter a valid phone number";
    }else if (empty($user_email) || empty($user_password) || empty($confirm_password) || empty($user_address) || empty($user_gender)) {
        echo  "Please fill in all required inputs.";
    }else if ($user_password != $confirm_password) {
        echo "Passwords do not match.";
    } else {
        $insert = "INSERT INTO `user` VALUES (NULL, '$user_name', '$user_email', '$passwordhashing', '$user_gender', '$user_phone', '$user_address', '$security_q')";
        $run_insert = mysqli_query($connect, $insert);
        header("location: home_page.html");
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./css/signup.css">
    <meta charset="UTF-8">
    <title>Blissed Barks</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="icon" href="icon/S.jpg">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">


    <!--Saada-font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Butterfly+Kids&family=Dancing+Script:wght@400..700&display=swap"
        rel="stylesheet">
    <!-- end fonts  -->


    <style>
           a {
    
    text-decoration: none;
    /* color: aliceblue; */
}
        </style>
</head>

<body>



    <!-- start form  -->
    <form method="post" enctype="multipart/form-data">
        <class class="box-form">
            <div class="left">
                <div class="overlay">
                    <h1 id="headder">Sign Up</h1>

                    <div class="input-box">

                        <input class="name1" type="text" name=user_name placeholder="User name" required>
                        <br>
                        <input class="name2" type="text" name=user_phone placeholder="phone number" required>
                        <br>
                        <input class="email" type="text" name=user_email placeholder="Email" required>
                        <br>
                        <input id="password" type="password" name=user_password placeholder=" Password" required>
                        <br>
                        <input id="password" type="password" name=confirm_password placeholder="Confirm Password" required>
                        <br>
                        <input id="password" type="text" name=user_address placeholder="Address" required>
                        <br>
                        <!-- <input class="date" type="text" placeholder="gender" required> -->
                        <input class="date" name="user_qa" type="text" placeholder="what's your pet's favourite toy?" required>
                        <div class="gender">
                            <label for="m">male</label>
                            <input id="m" type="radio" value="male" name="user_gender">
                            <label for="f">female</label>
                            <input id="f" type="radio" value="female" name="user_gender">
                        </div>

                        <!-- hi lovies if you gonna use name in radio input use the same name we have choosen cause name in radio make the 2 radio buttons only one could be checked  -->

                        


                    </div>

                    <button id="signenter" name="signenter" type="submit">Sign Up</button>
                    <p>Already sign up <a href="log.php">Log in?</a>
                    </p>
                </div>



            </div>

            </div>
    </form>


    <!-- end form  -->

    <div class="right">
    </div>

    </div>


</body>

</html>