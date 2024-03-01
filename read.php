<?php 
$title = "View";
require("header.php");
require("connection.php");

// Check if the ID is provided in the URL
$id = isset($_GET['id']) ? $_GET['id'] : '';

// Fetch data for the specified book ID
$sql = "SELECT * FROM books WHERE id='$id'";
$result = $conn->query($sql);

// Check if the query was successful and if there is a matching record
if ($result && $result->num_rows > 0) {
    // Fetch the book data
    $book = $result->fetch_assoc();
    // Display the book details
    echo "<h2>Book Details</h2>";
    echo "<img src='" . $book['image_path'] . "' alt='Book Image'>";
    echo "<p>ID: " . $book['id'] . "</p>";
    echo "<p>Name: " . $book['name'] . "</p>";
    echo "<p>ISBN: " . $book['isbn'] . "</p>";
    echo "<p>Author: " . $book['author'] . "</p>";
    echo "<p>Quantity: " . $book['quantity'] . "</p>";
    // You may also display other details such as image, etc.
} else {
    // If no matching record found, display an error message
    echo "No book found with the provided ID.";
}
?>

<style>
    img{
        height: 250px;
        width: 300px;
    }
</style>
<?php
require("footer.php");
?>
