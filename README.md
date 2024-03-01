# Library-Mgmt-Via-PHP

This is a simple library management system implemented using PHP and MySQL database. The system allows users to perform basic CRUD (Create, Read, Update, Delete) operations on books in the library.

## Features

- Add new books with details such as name, ISBN, author, quantity.
- Update existing book details.
- View the list of books along with their details.
- Delete books from the library.

## Files

- `add.php`: Allows users to add new books to the library.
- `connection.php`: Contains PHP code for establishing a connection to the MySQL database.
- `index.php`: Entry point of the application. Displays the list of books and provides options for CRUD operations.
- `read.php`: PHP code for reading and displaying the list of books.
- `update.php`: Allows users to update existing book details.

## Database Setup

Ensure you have a MySQL database set up. You need to create a table named `books` with the following schema:

```sql
CREATE TABLE books (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    isbn BIGINT NOT NULL,
    author VARCHAR(255) NOT NULL,
    quantity INT NOT NULL
);


## Usage

1. Clone or download this repository to your local machine.
    ```
    git clone https://github.com/prabeshsitaula07/Library-Mgmt-Via-PHP
    ```
2. Set up a PHP development environment if you haven't already.
3. Import the library.sql file into your MySQL database to create the necessary table.
4. Update the database connection details in connection.php if necessary.
5. Start the PHP development server.
6. Access the application through your web browser.