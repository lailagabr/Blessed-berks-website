<?php
// include("adminnavbar.php");
include ("connection.php");

$sel= "SELECT * FROM `admin` ";
$run_sel= mysqli_query($connect, $sel);
if(isset($_POST['submit'])){
    $admin_name= $_POST['admin_name'];
    $admin_email= $_POST['admin_email'];
    $admin_password= $_POST['admin_password'];
    $hashpassword= password_hash($admin_password, PASSWORD_DEFAULT);
    $admin_phone= $_POST['admin_phone'];
    $admin_qa= $_POST['admin_qa'];

    $uppercase= preg_match('@[A-Z]@', $admin_password);
    $lowercase= preg_match('@[a-z]@', $admin_password);
    $numbers= preg_match('@[0-9]@', $admin_password);
    $character= preg_match('@[^/w]@', $admin_password);
    
    $select= "SELECT * FROM `admin` WHERE `admin_email`= '$admin_email' ";
    $run_select= mysqli_query($connect, $select);

    $rows=mysqli_num_rows($run_select);
    if(strlen($admin_phone) != 11){
    echo "Phone Number Invalid!!";
    }elseif($uppercase <1 || $lowercase <1 || $numbers <1 || $character <1) {
    echo "Password must contain UPPERCASE, lowercase, numbers and special characters";
    }elseif($rows>0){
        echo "this Email is already taken";
    }else{
    $insert= "INSERT INTO `admin` VALUES (NULL, '$admin_name', '$admin_email', '$hashpassword', '$admin_phone', '$admin_qa')";
    $run_insert= mysqli_query($connect, $insert);
    header("location:add admin.php");
    
}
}

if(isset($_GET['delete'])){
    $id= $_GET['delete'];
    $delete= "DELETE FROM `admin` WHERE `admin_id` = $id";
    $run_delete= mysqli_query($connect, $delete);
    header("location:add admin.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Admin</title>

    <!-- bootstrap link -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- style -->
    <link rel="stylesheet" href="css/addadmin.css" />
    <link rel="stylesheet" href="css/adminnavbar.css" />
</head>

<body>
    <div class="content">
        <!-- cat or dog buttons -->
        <!-- <div class="types">
            <button type="button" class="type1"><i class="fa-solid fa-dog"></i></button>
            <button type="button" class="type2"><i class="fa-solid fa-cat"></i></button>
        </div> -->
    </div>
<!-- start side nav  -->
<div id="sideNav" class="side-nav">
        <ul>
            <li><a href="#">home page</a></li>
            <li><a href="./aproducts_dog.php">products</a></li>
            <li><a href="./finalcategory.php">categories</a></li>
            <li><a href="./inventory.php">inventory</a></li>
            <li><a href="./add admin.php">mange admin</a></li>
            <li><a href="./manageusers.php">mange users</a></li>
        </ul>
        <a href="" class="settings"><i class="fa-solid fa-gear"></i></a>
    </div>
    <!-- end side nav  -->

    <!-- main nav  -->
    <div class="main" id="mainDiv">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">blessed berks</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a id="toggleBtn" class="nav-link" href="#" tabindex="-1" aria-disabled="true"><i
                                    class="fa-solid fa-bars"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- end main nav  -->

    <div class="center">
        <button type="button" class="btn btn-outline-danger w-90" onclick="openpopup()">Add Admin</button>

        <div class="popup alert alert-warning" id="popup" role="alert">
            <div class="alert alert-warning  w-90" role="alert">
                <!-- start form  -->
                <form  method="post" enctype="multipart/form-data">
                    <div class="form-floating mb-3">
                        <input type="text" id="name" name="admin_name" class="form-control" placeholder="">
                        <label for="floatingInput">Admin Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" id="email" name="admin_email" class="form-control" placeholder="name@example.com">
                        <label for="floatingInput">Email Address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" id="password" name="admin_password" class="form-control" placeholder="">
                        <label for="floatingInput">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" id="phone" name="admin_phone" class="form-control" placeholder="">
                        <label for="floatingInput">Admin Phone Number</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" id="sequrity_q" name="admin_qa" class="form-control" placeholder="">
                        <label for="floatingPassword">who's your fav teacher?</label>
                    </div>

            </div>
            <!-- add button  -->
            <button type="submit" name="submit" class="btn btn-secondary btn-lg" onclick="closepopup()">Add</button>
            <!--  -->
            <button type="button" class="btn btn-secondary btn-lg" onclick="closepopup()">Cancel</button>


        </div>
        </form>
        <!-- end form  -->
    </div>

    <div>
        <h1 class="header">admins table </h1>
    </div>
    <!-- start table  -->
    <table id="example" class="table table-striped" style="width:90% ;margin:auto">
        <thead>
            <tr class= "head">
                <th>Admin Name</th>
                <th>Admin email</th>
                <th>Admin Phone Number</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <!-- first row start  -->
            <?php foreach($run_sel as $row) {?>
                <tr>
                    <td> <?php echo $row['admin_name']?> </td>
                    <td> <?php echo $row['admin_email']?> </td>
                    <td> <?php echo $row['admin_phone']?> </td>

                <td>
                    <button type="button" class="btn btn-outline-danger" onclick="openpopup2()">delete</button>
                    <div class="popup2 alert alert-danger" id="popup2" role="alert">
                        <h2>sure you wanna delete this admin !!</h2>

                        <!-- here is it anchor as you ordered  -->
                        <a href="add admin.php?delete= <?php echo $row['admin_id']?> " class="btn btn-outline-danger" onclick="closepopup2()">yes</a>
                        <!-- don't change on click !! -->
                        <button type="button" class="btn btn-outline-success" onclick="closepopup2()">no </button>
                    </div>
            <?php } ?>
                </td>
            </tr>
            <!-- first row end  -->


        </tbody>
    </table>
    <!-- end table  -->
    </div>
    </div>

<!-- bootstrap js link -->
<script src="js/bootstrap.min.js"></script>

<!-- main js -->
<script src="js/adminnavbar.js"></script>
    <!-- bootstrap js link -->
    <script src="js/bootstrap.min.js"></script>

    <!-- main js -->
    <script src="js/addadmin.js"></script>
</body>

</html>