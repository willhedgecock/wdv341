<?php
session_cache_limiter('none');
session_start();
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
    <link rel="stylesheet" type="text/css" href="css/adminLogin.css">

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

<body>

    <div class="about-header">

        <h1>Brass 'n' Strings Music Shop</h1>

        <div class="navbar" id="mainNavigation">

            <a href="index.php">Home</a>
            <a href="about.php">About Us</a>
            <a href="shop.php">Shop</a>
            <a href="contact.php">Contact Us</a>
            <a href="adminLogin.php"  class="active">Admin Login</a>
            <a class="icon" onclick="createHamburgerMenu()";>
                <i class="fa fa-bars"></i>
            </a>
        </div>

    </div>

<?php



$message = "";
$errorMessage = "";
$_SESSION['validUser'] = "";


    if ($_SESSION['validUser'] == "yes") {

    } 
    
    else {

        if ( isset($_POST['submitButton']) ) {

            $username = $_POST['portfolio_user'];
            $userpassword = $_POST['portfolio_user_password'];

            try {

                require "dbConnect.php";

                $sql = "SELECT ";
                $sql .= "portfolio_user, ";
                $sql .= "portfolio_user_password ";
                $sql .= "FROM portfolio_user ";
                $sql .= "WHERE portfolio_user = :username AND portfolio_user_password = :password";

                $stmt = $conn->prepare($sql);

                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $userpassword);

                $stmt->execute();

                $stmt->setFetchMode(PDO::FETCH_ASSOC);

            }

            catch(PDOException $e) {

                error_log($e->getMessage());
                error_log($e->getLine());
                error_log(var_dump(debug_backtrace()));

                header ('Location: errorFile/505_error_response_page.php');

            }

    $row = $stmt->fetch();


    if ($row['portfolio_user'] === $username) {

        $_SESSION['validUser'] = "yes";
        $message = "Welcome back, $username!";        
    } 
    
    else {
        $_SESSION['validUser'] = "no";
        $errorMessage = "* Sorry, your username or password don't match our records. Please try again. *";
    }

}

}


?>

<?php

    if ( !empty($message) ) {
        echo "<h2 class='displayMessage'>$message</h2>";
        
    } else {
        echo "<p class='errMsg'>$errorMessage</p>";
    }

?>

<?php

    //echo "Echoing the session variable: ". $_SESSION['validUser'];
    if ( $_SESSION['validUser'] == "yes" ) {

        
?>

    <div class="adminFunctions">

        <h2>Brass 'n' Strings Administrator Functions</h2>
        
            <p><a href="adminFunctions/inputProduct.php">Input a new product</a></p>
            <p><a href="adminFunctions/displayProducts.php">Update or delete a current product</a></p>
            <p><a href="adminFunctions/logout.php">Logout of Brass 'n' Strings Admin System</a></p>
            <p>Return to the <a href="index.php">Brass 'n' Strings home page</a><p>
    </div>

<?php

    } else {
        
?>

    <div class="form-container">

    <h1>Brass 'n' Strings Administrator Login</h1>
    <h2>Please enter your username and password to use administrator functionality</h2>

        <form method="post" name="loginForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">            

            <p>
                <label for="portfolio_user">Username: </label>
                <input type="text" id="portfolio_user" name="portfolio_user">
            </p>

            <p>
                <label for="portfolio_user_password">Password: </label>
                <input type="password" id="portfolio_user_password" name="portfolio_user_password">
            </p>

            <p>
                <button type="submit" name="submitButton">Submit</button>
                <button type="reset" name="reset">Reset</button>
            </p>

        </form>

    </div>


<?php

    }

?>

    
</body>
</html>



<?php include 'footer.php' ?>