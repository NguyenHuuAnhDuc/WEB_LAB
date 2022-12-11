<?php
$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname="myDB";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
/*
//Create database
 $sql = "CREATE DATABASE myDB";
 if (mysqli_query($conn, $sql)) {
   echo "Database created successfully"."<br>";
 } else {
   echo "Error creating database: " . mysqli_error($conn)."<br>";
 }

 $sql = "CREATE TABLE products (
   productID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   product_name VARCHAR(30) NOT NULL,
   price FLOAT NOT NULL
 )";
 if (mysqli_query($conn, $sql)) {
 echo "Table 'products' created successfully" ."<br>";
 } else {
 echo "Error creating table: " . mysqli_error($conn)."<br>";
 }

 $sql1 = "CREATE TABLE users (
   userID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(30) NOT NULL,
   username VARCHAR(30) NOT NULL,
   password VARCHAR(30) NOT NULL
 )";
 if (mysqli_query($conn, $sql1)) {
 echo "Table 'users' created successfully"."<br>";
 } else {
 echo "Error creating table: " . mysqli_error($conn)."<br>";
 }

 $sql = "INSERT INTO products (productID, product_name, price)
 VALUES ('01', 'Front-end course', '3000');";
 $sql .= "INSERT INTO products (productID, product_name, price)
 VALUES ('02', 'Back-end course', '5000');";
 $sql .= "INSERT INTO products (productID, product_name, price)
 VALUES ('03', 'Fullstack course', '8000')";
 if (mysqli_multi_query($conn, $sql)) {
           echo "New records created successfully"."<br>";
 } else {
           echo "Error: " . $sql . "<br>" . mysqli_error($conn)."<br>";
 }
 */

$sql = "INSERT INTO users (userID, name, username, password)
VALUES ('01', 'John', 'john2k', 'john29');";
$sql .= "INSERT INTO users (userID, name, username, password)
VALUES ('02', 'Mary', 'mary2k', 'mary18');";
$sql .= "INSERT INTO users (userID, name, username, password)
VALUES ('03', 'Jane', 'jane2k', 'jane00')";
if (mysqli_multi_query($conn, $sql)) {
  echo "New records created successfully\n";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn)."<br>";
}

mysqli_close($conn);
?>