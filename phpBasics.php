<!doctype html>

<head>
    <title>PHP Basics</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

<h1>WDV 341</h1>

<?php
    $myName = "Will Hedgecock";

    echo "<h1>PHP Basics</h1>";
?>

<h2><?php echo $myName ?></h2>

<?php
    $number1 = 32;
    $number2 = 20;
    $total = $number1 + $number2;

    echo "<p>The first number is: $number1</p>";
    echo "<p>The second number is: $number2</p>";
    echo "<p>The total of the numbers is: $total</p>";
?>

<script>

    <?php $languages = "'PHP', 'HTML', 'Javascript'"; ?>

    let ourDevLanguages = [<?php echo $languages; ?>];

    for (let x=0; x < ourDevLanguages.length; x++) {
        document.write("<p>" + ourDevLanguages[x] + "</p>");
    }

</script>

</body>


</html>
