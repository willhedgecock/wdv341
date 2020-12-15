<?php 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B&S MP4 Download</title>

    <link rel="stylesheet" type="text/css" href="../css/brass.css">
    <link rel="stylesheet" type="text/css" href="../css/about.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Carter+One&family=Thasadith&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Fondamento&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../js/brass.js"></script>

    <style>
        body {
            text-align: center;
        }

        .about-header {
            margin-bottom: 20px;
        }

        img {
            max-width: 800px;
            margin-top: 20px;
        }

        button {
            display: block;
            margin: 10px auto;
            font-family: 'Nerko One', cursive;
            width: 200px;
            font-size: 1.5em;
            text-decoration: none;
            text-transform: uppercase;
            cursor: pointer;
            background-color: #cae6f2;
            border-radius: 10px;
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
            <a href="../adminLogin.php">Sign in</a>
            <a class="icon" onclick="createHamburgerMenu()";>
                <i class="fa fa-bars"></i>
            </a>
        </div>
    
    </div>

    <img src="../images/highfive.gif" alt="High five GIF">

    <h1>Thank you so much for your purchase!</h1>
    <h2>Download your video below</h2>

        <img src="../product-images/guitar-video.jpg" alt="Guitar video">
    <a href="../downloads/guitar-video.mp4" download>
        <button type="button">Download</button>
    </a>



    
</body>
</html>