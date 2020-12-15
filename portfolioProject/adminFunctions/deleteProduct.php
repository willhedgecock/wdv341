<?php

session_start();

    if ($_SESSION['validUser'] !== "yes") {
        header("Location: ../index.php");
    }

    require "../dbConnect.php";

    $deleteId = $_GET['productId'];

    $sql = "DELETE FROM portfolio_project WHERE product_id = $deleteId";

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    if ($stmt) {
        echo '<h1 class="deleteConfirm">The record has been deleted successfully, you will be redirected to the home page in 5 seconds.</h1>';
        header('Refresh: 5; URL=../index.php');
    } else {
        echo '<h1>There has been a problem deleting your record, please try again later.</h1>';
    }

?>