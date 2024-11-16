<?php

// Include database connection details
require('./config.php');  // Replace with your actual connection file path

// Collect data from the form submission using $_POST
$emp_id = $_POST['emp_id'];
$emp_code = $_POST['emp_code'];
$emp_name = $_POST['emp_name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$address = $_POST['address'];
$designation = $_POST['designation'];
$dept_name = $_POST['dept_name'];
$plant = $_POST['plant'];
$reporting_manager = $_POST['reporting_manager'];
$status = $_POST['status'];

// Prevent SQL Injection (important for security!)
$emp_id = mysqli_real_escape_string($conn, $emp_id);
$emp_code = mysqli_real_escape_string($conn, $emp_code);
$emp_name = mysqli_real_escape_string($conn, $emp_name);
$gender = mysqli_real_escape_string($conn, $gender);
$age = mysqli_real_escape_string($conn, $age);
$email = mysqli_real_escape_string($conn, $email);
$address = mysqli_real_escape_string($conn, $address);
$designation = mysqli_real_escape_string($conn, $designation);
$dept_name = mysqli_real_escape_string($conn, $dept_name);
$plant = mysqli_real_escape_string($conn, $plant);
$reporting_manager = mysqli_real_escape_string($conn, $reporting_manager);
$status = mysqli_real_escape_string($conn, $status);

// Construct the INSERT query
$sql = "INSERT INTO `details`(`EMP_ID`, `EMP_CODE`, `EMP_NAME`, `GENDER`, `AGE`, `EMAIL`, `ADDRESS`, `DESIGNATION`, `DEPT_NAME`, `PLANT`, `REPORTING_MANAGER`, `STATUS`)
VALUES ('$emp_id', '$emp_code', '$emp_name', '$gender', '$age', '$email', '$address', '$designation', '$dept_name', '$plant', '$reporting_manager', '$status')";

//$sql = "INSERT INTO `details`(`EMP_ID`, `EMP_CODE`) VALUES ('".$emp_id."', '".$emp_code."')";

//

// Execute the query and handle success or failure
if (mysqli_query($conn, $sql)) { 
  echo "Employee data inserted successfully!";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);

?>