<?php

        $msg = '';
        $msgClass = '';     //USED FOR STYLING ERROR MESSAGE

        //CHECK IF FORM HAS BEEN SUBMITTED

        if(filter_has_var(INPUT_POST, 'submit')) {

            $firstName = htmlspecialchars($_POST['firstName']);
            $lastName = htmlspecialchars($_POST['lastName']);
            $email = htmlspecialchars($_POST['email']);
            $message = htmlspecialchars($_POST['message']);

            if(!empty($firstName) && !empty($lastName) && !empty($email) && !empty($message)) {

                    if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                        //email failed
                        $msg = "Please enter a valid email";
                        $msgClass = "msgClassFail";
                    } else {
                        //email passed
                        $toEmail = 'whedgecock@dmacc.edu';
                        $subject = 'Contact form submission from '. $firstName . " " . $lastName;
                        $emailBody = '<h2>Contact Form Submission</h2>
                                      <h3>Name</h3><p>'.$firstName.$lastName.'</p>
                                      <h3>Email Address<h3><p>' .$email. '</p>
                                      <h3>Message</h3><p>'.$message.'</p>';
                            
                        $emailHeaders = "From: contact@willyhedge.com \r\n";
                        $emailHeaders .= "MIME-Version: 1.0 \r\n";
                        $emailHeaders .= "Content=Type: text/html; charset=UTF-8" . "\r\n";

                        

                        
                        //if (mail($toEmail, $subject, $emailBody, $emailHeaders)) {

                        if (mail($toEmail, $subject, $emailBody, $emailHeaders)) {
                            $msg = "Your email has been sent, expect a reply within 24 hours. Thanks!";
                            $msgClass = "msgClassPass";
                        } else {
                            $msg = "Your email was not sent, please try again later";
                            $msgClass = "msgClassFail";
                        }

                        
                    }
            }   else {
                //Form failed
                $msg = "Please fill out all fields";
                $msgClass = "msgClassFail";
            }
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brass 'n' Strings</title>
    <meta name="description" content="Fictional music store based in Des Moines, IA for an academic project">
    <meta name="author" content="Will Hedgecock">

    <!--CSS FILES-->
    <link rel="stylesheet" type="text/css" href="css/brass.css">
    <link rel="stylesheet" type="text/css" href="css/about.css">
    <link rel="stylesheet" type="text/css" href="css/contact.css">

    <!--MEDIA QUERIES FILE-->
    <link rel="stylesheet" type="text/css" href="css/contact-media-queries.css">

    <!--FONTS-->
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
        <a href="shop.php">Shop</a>
        <a href="contact.php" class="active">Contact Us</a>
        <a href="adminLogin.php">Admin Login</a>
        <a class="icon" onclick="createHamburgerMenu()";>
            <i class="fa fa-bars"></i>
        </a>
    </div>

</div>



<div class="contact-container">

<?php if ($msg != '') : ?>
    <div class="<?php echo $msgClass ?>"><?php echo $msg; ?> </div>
<?php endif; ?>

    <h1>Get in touch</h1>
    <h2>Questions, comments, concerns?</h2>
    <h3>Send us a message and we will respond within 24 hours!</h3>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="contact-form">

        <label for="firstName">First Name <span class="required">*</span></label>
        <input type="text" id="firstName" name="firstName" value="<?php echo isset($_POST['firstName']) ? $firstName : ''; ?>">

        <label for="lastName">Last Name <span class="required">*</span></label>
        <input type="text" id="lastName" name="lastName" value="<?php echo isset($_POST['lastName']) ? $lastName : ''; ?>">

        <label for="email">Email <span class="required">*</span></label>
        <input type="text" id="email" name="email" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">

        <label for="message">Message <span class="required">*</span></label>
        <textarea id="message" name="message" style="height:200px"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>

        <button type="submit" name="submit">Submit</button>
        <button type="reset" name="reset">Reset</button>

    </form>

</div>



<?php include 'footer.php' ?>