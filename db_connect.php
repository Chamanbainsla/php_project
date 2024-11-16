<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "grozinfo"; // Replace with your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
//   }
//   echo "Connected successfully";
if ($conn->connect_error) 
{
    die("Connection failed:".$conn->$connect_error);
}
echo "Connected successfully."; 
echo "<br/>";
$result=$conn->query("show tables")->fetch_all();
print_r($result)

 // For testing purposes
?>