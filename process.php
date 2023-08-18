<?php
$item = $_POST['item'];
$email = $_POST['email'];
$description = $_POST['description'];
$addedBy = "Username"; // You can retrieve the actual user's information here

// Handle image upload
$targetDir = "uploads/";
$targetFile = $targetDir . basename($_FILES["image"]["name"]);
move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);

// Append the item details and image link to a flat file
$file = fopen("list.txt", "a");
fwrite($file, "Item: $item\nContact Email: $email\nDescription: $description\nImage: $targetFile\n\n");
fclose($file);

// Redirect back to the form or display a success message
header("Location: list.php");
exit();
?>
