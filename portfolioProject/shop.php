<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brass 'n' Strings</title>
    <meta name="description" content="Fictional music store based in Des Moines, IA for an academic project">
    <meta name="author" content="Will Hedgecock">

    <link rel="stylesheet" type="text/css" href="css/brass.css">
    <link rel="stylesheet" type="text/css" href="css/about.css">

    <!--MEDIA QUERIES STYLESHEET-->
    <link rel="stylesheet" type="text/css" href="css/shop-media-queries.css">


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Carter+One&family=Thasadith&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Fondamento&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/brass.js"></script>

    <!--COOKIE FOR PURCHASE-->
    <style>

        h1 + form {
            display: inline;
            float: right;
            position: relative;
            top: 25px;
        }

        .brass-header {
            display: inline-block;
        }

        h1 + form input {
            width: 150px;
            padding: 2px;
            border: 2px solid black;
            border-radius: 20px;
            background-color: #cae6f2;
        }

        h1 + form input:hover {
            width: 160px;
        }

        .flex-footer {
            top: 80px;
        }
    </style>


</head>

<div class="about-header">

    <h1>Brass 'n' Strings Music Shop</h1>

    <div class="navbar" id="mainNavigation">

        <a href="index.php">Home</a>
        <a href="about.php">About Us</a>
        <a href="shop.php"  class="active">Shop</a>
        <a href="contact.php">Contact Us</a>
        <a href="adminLogin.php">Admin Login</a>

        <a class="icon" onclick="createHamburgerMenu()";>
            <i class="fa fa-bars"></i>
        </a>
    </div>

</div>

<?php

	try {
	  
	  require "dbConnect.php";	//CONNECT to the database

      $sql = "SELECT * FROM portfolio_project WHERE product_category = 'Brass'";
      $sql2 = "SELECT * FROM portfolio_project WHERE product_category = 'Strings'";
	  
	  //PREPARE the SQL statement
      $stmt = $conn->prepare($sql);
      $stmt2 = $conn->prepare($sql2);
	  
	  //EXECUTE the prepared statement
      $stmt->execute();	
      $stmt2->execute();	
	  
	  //Prepared statement result will deliver an associative array
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $stmt2->setFetchMode(PDO::FETCH_ASSOC);
      
      //$row = $stmt->fetch(PDO::FETCH_ASSOC);
      //$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
  }
  
  catch(PDOException $e)
  {
	  $message = "There has been a problem. The system administrator has been contacted. Please try again later.";

	  error_log($e->getMessage());			//Delivers a developer defined error message to the PHP log file at c:\xampp/php\logs\php_error_log
	  error_log($e->getLine());
	  error_log(var_dump(debug_backtrace()));					
  }

?>

<div class="main-content">

    <div class="brass">

        <h1 class="brass-header">Brass Instruments</h1>

        <form id="view-cart" target="paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" >
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
            <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_viewcart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </form>

        <div class="product-flex">

        <?php while($row=$stmt->fetch(PDO::FETCH_ASSOC)) { ?>        

        <div class="productBlock">

            <div class="productImage">
                <img src="product-images/<?php echo $row['product_img']?>">
            </div>
    
            <div class="productInfo">
                <p class="productName"><?php echo $row['product_name']?></p>	
                <p class="productDesc"><?php echo $row['product_description']?></p>
                <p class="productPrice"><?php echo "$". $row['product_price']?></p>
                <p class="productPayment"><?php echo $row['product_pay_button']?></p>
            </div>

        </div>

        <?php } ?>

        </div>

    </div>

    <div class="strings">

        <h1>String Instruments</h1>

        <div class="product-flex">

        <?php while($row2=$stmt2->fetch(PDO::FETCH_ASSOC)) { ?>        

            <div class="productBlock">

                <div class="productImage">
                    <img src="product-images/<?php echo $row2['product_img']?>">
                </div>
                
                <div class="productInfo">
                    <p class="productName"><?php echo $row2['product_name']?></p>	
                    <p class="productDesc"><?php echo $row2['product_description']?></p>
                    <p class="productPrice"><?php echo "$". $row2['product_price']?></p>
                    <p class="productPayment"><?php echo $row2['product_pay_button']?></p>
                </div>

            </div>

            <?php } ?>
        
        </div>



    </div>

    <div class="digitalGoods">

        <h1>Digital Downloads</h1>

        <div class="product-flex">

            <div class="productBlock">

                    <div class="productImage">
                        <img src="downloads/easy-guitar-chords.jpg" alt="Beginner Guitar Chords">
                    </div>
                    
                    <div class="productInfo">
                        <p class="productName">Beginner Guitar Chords</p>	
                        <p class="productDesc">This is exactly what the beginner guitarists needs to get them started putting their favorite songs togeter</p>
                        <p class="productPrice">$2.99</p>
                        <p class="productPayment"></p>
                    </div>

                    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="W8RLYLZ6GC5MW">
                        <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                    </form>



            </div>

            <div class="productBlock">

                    <div class="productImage">
                        <img src="product-images/scale-shapes.jpg" alt="Beginner Scale Shapes">
                    </div>
                    
                    <div class="productInfo">
                        <p class="productName">Beginner Guitar Scale Shapes</p>	
                        <p class="productDesc">Get an introduction to the Pentatonic scale shapes with this PDF document. This will show you the major and minor pentatonic scale shapes for you to master</p>
                        <p class="productPrice">$1.99</p>
                        <p class="productPayment"></p>
                    </div>

                    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="2SHMQX56JUTXU">
                        <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                    </form>




            </div>

            <div class="productBlock">

                    <div class="productImage">
                        <img src="product-images/guitar-video.jpg">
                    </div>
                    
                    <div class="productInfo">
                        <p class="productName">Sample Guitar Video</p>	
                        <p class="productDesc">See one of our instructors shred on his Strat. If you take lessons with us, this is what you can look forward to!</p>
                        <p class="productPrice">$0.99</p>
                        <p class="productPayment"></p>
                    </div>

                    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="DLEMWV2C5T9XC">
                        <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                    </form>




            </div>

        </div> <!--END PRODUCT FLEX-->

    </div> <!--END DIGITAL GOODS-->

</div> <!--END MAIN CONTENT-->

<?php include 'footer.php' ?>