<?php

session_start();

    if ($_SESSION['validUser'] !== "yes") {
        header("Location: ../index.php");
    }

    $product_name = "";
    $product_category = "";
    $product_description = "";
    $product_price = "";
    $product_in_stock = "";
    $product_img = "";
    $product_pay_button = "";

    $product_name_err = "";
    $product_category_err = "";
    $product_description_err = "";
    $product_price_err = "";
    $product_stock_err = "";
    $product_img_err = "";
    $product_pay_button_err = "";

    $validForm = false;

    $updateProductId = $_GET['productId'];

    if (isset($_POST['submit'])) {

    $product_name = $_POST['product_name'];
    $product_category = $_POST['product_category'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $product_in_stock = $_POST['product_in_stock'];
    $product_img = $_FILES['product_img']['name'];
    $product_pay_button = $_POST['product_pay_button'];


    if ( $_POST['product_style'] != "1") {
        die("Form could not be submitted");
        }

    //VALIDATION FUNCTIONS

    function validateName($inValue) {
        global $validForm, $product_name_err;
        $product_name_err = "";

        if ($inValue == "") {
            $validForm = false;
            $product_name_err = "Please fill in product name";
        }
    }

    function validateCategory($inValue) {
        global $validForm, $product_category_err;
        $product_category_err = "";

        if ($inValue == "default") {
            $validForm = false;
            $product_category_err = "Please select a category";
        }
    }

    function validateDescription($inValue) {
        global $validForm, $product_description_err;
        $product_description_err = "";

        if ($inValue == "") {
            $validForm = false;
            $product_description_err = "Please enter a product description";
        }
    }

    function validatePrice($inValue) {
        global $validForm, $product_price_err;
        $product_price_err = "";

        if ($inValue == "") {
            $validForm = false;
            $product_price_err = "Please enter a product price";
        }
    }

    function validateStock($inValue) {
        global $validForm, $product_stock_err;
        $product_stock_err = "";

        if ($inValue == "") {
            $validForm = false;
            $product_stock_err = "Please enter a product stock";
        }
    }

    function validateImg($inValue) {
        global $validForm, $product_img_err;
        $$product_img_err = "";

        if ($inValue == "") {
            $validForm = false;
            $product_img_err = "Please select a product image";
        }
    }

    function validatePaymentButton($inValue) {
        global $validForm, $product_pay_button_err;
        $product_pay_button_err = "";

        if ($inValue == "") {
            $validForm = false;
            $product_pay_button_err = "Please enter a product stock";
        }
    }

    $validForm = true;

    validateName($product_name);
    validateCategory($product_category);
    validateDescription($product_description);
    validatePrice($product_price);
    validateStock($product_in_stock);
    validateImg($product_img);
    validatePaymentButton($product_pay_button);

    if ($validForm) {

        try {

            require "../dbConnect.php";

            $sql = "UPDATE portfolio_project SET ";
            $sql .= "product_name = '$product_name', ";
            $sql .= "product_category = '$product_category', ";
            $sql .= "product_description = '$product_description', ";
            $sql .= "product_price = '$product_price', ";
            $sql .= "product_in_stock = '$product_in_stock', ";
            $sql .= "product_img = '$product_img', ";
            $sql .= "product_pay_button = '$product_pay_button' ";
            $sql .= "WHERE product_id = '$updateProductId'";

            $stmt = $conn->prepare($sql);

            $stmt->execute();

        }
        
        catch(PDOException $e)  {

            $message = "There has been a problem. The system administrator has been contacted. Please try again later.";
      
            error_log($e->getMessage());
            error_log($e->getLine());
            error_log(var_dump(debug_backtrace()));
          
              header('Location: ../errorFile/505_error_response_page.php');				
        }

    } else {
        $message = "The product could not be updated";
    }

} //end if submit

    else {

        try {

            require "../dbConnect.php";

            $sql = "SELECT ";
            $sql .= "product_name, ";
            $sql .= "product_category, ";
            $sql .= "product_description, ";
            $sql .= "product_price, ";
            $sql .= "product_in_stock, ";
            $sql .= "product_img, ";
            $sql .= "product_pay_button ";
            $sql .= "FROM portfolio_project ";
            $sql .= "WHERE product_id= $updateProductId";

            $stmt = $conn->prepare($sql);

            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $product_name = $row['product_name'];
            $product_category = $row['product_category'];
            $product_description = $row['product_description'];
            $product_price = $row['product_price'];
            $product_in_stock = $row['product_in_stock'];
            $product_img = $row['product_img'];
            $product_pay_button = $row['product_pay_button'];
        }

        catch(PDOException $e) {
            $message = "There has been a problem. The system administrator has been contacted. Please try again later.";
      
            error_log($e->getMessage());
            error_log($e->getLine());
            error_log(var_dump(debug_backtrace()));
          
              header('Location: ../errorFile/505_error_response_page.php');
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>

    <link rel="stylesheet" type="text/css" href="../css/about.css">
    <link rel="stylesheet" type="text/css" href="../css/brass.css">
    <link rel="stylesheet" type="text/css" href="../css/inputUpdate.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Carter+One&family=Thasadith&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fondamento&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    

</head>

<body>

<div class="about-header">

    <h1>Brass 'n' Strings Music Shop</h1>

    <div class="navbar" id="mainNavigation">

        <a href="../index.php">Home</a>
        <a href="../about.php">About Us</a>
        <a href="../shop.php">Shop</a>
        <a href="../contact.php">Contact Us</a>
        <a href="../adminLogin.php">Admin Login</a>
        <a class="icon" onclick="createHamburgerMenu()";>
            <i class="fa fa-bars"></i>
        </a>
    </div>

</div>

<h1 class="updateHeader">Update a product</h1>

<?php 

        if($validForm) {

        ?>

        <h1>Your product has has been updated</h1>

        <?php 

        } else {

            ?>
    
    </div>




    <div class="inputContainer">

    <form action="<?php echo $_SERVER['PHP_SELF'] . "?productId=$updateProductId"; ?>" method="POST" class="inputEvent" enctype="multipart/form-data">

        <p class="inputField">
            <label for="product_name">Product Name: </label>
            <input type="text" id="product_name" name="product_name" value="<?php echo $product_name?>"><span class="errorMsg"><?php echo $product_name_err?></span>
        </p>

        <p class="inputField">

            <p style="display: inline" class="category">Category: </p>

            <select name="product_category" id="product_category">
                <option value="default">--Select a category--</option>
                <option value="Brass">Brass</option>
                <option value="Strings">Strings</option>
            </select><span class="errorMsg"><?php echo $product_category_err?></span>

        </p>

        <p class="inputField">
            <label for="product_description">Product Description: </label>
            <textarea id="product_description" name="product_description"><?php echo $product_description?></textarea><span class="errorMsg"><?php echo $product_description_err?></span>
        </p>

        <!--HONEY POT FIELD-->
        <p class="inputField">
            <label style="display: none;" for="product_style">Product Style: </label>
            <input type="text" id="product_style" name="product_style" style="display: none" autocomplete="off" value="1">
        </p>
        <!--END HONEYPOT FIELD-->

        <p class="inputField">
            <label for="product_price">Product Price: </label>
            <input type="number" step="0.01" id="product_price" name="product_price" value="<?php echo $product_price?>"><span class="errorMsg"><?php echo $product_price_err?></span>
        </p>

        <p class="inputField">
            <label for="product_in_stock">Product Stock: </label>
            <input type="number" id="product_in_stock" name="product_in_stock" value="<?php echo $product_in_stock?>"><span class="errorMsg"><?php echo $product_stock_err?></span>
        </p>

        <p class="inputField">
            <label for="product_img">Product Image: </label>
            <input type="file" id="product_img" name="product_img"><span class="errorMsg"><?php echo $product_img_err?></span> 
        </p>
        
        <p class="inputField">
            <label for="product_pay_button">Paypal Button Code: <label><span class="errorMsg"><?php echo $product_pay_button_err?></span>
            <textarea id="product_pay_button" name="product_pay_button"><?php echo $product_pay_button?></textarea>
        </p>

        <input type="submit" name="submit" id="submit">
        <input type="reset" id="reset" name="reset">

    </form>
        </div>

    <?php } ?>

    <?php include "../footer.php" ?>




    
</body>

</html>