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
    <link rel="stylesheet" type="text/css" href="css/about-media-queries.css">

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

</head>

<div class="about-header">

    <h1>Brass 'n' Strings Music Shop</h1>

    <div class="navbar" id="mainNavigation">

        <a href="index.php">Home</a>
        <a href="about.php" class="active">About Us</a>
        <a href="shop.php">Shop</a>
        <a href="contact.php">Contact Us</a>
        <a href="adminLogin.php">Admin Login</a>
        <a class="icon" onclick="createHamburgerMenu()";>
            <i class="fa fa-bars"></i>
        </a>
    </div>

</div>  <!--END HEADER-->

<div class="background-square">
    <h2>About Us</h2>
</div>

<img class="about-us-img" src="images/about-us-img2.jpg" alt="Band playing live show">

<div class="about">
    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
         sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>
</div>



<div class="lessons">

    <h2>Lessons & Pricing</h2>

    <div class="flex-lessons">

        <div class="lesson-box">
            <h3>Pick your instrument</h3>
            <p>We offer lessons in piano, guitar, drums, bass and most all marching band instruments. Whether you want to learn
                a couple of songs or you want to be a master, we can get you where you want to go.
            </p>
        </div>

        <div class="lesson-box">
            <h3>Set your goals</h3>
            <p>What exactly do you want from the instrument you're learning? Contact us to set up an appointment with one of 
                our instructors to help you identify your goals.
            </p>
        </div>

        <div class="lesson-box">
            <h3>Find your passion</h3>
            <p>
                It is easy for beginners to get discouraged when learning but it all starts with practice.
                Once you find yourself improving, the passion will begin.
            </p>
        </div>

    </div>

</div>

<div class="lesson-pricing">

    <div class="lesson-price">

        <h2>Lesson to Lesson</h2>

        <img src="images/bass-lesson.jpg">

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>

        <ul>
            <li>Lorem Ipsum</li>
            <li>Lorem Ipsum</li>
            <li>Lorem Ipsum</li>
        </ul>

    </div>

    <div class="lesson-price">

        <h2>Lesson Packages</h2>

        <img src="images/sax-lesson.jpg">

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>

        <ul>
            <li>Lorem Ipsum</li>
            <li>Lorem Ipsum</li>
            <li>Lorem Ipsum</li>
        </ul>
        
    </div>

    <div class="lesson-price">

        <h2>Online Lessons</h2>
    
        <img src="images/acoustic-lesson.jpg">

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>

        <ul>
            <li>Lorem Ipsum</li>
            <li>Lorem Ipsum</li>
            <li>Lorem Ipsum</li>
        </ul>
        
    </div>

</div>

<?php include 'footer.php' ?>


</body>

</html>