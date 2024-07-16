<?php include("connection.php");
$records = mysqli_query($connect, "SELECT * FROM product");
$data = mysqli_fetch_array($records);
// include("adminnavbar.php");
if(isset($_POST['submit'])){
    $name=$_POST['product_name'];
    $image = $_FILES['product_photo']['name'];        
    $price=$_POST['product_price'];       
    $inventory=$_POST['inventory'];   
    $description=$_POST['product_descrption'];
    $category=$_POST['category_id'];
    $hide=$_POST['display'];


    $insert = "INSERT INTO `product` VALUES (NULL,'$name',NULL ,'$image' ,'$price'
                                                ,'$inventory','$description', NULL , '$category', '$hide')";
          $run_insert=mysqli_query($connect,$insert);  
          $move_uploaded = move_uploaded_file($_FILES['product_photo']['tmp_name'] , "./images/".$image  );
          
          header('location:aproducts_dog.php');
}
//display
$category_id= 1;
$select="SELECT * FROM `product`  JOIN `category` ON `product` . `category_id` = `category` . `category_id` 
WHERE `category`.`category_id` = $category_id && `hidden` ='show'" ;
$run_select=mysqli_query($connect,$select);
$key = mysqli_fetch_all($run_select, MYSQLI_ASSOC);

//hide

if(isset($_GET['hide'])) { 
$id = $_GET['hide']; 
$update= "UPDATE `product` SET `hidden` = 'hide' WHERE `product_id` = $id";
$runq=mysqli_query($connect, $update); 
header('location:aproducts_dog.php');
}
//delete
$select = "SELECT * FROM `product`  JOIN `category`  
ON `product`.`category_id` = `category`.`category_id` WHERE `hidden` = 'show'  ";
$RunOne=mysqli_query($connect, $select);
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete ="DELETE FROM `product`
    WHERE `product_id` = $id";
    $run_delete = mysqli_query($connect , $delete);
    header("location:aproducts_dog.php");} 
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete= "DELETE FROM `product` WHERE `product_id` = $id";
    $run_delete = mysqli_query( $connect , $delete);
    header("location:aproducts_dog.php");
}

// EDIT

if (isset($_POST['edit'])) {
    $id = $_POST['product_id'];
    $pd_name = $_POST['edit_name'];
    $pd_price = $_POST['edit_price'];
    $pd_description = $_POST['edit_description'];
    $pd_inventory = $_POST['edit_inventory'];

    $edit="UPDATE `product` SET `product_name` = '$pd_name', `product_price` = '$pd_price',
     `product_descrption` = '$pd_description', `inventory` = '$pd_inventory' WHERE `product_id` = $id";
    $run_edit = mysqli_query($connect, $edit);
    header("Location: aproducts_dog.php");
 
}

?>

<html>

<head>
    <title>Blissed Berks</title>
    <!-- bootstrap link -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/aproducts.css">
    <link rel="stylesheet" href="css/adminnavbar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton+SC&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <!-- cat or dog iconss -->
        
        <div class="types">
        <button type="button" class="type1"><i class="fa-solid fa-dog"></i></button>
            <a href="./aproducts_cat.php" >
            <button type="button" class="type2" ><i class="fa-solid fa-cat"></i></button></a>
        </div>

        
        <div class="first">
            <button type="submit" class="btn3 " onclick="openpopup()">add </button>
        </div>


        <!-- categories buttons -->
        <!-- <div class="categories">
            <button type="button" class="btn3">food</button>
            <button type="button" class="btn3">toys</button>
            <button type="button" class="btn3">clothes</button>
            <button type="button" class="btn3">litter</button>
        </div> -->

        <div>



            <div class="popup alert alert-light bg" id="popup" role="alert">
                <div class="alert alert-light bg  w-90" role="alert">
                    <!-- start form  -->
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-floating mb-3">
                            <input type="text" name="product_name" class="form-control" placeholder="">
                            <label for="floatingInput">product name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="file" name="product_photo" class="form-control" placeholder="name@example.com">
                            <label for="floatingInput">product image</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" name="product_price" class="form-control" placeholder="">
                            <label for="floatingInput">product price</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" name="inventory" class="form-control" placeholder="">
                            <label for="floatingInput">inventory </label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" name="product_descrption" placeholder="Leave a comment here"
                                id="floatingTextarea"></textarea>
                            <label for="floatingTextarea">product description</label>
                        </div>

                        <div class="form-check form-check-inline">
                        
                            <input class="form-check-input" type="radio" name="category_id" id="inlineRadiodog"
                                value="1">
                            <label class="form-check-label" for="inlineRadiodog">Dog</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="category_id" id="inlineRadiocat"
                                value="2">
                            <label class="form-check-label" for="inlineRadiocat">Cat</label>
                        </div>                        
