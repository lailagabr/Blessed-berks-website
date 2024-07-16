<?php
include("connection.php");
// include("adminnavbar.php");
$select="SELECT * FROM `product`";
$runS=mysqli_query($connect,$select);
// if(isset($_GET["new_inventory"])){
//     $inventory=$_GET["new_inventory"];
    // $inventory=40;
//     echo $inventory;
// if(isset($_GET["edit"])){
//         $id=$_GET["edit"];
//         $edit="UPDATE `product` SET `inventory`='$inventory' WHERE `product_id`=$id";
//         $run_edit=mysqli_query($connect,$edit);
//             header("location:inventory.php");
     
    
if(isset($_POST["edit"])){
    $id=$_POST["product_id"];
    $inventory=$_POST["new_inventory"];
    $edit="UPDATE `product` SET `inventory`='$inventory' WHERE `product_id`=$id";
    $run_edit=mysqli_query($connect,$edit);
            header("location:inventory.php");
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
    <link rel="stylesheet" href="css/categories.css" />
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

    <div class="center">


        </div>

        <div>
            <h1 class="header">inventory table </h1>
        </div>
        <!-- start table  -->
        <table id="example" class="table table-striped" style="width:90% ;margin:auto">
            <thead>

                <tr>
                    <th>product Name</th>
                    <th>quantity</th>
                    <th>edit</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($runS as $data) {?>
                <!-- first row start  -->
                <tr>
                    <td><?php echo $data['product_name']?></td>
                    <td><?php echo $data['inventory']?></td>


                    <td>
                        <button type="button"  class="btn btn-outline-warning" onclick="openpopup()">edit</button>
        <!-- edit form  -->

        <div class="popup alert alert-light bg" id="popup" role="alert">
            <div class="alert alert-light bg w-90" role="alert">
                <!-- start form  -->
                <div class="mb-3">
                    <form method="POST">
                    <label for="exampleFormControlInput1" class="form-label">quantity</label>
                    <input type="number"  class="form-control" id="exampleFormControlInput1"  name="new_inventory" placeholder="">
                    <input type="hidden" value="<?php echo $data["product_id"]?>" name="product_id">
                    <button class="btn btn-secondary btn-lg" name="edit" onclick="closepopup()" >edit</button>
                    <button type="button" class="btn btn-secondary btn-lg" onclick="closepopup()">cancel</button>
                </form>
                </div>
                <!-- end form  -->
                 
            </div>
            <!-- edit anchor  -->
           
            <!--  -->
            
            <!-- end edit form  -->
                        </div>
    </div>
    </td>
    </tr>
    <!-- first row end  -->
    <?php } ?>

    </tbody>
    </table>
    <!-- end table  -->
    </div>

    <!-- bootstrap js link -->
    <script src="js/bootstrap.min.js"></script>

    <!-- main js -->
    <script src="js/categories.js"></script>
</body>

</html>