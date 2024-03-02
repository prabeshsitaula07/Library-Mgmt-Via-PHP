<?php 
$title = "Edit Data";
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
    $description = $_POST['description'];

    // Check if a new image is uploaded
    if(isset($_FILES['image_data']) && $_FILES['image_data']['error'] == 0) {
        $image_data = $_FILES['image_data']['name'];
        $target_directory = "images/";
        $target_file = $target_directory . basename($_FILES["image_data"]["name"]);

        // Move uploaded file to the images directory
        if (move_uploaded_file($_FILES["image_data"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["image_data"]["name"])). " has been uploaded.";
            // Update the image path in the database
            $sql_image = "UPDATE books SET image_path='$target_file' WHERE id='$id'";
            $conn->query($sql_image);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Update the database with the new values
    $sql = "UPDATE books SET name='$name', isbn='$isbn', author='$author', quantity='$quantity', description='$description' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        // Redirect to home page after successful update
        header("Location: index.php");
        exit(); // Ensure that script stops executing after redirection
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$id = isset($_GET['id']) ? $_GET['id'] : '';
$sql = "SELECT * FROM books WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $isbn = $row['isbn'];
    $author = $row['author'];
    $quantity = $row['quantity'];
    $description = $row['description'];
    $image_path = $row['image_path'];
} else {
    // Handle the case where no data is found for the given ID
    // For example, redirect the user to an error page or show an error message
    echo "No data found for the given ID.";
}

?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="row g-3" enctype="multipart/form-data">
    <div class="col-md-6">
        <label for="id" class="form-label">ID:</label>
        <input type="text" name="id" class="form-control" value="<?php echo $id; ?>" readonly required>
    </div>
    <div class="col-md-6">
        <label for="name" class="form-label">Name:</label>
        <input type="text" name="name" class="form-control" value='<?php echo $name; ?>' required>
    </div>
    <div class="col-md-6">
        <label for="isbn" class="form-label">ISBN:</label>
        <input type="text" name="isbn" class="form-control" value='<?php echo $isbn; ?>' required>
    </div>
    <div class="col-md-6">
        <label for="author" class="form-label">Author:</label>
        <input type="text" name="author" class="form-control" value='<?php echo $author; ?>' required>
    </div>
    <div class="col-md-6">
        <label for="quantity" class="form-label">Quantity:</label>
        <input type="text" name="quantity" class="form-control" value='<?php echo $quantity; ?>' required>
    </div>
    <div class="col-md-6">
        <label for="image_data" class="form-label">Image:</label>
        <input type="file" name="image_data" class="form-control" accept="image/*" required>
    </div>
    <div class="col-md-6">
        <label for="description" class="form-label">Description:</label>
        <textarea name="description" class="form-control" rows="6" required><?php echo $description; ?></textarea>
    </div>
    
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>

<?php require("footer.php") ?>
