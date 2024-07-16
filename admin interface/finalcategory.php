<?php
include("connection.php");
// include("adminnavbar.php");

if(isset($_POST['submit'])){
    $category_name=$_POST['categoryname'];
    $insertcat="INSERT INTO `category` VALUES (NULL , '$category_name' )";
    $runinsert=mysqli_query($connect,$insertcat);
    header("location:finalcategory.php");
}

$selectcat="SELECT * FROM `category` ";
$runselect=mysqli_query($connect,$selectcat);

if(isset($_GET['delete'])){
    $id= $_GET['delete'];
    $del = " DELETE FROM `category` WHERE `category_id`=$id ";
    $run_del=mysqli_query($connect,$del);
    header("location:finalcategory.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

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
    <div class="content">
        <!-- cat or dog buttons -->
        <!-- <div class="types">
            <button type="button" class="type1"><i class="fa-solid fa-dog"></i></button>
            <button type="button" class="type2"><i class="fa-solid fa-cat"></i></button>
        </div> -->
    </div>

    <div class="center">
        <button type="button" class="btn btn-outline-danger w-90" onclick="openpopup()">add category</button>

        <div class="popup alert alert-warning" id="popup" role="alert">
            <div class="alert alert-warning  w-90" role="alert">
                <!-- start form  -->
                <form method="post">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">add category</label>
                        <input type="text" class="form-control" name="categoryname" id="exampleFormControlInput1" placeholder="">
                    </div>
            </div>
            <!-- add button  -->
            <button type="submit" name="submit" class="btn btn-secondary btn-lg" onclick="closepopup()">add</button>
            <!--  -->
            <button type="button" class="btn btn-secondary btn-lg" onclick="closepopup()">cancel</button>
        </div>
        </form>
        <!-- end form  -->
    </div>


    <div>
        <h1 class="header">Categories table </h1>
    </div>
    <!-- start table  -->
    <table id="example" class="table table-striped" style="width:90% ;margin:auto">
        <thead>
            <tr>
                <th>category Name</th>


                <th>delete</th>
            </tr>
        </thead>
        <tbody><?php foreach($runselect as $rows) { ?>
            <!-- first row start  -->
            <tr>
                <td><?php echo $rows ['category_name']?></td>

                <td>
                    <button type="button" class="btn btn-outline-danger" onclick="openpopup2()">delete</button>
                    <div class="popup2 alert alert-danger" id="popup2" role="alert">
                        <h2>sure you wanna delete this Category !!</h2>

                        <!-- here is it anchor as you ordered  -->
                        <a href="finalcategory.php?delete=<?php echo $rows['category_id']?>" class="btn btn-outline-danger" onclick="closepopup2()">yes</a>
                        <!-- don't change on click !! -->
                        <button type="button" class="btn btn-outline-success" onclick="closepopup2()">no</button>
                    </div>
                </td>
            </tr>
            <!-- first row end  -->
             <?php } ?>

        </tbody>
    </table>
    <!-- end table  -->
    </div>
    </div>
    <script src="js/adminnavbar.js"></script>
    <!-- bootstrap js link -->
    <script src="js/bootstrap.min.js"></script>

    <!-- main js -->
    <script src="js/addadmin.js"></script>
</body>

</html>