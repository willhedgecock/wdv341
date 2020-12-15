<?php

session_start();

if ($_SESSION['validUser'] !== "yes") {
    header("Location: ../index.php");
}

    try {

        require '../dbConnect.php';

        $sql = "SELECT product_id, product_name, product_description, product_img FROM portfolio_project WHERE product_category = 'Brass'";
        $sql2 = "SELECT product_id, product_name, product_description, product_img FROM portfolio_project WHERE product_category = 'Strings'";

        $stmt = $conn->prepare($sql);
        $stmt2 = $conn->prepare($sql2);
        
        $stmt->execute();	
        $stmt2->execute();	
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt2->setFetchMode(PDO::FETCH_ASSOC);

    }

    catch(PDOException $e) {

	  $message = "There has been a problem. The system administrator has been contacted. Please try again later.";

	  error_log($e->getMessage());
	  error_log($e->getLine());
      error_log(var_dump(debug_backtrace()));
       
      header('Location: files/505_error_response_page.php');	//sends control to a User friendly page
      					
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Products</title>

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

    <style>
h1 {
    margin-top: 20px;
}

.product-container {
    max-width: 95%;
    margin: auto;
}



    </style>
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

<div class="product-container">

    <header>
        <h1>Update or delete a product</h1>
    </header>

    <div class="display-main">
    
        <?php
            while ( $row=$stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>

        <div class="displayBlock">
                <div class="brass-row">
                    <span class="productImg"><img src="../product-images/<?php echo $row['product_img']?>"></span>
                </div>
                <div class="brass-row">
                    <span class="productName"><?php echo $row['product_name']?></span>
                </div>

                <div class="brass-row">
                    <span class="productDesc"><?php echo $row['product_description']?></span>
                </div>

                <div class="updateDelete">
                    <?php $product_id = $row['product_id']; ?>
                    <a href="updateProduct.php?productId=<?php echo $product_id; ?>"><button>Update Product</button></a>
                    <a href="deleteProduct.php?productId=<?php echo $product_id; ?>"><button>Delete Product</button></a>
                </div>
        </div>

        <?php } ?>

        <?php
            while ( $row=$stmt2->fetch(PDO::FETCH_ASSOC)) {
        ?>

        <div class="displayBlock">
                <div class="string-row">
                    <span class="productImg"><img src="../product-images/<?php echo $row['product_img']?>"></span>
                </div>
                <div class="string-row">
                    <span class="productName"><?php echo $row['product_name']?></span>
                </div>

                <div class="string-row">
                    <span class="productDesc"><?php echo $row['product_description']?></span>
                </div>

                <div class="updateDelete">
                    <?php $product_id = $row['product_id']; ?>
                    <a href="updateProduct.php?productId=<?php echo $product_id; ?>"><button>Update Product</button></a>
                    <a href="deleteProduct.php?productId=<?php echo $product_id; ?>"><button>Delete Product</button></a>
                </div>
        </div>

        <?php } ?>
    
    </div>

</div>

<?php include "../footer.php" ?>

    
</body>


</html>