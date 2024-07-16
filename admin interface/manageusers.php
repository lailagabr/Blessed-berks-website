<?php
include("connection.php");
// include("adminnavbar.php");
$select="SELECT * FROM `user`";
$runQ=mysqli_query($connect,$select);
if (isset($_GET["delete"])){
    $id=$_GET["delete"];
    $delete="DELETE FROM `user` WHERE `user_id`=$id";
    $run_delete=mysqli_query($connect,$delete);
    header("location:manageusers.php");
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
  <link rel="stylesheet" href="css/addadmin.css"/>
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

  <div>
    <h1 class="header">blessed berks users </h1>
  </div>

  <!-- start table  -->
  <table id="example" class="table table-striped" style="width:90% ;margin:auto">
    <thead>
      <tr>
        <th> Name</th>
        <th>email</th>
        <th>number</th>
        <th>adress</th>
        <th>delete</th>
      </tr>
    </thead>
    <tbody>
     <?php foreach($runQ as $data){?>
      <!-- first row start  -->
      <tr>
      <td><?php echo $data["user_name"]?></td>
            <td><?php echo $data["user_email"]?></td>
            <td><?php echo $data["user_phone"]?></td>
            <td><?php echo $data["user_address"]?></td>
            <td><button  type="button" class="btn btn-outline-danger" onclick="openpopup()">delete</button>
        <!-- <td><a href="manageusers.php?delete=<?php echo $data["user_id"]?>">delete</a> -->
          <div class="popup alert alert-danger" id="popup" role="alert">
            <h2>sure you wanna delete this admin !!</h2>
            <!-- here is it anchor as you ordered  -->
            <a a href="manageusers.php?delete=<?php echo $data["user_id"]?>" class="btn btn-outline-danger" onclick="closepopup()">yes</a>
            <!-- don't change on click !! -->
            <button type="button" class="btn btn-outline-success" onclick="closepopup()">no </button>
          </div>
          </div>
        </td>
      </tr>
      <?php }?>
      <!-- first row end  -->


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