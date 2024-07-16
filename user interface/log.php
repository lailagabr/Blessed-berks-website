<?php
include("navbar.php");
?>
!DOCTYPE html>
<html lang="en">

<head>


    <link rel="stylesheet" href="./css/log.css">
    <meta charset="UTF-8">
    <title>Login</title>


</head>

<body>
   


    <!-- left side of the form -->
    <div class="box-form">
        <div class="left">
            <div class="overlay">
                <h1 class="headder">Blissed Barks</h1>
                <span>
                    <p>login with:</p>
                    <a href="https://web.facebook.com/?_rdc=1&_rdr"><i class="fa fa-facebook" aria-hidden="true"></i>
                        Facebook</a>
                    <a href="https://twitter.com/i/flow/login"><i class="fa fa-twitter" aria-hidden="true"></i>
                        Twitter</a>
                </span>
            </div>
        </div>
             <!-- end the left side of the form -->

        
        <!-- start form right side -->
        <form>
            <div class="right">
                <h5 class="login1">Login</h5>
                <p>Don't have an account? <a href="signup.html">Create Your
                        Account</a> it takes less than a minute</p>
                <div class="inputs">
                    <input class="uname" type="text" placeholder="Email" required>
                    <br>
                    <div class="input-box">
                        <input id="password" type="password" placeholder="Password" required>

                    </div>

                </div>

                <br><br>

                <div class="remember-me--forget-password">
                    

                  
                    <label>
                        <input type="checkbox"   />
                        <span class="text-checkbox">Remember me</span>
                    </label>
                    <a href="#">forget password?</a>
                </div>

                <br>
                <!-- <input type="submit" value="login" class="loginenter"> -->
                   <a href="home_page.html" ><button type="submit" id="btnn"> login</button></a>
            </div>
        </form>

        <!-- end form  -->

    </div>

</body>

</html>