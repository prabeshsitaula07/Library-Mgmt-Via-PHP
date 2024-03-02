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
    $description = $_POST['description'];

    // Handle image upload
    $targetDirectory = "images/"; // Folder where images will be uploaded
    $targetFile = $targetDirectory . basename($_FILES["image_data"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image_data"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image_data"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Sorry, only JPG, JPEG, PNG files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image_data"]["tmp_name"], $targetFile)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["image_data"]["name"])). " has been uploaded.";
            // Insert the data into the database
            $image_path = $targetFile; // Store the path to the image in the database
            $sql = "INSERT INTO books (id, name, author, quantity, isbn, description, image_path) VALUES ('$id', '$name', '$author', '$quantity', '$isbn', '$description', '$image_path')";
            if ($conn->query($sql) === TRUE) {
                echo "New record added successfully";
                // Redirect to the home page or any other page after adding the record
                header("Location: index.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" class="row g-3">
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
        <input type="text" name="quantity" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label for="description" class="form-label">Description Of Book:</label>
        <input type="text" name="description" class="form-control" required>
    </div>

    <div class="col-md-6">
        <label for="image_data" class="form-label">Image:</label>
        <input type="file" name="image_data" class="form-control" accept=".jpg, .png, .jpeg" required>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">ADD</button>
    </div>
</form>

<?php require("footer.php") ?>
