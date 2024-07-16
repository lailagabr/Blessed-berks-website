<?php
include("connection.php");
include("navbar.php");
if (isset($_POST['submit'])) {
    $image=$_FILES['image']['name'];
    $name=$_POST['name'];
    $type=$_POST['type'];
    $gender=$_POST['gender'];
    $age=$_POST['age'];
    $vaccine_name=$_POST['vaccine'];
    $vaccine_date=$_POST['vaccine_date'];
    $address=$_POST['address'];
    $bio=$_POST['bio'];
    $user_name=$_POST['owner'];
    $mating=$_POST['mating'];
    $select_user= "SELECT `user_id` FROM `user` WHERE `user`.`user_name` ='$user_name' ";
    
    $result_user = mysqli_query($connect, $select_user);
    
    $row_user = mysqli_fetch_assoc($result_user);
    
    $rows=mysqli_num_rows($result_user);
    if ($row_user) {
        $user_id = $row_user['user_id'];
    } else {
        echo "Invalid owner's username.";
    }

    if(empty($name) || empty($image) || empty($type) || empty($age) || empty($address) || empty($bio) || empty($gender) || empty($user_name)){
        echo "Please fill out all the fields";
    // }elseif($rows=0){
    //     echo "invalid owner's user name";
    }else{
        $insert="INSERT INTO `pet` VALUES (NULL , '$name','$type','$gender', '$age','$image', '$address'
                                            ,'$vaccine_name' , '$vaccine_date' , '$bio' , '$mating', '$user_id')";
        $runinsert=mysqli_query($connect,$insert);
        $upload=move_uploaded_file($_FILES['image']['tmp_name'], "images/". $image);
        // echo"data added successfly";
        header("location:petprofileform.php");
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Blissed Barks</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="icon" href="icon/S.jpg">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/petprofileform.css">


    <!---fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Butterfly+Kids&family=Dancing+Script:wght@400..700&display=swap"
        rel="stylesheet">
    <!-- end fonts  -->
</head>

<body>



    <!-- start form  -->
    <form method="POST" enctype="multipart/form-data">
        <class class="box-form">
            <div class="left">
                <div class="overlay">
                    <h1 id="headder">pet profile</h1>

                    <div class="input-box">
                        
                        <input type="text" name="owner" placeholder="owner's user name" required>
                        <br>
                        <input type="file" name="image" placeholder="photo" required>
                        <br>
                        <input type="text" name="name" placeholder="name" required>
                        <br>
                        <input type="text" name="type" placeholder="kind" required>
                        <br>
                        <input type="text" name="age" placeholder="age" required>
                        <br>
                        <input type="text" name="address" placeholder="address " required>
                        <br>
                        <input type="text" name="bio" placeholder="bio " required>
                        <br>

                        <center>
                            <div class="gender">
                                <label for="m">male</label>
                                <input id="m" type="radio" value="male" name="gender">
                                <label for="f">female</label>
                                <input id="f" type="radio" value="female" name="gender">
                            </div>
                        </center>

                        <div class="vaccine">
                            <label for="v1">Vaccined</label>
                            <input id="v1" type="checkbox" name="vaccine" value="vaccined" class="cb">
                            <input id="date" name="vaccine_date" type="date">


                        </div>

                        <!-- <div class="vaccine">
                            <label for="v2">Virus vaccine</label>
                            <input id="v2" type="checkbox" name="vaccine" value=" Virus vaccine">
                            <input id="date" name="vaccine_date" type="date">
                        </div> -->

                        <!-- check box nafs elname 3shan lw fi checkbox tany maitla8batosh  -->

                        <!-- <div class="vaccine">
                            <label for="v3">Rabies vaccine</label>
                            <input id="v3" type="checkbox" name="vaccine" value=" Rabies vaccine">
                            <input id="date" name="vaccine_date" type="date">
                        </div> -->
                        <center>
                            <div class="marriage">

                                <label for="m"> Mating need?</label>
                                <input id="m" type="checkbox" name="mating" value="1">
                            </div>
                        </center>
                    </div>
                    <a href ="./userprofile.php" >


                    <button id="signenter" type="submit" name="submit">Save</button> </a>

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