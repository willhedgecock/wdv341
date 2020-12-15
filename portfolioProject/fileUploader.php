<?php
$target_dir = "../product-images";
$target_file = $target_dir . basename($_FILES["product_img"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$product_img_err = "";

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["product_img"]["tmp_name"]);
  if($check !== false) {
    //echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    $product_img_err = "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  $product_img_err = "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["product_img"]["size"] > 500000) {
    $product_img_err = "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
   $product_img_err = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $product_img_err = "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["product_img"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["product_img"]["name"]). " has been uploaded.";
  } else {
    $product_img_err = "Sorry, there was an error uploading your file.";
  }
}
?>