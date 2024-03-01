<?php 

$title = "NSS Library";
require("header.php");
require("connection.php");

// Search functionality
$search_book = isset($_GET['search_book']) ? $_GET['search_book'] : '';
$search_author = isset($_GET['search_author']) ? $_GET['search_author'] : '';

// SQL query to fetch books
$sql = "SELECT * FROM books";

// Append search conditions to SQL query if search terms are provided
if (!empty($search_book) || !empty($search_author)) {
    $sql .= " WHERE 1=1"; // Start WHERE clause
    if (!empty($search_book)) {
        $sql .= " AND name LIKE '%$search_book%'"; // Search by book name
    }
    if (!empty($search_author)) {
        $sql .= " AND author LIKE '%$search_author%'"; // Search by author name
    }
}

$result = $conn->query($sql);

?>
<style>
body {
    background-color: #f8f9fa;
}
.container {
    margin-top: 50px;
}
.error {
    color: red;
}

table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    padding: 15px;
}

table{
    width: 100%;
}
.search{
    width: fit-content;
    margin: 0 0 30px 0;
}

.value_submit{
    display: flex;
    justify-content: center;
    align-items: center;
}


form .value_submit .btn{
    margin-bottom: 0px !important;
    margin-left: 20px;
}

.btn{
    margin-bottom: 0px !important;

}
.value_submit input{
    width: 240px;
    height: 40px;
    border-radius: 5px;
    border: solid;
    padding: 10px;
}
</style>

<div class="container">
    <form method="get">
        <div class="search">
        <label for="search_book">Search by Book Name:</label>
        <div class="value_submit">
        <input type="text" name="search_book" value="<?php echo $search_book; ?>" placeholder="enter book name">
        <button data-mdb-ripple-init type="submit" class="btn btn-primary mb-4" onclick="search()">Search</button>
        </div>
        </div>
        <div class="search">
        <label for="search_author">Search by Author Name:</label>
        <div class="value_submit">
        <input type="text" name="search_author" value="<?php echo $search_author; ?>" placeholder="enter author name">
        <button data-mdb-ripple-init type="submit" class="btn btn-primary mb-4" onclick="search()">Search</button>
        </div>
        </div>
    </form>

    <a href="add.php"><button data-mdb-ripple-init type="submit" class="btn btn-primary mb-4">Add New</button></a>
    <h3>Books in Our Library</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>BOOK NAME</th>
            <th>ISBN</th>
            <th>AUTHOR</th>
            <th>QUANTITY</th>
            <th>ACTION</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['isbn']; ?></td>
                    <td><?php echo $row['author']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td>
                        <a href="read.php?id=<?php echo $row['id']; ?>"><button data-mdb-ripple-init type="submit" class="btn btn-primary mb-4">
                            Read
                        </button></a>
                        <a href="update.php?id=<?php echo $row['id']; ?>"><button data-mdb-ripple-init type="submit" class="btn btn-primary mb-4" style="background: green; border: none;">
                            Update
                        </button></a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>"><button data-mdb-ripple-init type="submit" class="btn btn-primary mb-4" style="background: red; border: none;">
                            Delete
                        </button></a>
                    </td>
                </tr>
        <?php
            }
        } else {
            echo "<tr><td colspan='6'>No books found.</td></tr>";
        }
        ?>
    </table>
</div>

<script>
    function search(){
        let by_author = document.form.search_author.value
        let by_book = document.form.search_book.value
        if(by_author=="" && by_book==""){
            alert("Input name of book or author")
        }

    }
</script>

<?php
require("footer.php");
?>