<br>
                        <div class="form-check form-check-inline">

                            <input class="form-check-input" type="radio" name="display" id="inlineRadio1"
                                value="show">
                            <label class="form-check-label" for="inlineRadio1">show</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="display" id="inlineRadio2"
                                value="hide">
                            <label class="form-check-label" for="inlineRadio2">hide</label>
                        </div>



                </div>
                <!-- add button  -->
                <button type="submit" name="submit" class="actionbtn2 btn-secondary btn-lg" onclick="closepopup()">add</button>
                <!--  -->
                <button type="button" class="actionbtn2 btn-secondary btn-lg" onclick="closepopup()">cancel</button>


            </div>
            </form>
            <!-- end form  -->

        </div>




        <!-- cards -->
        <div class="cards1">
            <!-- start card  -->
            <?php 
            foreach ($key as $data){
                $image_path = 'images/' . ($data['product_photo']);
                ?>
            <div class="card">
            <?php if (!empty($data['product_photo'])) { ?>
                <img class="img" src="<?php echo $image_path; ?>" alt="<?php echo ($data['product_photo']); ?>">
                
                <?php } ?>
                <!-- <img src="images/1.jpg" alt=""> -->
            <h2><?php echo $data ['product_name'] ?></h2>
                <p>$<?php echo $data ['product_price'] ?></p>
                <div class="actiondiv">
                    
                    <div class="actiondiv">
                <a class="actionbtn" onclick="openpopup2()">edit</a> 
                    <a href="aproducts_dog.php?delete=<?php echo $data ['product_id']?>" class="actionbtn">delete</a>
                    <a  class="actionbtn" href="aproducts_dog.php?hide=<?php echo $data ['product_id']?>" >hide</a>
                    <!-- <button type="button" class="btn btn-outline-danger actionbtn2" onclick="openpopup3()">delete</button>
                <button type="button" class="btn btn-outline-danger actionbtn2" onclick="openpopup3()">delete</button> -->
                </div>
                </div>
                </div>
                 <?php  } ?>
                </div>
                </div>
                </div>
                
            
        
                     <!-- <btton type="button" class="btn btn-outline-danger actionbtn2" onclick="openpopup3()">hide</button>
                    <button type="button" class="btn btn-outline-danger actionbtn2"
                        onclick="openpopup4()">delete</button> -->
                </div>

            </div>

        </div> 
        <!-- end card  -->

        <!-- comment from here    -->
        <!-- start card  -->
        <!-- <div class="card"><img src="images/1.jpg" alt="">
            <h2>Dog Leash 1.5m Adjustable Safe Lead</h2>
            <p>$17.60</p>

            <div class="actiondiv">

                <a class="actionbtn" onclick="openpopup2()">edit</a> -->
                <!-- <a class="actionbtn" onclick="openpopup3()">hide</a> -->
                <!-- <button type="button" class="btn btn-outline-danger actionbtn2" onclick="openpopup3()">delete</button>
                <button type="button" class="btn btn-outline-danger actionbtn2" onclick="openpopup3()">delete</button>
            </div> -->

        </div>
        <!-- end card  -->
        <!-- start card  -->
        <!-- <div class="card"><img src="images/1.jpg" alt="">
            <h2>Dog Leash 1.5m Adjustable Safe Lead</h2>
            <p>$17.60</p>

            <div class="actiondiv">

                <a class="actionbtn" onclick="openpopup2()">edit</a>
                 <a class="actionbtn" onclick="openpopup3()">hide</a> -->
                <!-- <button type="button" class="btn btn-outline-danger actionbtn2" onclick="openpopup3()">delete</button>
                <button type="button" class="btn btn-outline-danger actionbtn2" onclick="openpopup3()">delete</button> -->
            </div>

        </div> 
        <!-- end card  -->

        <!-- till here  -->

    </div>
    </div>





    <div class="popup2 alert alert-light bg" id="popup2" role="alert">
        <div class="alert alert-light  w-90" role="alert">
            <!-- start edit form  -->
            <form method="POST" enctype="multipart/form-data">
        <div class="form-floating mb-3">
            <input type="text" name="edit_name" class="form-control" placeholder="">
            <label for="floatingInput">Product Name</label>
        </div>
        <!-- <div class="form-floating mb-3">
            <input type="file" name="edit_image" class="form-control" placeholder="name@example.com">
            <label for="floatingInput">Product Image</label>
        </div> -->
        <div class="form-floating mb-3">
            <input type="number" name="edit_price" class="form-control" placeholder="" >
            <label for="floatingInput">Product Price</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" name="edit_inventory" class="form-control" placeholder="">
            <label for="floatingInput">Inventory</label>
        </div>
        <div class="form-floating">
            <textarea class="form-control" name="edit_description" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
            <label for="floatingTextarea">Product Description</label>
        </div>
        <input type="hidden" value="<?php echo $data["product_id"]?>" name="product_id">

        <!-- Add button -->
        <button type="submit" name="edit" class="btn btn-secondary btn-lg" onclick="closepopup2()">edit</button>

        <button type="button" class="btn btn-secondary btn-lg" onclick="closepopup2()">cancel</button>
        

    
    </form>
    <!-- end form  -->




    <!-- pop up 3  -->

    <div class="popup3 alert alert-danger" id="popup3" role="alert">
        <h2>sure you wanna hide this item ?!</h2>

        <!-- here is it anchor as you ordered  -->
        <a class="btn btn-outline-danger" onclick="closepopup3()">yes</a>
        <!-- don't change on click !! -->
        <button type="submit" class="btn btn-outline-success" onclick="closepopup3()">no </button>
    </div>

    <!-- end popup 3  -->

    <!-- pop up 4  -->

    <div class="popup4 alert alert-danger" id="popup4" role="alert">
        <h2>sure you wanna delete this item ?!</h2>

        <!-- here is it anchor as you ordered  -->
        <a class="btn btn-outline-danger" onclick="closepopup4()">yes</a>
        <!-- don't change on click !! -->
        <button type="submit" class="btn btn-outline-success" onclick="closepopup4()">no </button>
    </div>

    <!-- end popup 3  -->

    </div>
    <script src="js/adminnavbar.js"></script>
    <!-- bootstrap js link -->
    <script src="js/bootstrap.min.js"></script>

    <!-- main js -->
    <script src="js/addadmin.js"></script>
</body>

</html>