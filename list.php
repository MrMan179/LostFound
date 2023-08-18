<?php
// Read the content of the flat file
$content = file_get_contents("list.txt");

// Display the items in a list format
echo "<h1>Lost and Found</h1>";
echo "<ul style=\"list-style-type: none; padding: 0;\">";
$items = explode("\n\n", $content);
foreach ($items as $item) {
    $lines = explode("\n", $item);

    if (count($lines) >= 5) { // Ensure there are at least 5 lines
        $image = $lines[3]; // Image
        echo "<li style=\"margin-bottom: 20px;\">";
        echo "{$lines[0]}<br>"; // Item
        echo "{$lines[1]}<br>"; // Contact Email
        echo "{$lines[2]}<br>"; // Description
        if (!empty($image) && file_exists($image)) {
            echo "<img src=\"$image\" alt=\"Item Image\"><br>";
        } else {
            echo "Image not available<br>";
	    echo "Image Path: $image<br>"; // Add this line for debugging
        }
        echo "{$lines[4]}"; // Added by
        echo "</li>";
    }
}
echo "</ul>";
?>

