<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brass 'n' Strings</title>
    <meta name="description" content="Fictional music store based in Des Moines, IA for an academic project">
    <meta name="author" content="Will Hedgecock">

    <link rel="stylesheet" type="text/css" href="css/brass.css">

    <!--MEDIA QUERIES STYLESHEET-->
    <link rel="stylesheet" type="text/css" href="css/home-media-queries.css">

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

    <style>
        footer {
            margin-top: 40px;
        }
        </style>
</head>

<body>

    <div class="header">
    
        <h1>Brass 'n' Strings</h1>
        <h2>Music Shop -- Academic Project</h2>

    </div>

    <div class="navbar" id="mainNavigation">

        <a href="index.php" class="active">Home</a>
        <a href="about.php">About Us</a>
        <a href="shop.php">Shop</a>
        <a href="contact.php">Contact Us</a>
        <a href="adminLogin.php">Admin Login</a>
        <a class="icon" onclick="createHamburgerMenu()";>
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <div class="desMoinesImage">

        <img id="desMoines" src="images/des-moines1.jpg" alt="Des Moines Skyline">

        <h1>Voted Des Moines' #1 choice for all things music.</h1>

        <a href="contact.php"><button class="homepageButton" type="button">Contact Us</button></a>

    </div>

    <div class="specials">

        <h1>Current Specials</h1>

        <div class="flex-specials">

            <div class="special1">
                <img src="images/guitar-homepage.jpg" alt="Shipping boxes">
                <h2>Free shipping on all orders over $500!</h2>
                
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                </p>
            </div>

            <div class="special2">
                <img src="images/online-lessons.jpg" alt="Online music lessons">
                <h2>Pandemic Special! 20% off all online lessons</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                </p>
            </div>

        </div>

    </div>

    <div class="band-promotion">

        <h1>Local band of the month -- The Other Brothers</h1>

        <iframe width="560" height="315" src="https://www.youtube.com/embed/-bFOf3pCCBk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

    </div>

    <?php include 'footer.php'?>
    
</body>
</html>