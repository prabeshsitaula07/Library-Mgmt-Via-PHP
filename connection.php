<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "library";

$conn = new mysqli($server, $user, $password, $database);

if($conn->connect_error)
{
    die("db not connected");
}