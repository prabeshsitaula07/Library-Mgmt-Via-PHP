<?php 
$title = "View";
require("header.php");
require("connection.php");

// Check if the ID is provided in the URL
$id = isset($_GET['id']) ? $_GET['id'] : '';

// Fetch data for the specified book ID
$sql = "SELECT * FROM books WHERE id='$id'";
$result = $conn->query($sql);

?>
<style>
body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Styling for book details */
        .book-details {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .book-details img {
            height: auto;
            width: 300px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .book-details p {
            margin-bottom: 10px;
        }
        .bold_span{
            font-weight: bolder;
            
        }
    </style>
<div class="container">
    <div class="book-details">
        <?php if ($result && $result->num_rows > 0) { ?>
            <h2>Book Details</h2>
            <?php 
            $book = $result->fetch_assoc();
            ?>
            <img src="<?php echo $book['image_path']; ?>" alt="Book Image">
            <p><span class="bold_span">ID</span>: <?php echo $book['id']; ?></p>
            <br>
            <p><span class="bold_span">Name</span>: <?php echo $book['name']; ?></p>
            <br>
            <p><span class="bold_span">ISBN</span>: <?php echo $book['isbn']; ?></p>
            <br>
            <p><span class="bold_span">Author</span>: <?php echo $book['author']; ?></p>
            <br>
            <p><span class="bold_span">Quantity</span>: <?php echo $book['quantity']; ?></p>
            <br>
            <p><span class="bold_span">Description:</span><br> <?php echo $book['description']; ?></p>
            <br>
            <!-- You may also display other details such as image, etc. -->
        <?php } else { ?>
            <p>No book found with the provided ID.</p>
        <?php } ?>
    </div>
</div>

<?php
require("footer.php");
?>
