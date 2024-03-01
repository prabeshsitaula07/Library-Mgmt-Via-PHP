<?php 
$title = "Add Book";
require("header.php");
require("connection.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $isbn = $_POST['isbn'];
    $author = $_POST['author'];
    $quantity = $_POST['quantity'];
    // Assuming you have a column named image_data that stores the file path or binary data
    // You may need to handle file uploads separately if you are allowing users to upload images
    // $image_data = $_FILES['image_data']['name']; // This would be for file upload handling

    // Insert the data into the database
    $sql = "INSERT INTO books (id, name, isbn, author, quantity) VALUES ('$id', '$name', '$isbn', '$author', '$quantity')";
    if ($conn->query($sql) === TRUE) {
        echo "New record added successfully";
        // Redirect to the home page or any other page after adding the record
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="row g-3">
    <div class="col-md-6">
        <label for="id" class="form-label">ID:</label>
        <input type="text" name="id" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label for="name" class="form-label">Name:</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label for="isbn" class="form-label">ISBN:</label>
        <input type="text" name="isbn" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label for="author" class="form-label">Author:</label>
        <input type="text" name="author" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label for="quantity" class="form-label">Quantity:</label>
        <input type="text" name="author" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label for="image_data" class="form-label">Image:</label>
        <input type="file" name="image_data" class="form-control" accept="image/*" required>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">ADD</button>
    </div>
</form>

<?php require("footer.php") ?>
