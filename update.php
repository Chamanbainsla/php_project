<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("./config.php");

if (isset($_GET['id'])) { 
    $EMP_ID = $_GET['id'];

    
    $stmt = $conn->prepare("SELECT * FROM details WHERE EMP_ID = :EMP_ID");
    $stmt->bindParam(':EMP_ID', $EMP_ID, PDO::PARAM_INT);
    $stmt->execute();
    $employee = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($employee) {
       
        echo "<style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 50px;
                    background-color: #f7f7f7;
                }
                form {
                    max-width: 600px;
                    margin: auto;
                    padding: 20px;
                    background-color: #fff;
                    border-radius: 5px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
                label {
                    display: block;
                    margin-bottom: 8px;
                    font-weight: bold;
                }
                input[type='text'], input[type='number'], input[type='email'] {
                    width: 100%;
                    padding: 8px;
                    margin-bottom: 10px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    box-sizing: border-box;
                }
                button {
                    background-color: #4CAF50;
                    color: white;
                    padding: 10px 15px;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                }
                button:hover {
                    background-color: #45a049;
                }
            </style>";

        echo "<form method='post'>";
        echo "<label>Employee Code:</label><input type='text' name='EMP_CODE' value='".$employee['EMP_CODE']."' /><br>";
        echo "<label>Name:</label><input type='text' name='EMP_NAME' value='".$employee['EMP_NAME']."' /><br>";
        echo "<label>Gender:</label><input type='text' name='GENDER' value='".$employee['GENDER']."' /><br>";
        echo "<label>Age:</label><input type='number' name='AGE' value='".$employee['AGE']."' /><br>";
        echo "<label>Email:</label><input type='email' name='EMAIL' value='".$employee['EMAIL']."' /><br>";
        echo "<label>Address:</label><input type='text' name='ADDRESS' value='".$employee['ADDRESS']."' /><br>";
        echo "<label>Designation:</label><input type='text' name='DESIGNATION' value='".$employee['DESIGNATION']."' /><br>";
        echo "<label>Department:</label><input type='text' name='DEPT_NAME' value='".$employee['DEPT_NAME']."' /><br>";
        echo "<label>Plant:</label><input type='text' name='PLANT' value='".$employee['PLANT']."' /><br>";
        echo "<label>Reporting Manager:</label><input type='text' name='REPORTING_MANAGER' value='".$employee['REPORTING_MANAGER']."' /><br>";
        echo "<label>Status:</label><input type='text' name='STATUS' value='".$employee['STATUS']."' /><br>";
        echo "<button type='submit' name='update'>Update</button>";
        echo "</form>";
    } else {
        echo "Employee not found.";
    }
} else {
    echo "No ID specified.";
}

if (isset($_POST['update'])) {
    if (isset($EMP_ID)) { 
        
        $EMP_CODE = $_POST['EMP_CODE'];
        $EMP_NAME = $_POST['EMP_NAME'];
        $GENDER = $_POST['GENDER'];
        $AGE = $_POST['AGE'];
        $EMAIL = $_POST['EMAIL'];
        $ADDRESS = $_POST['ADDRESS'];
        $DESIGNATION = $_POST['DESIGNATION'];
        $DEPT_NAME = $_POST['DEPT_NAME'];
        $PLANT = $_POST['PLANT'];
        $REPORTING_MANAGER = $_POST['REPORTING_MANAGER'];
        $STATUS = $_POST['STATUS'];

        
        $stmt = $conn->prepare("UPDATE details 
                                SET EMP_CODE = :EMP_CODE, 
                                    EMP_NAME = :EMP_NAME, 
                                    GENDER = :GENDER, 
                                    AGE = :AGE, 
                                    EMAIL = :EMAIL, 
                                    ADDRESS = :ADDRESS, 
                                    DESIGNATION = :DESIGNATION, 
                                    DEPT_NAME = :DEPT_NAME, 
                                    PLANT = :PLANT, 
                                    REPORTING_MANAGER = :REPORTING_MANAGER, 
                                    STATUS = :STATUS
                                WHERE EMP_ID = :EMP_ID");

       
        $stmt->bindParam(':EMP_CODE', $EMP_CODE);
        $stmt->bindParam(':EMP_NAME', $EMP_NAME);
        $stmt->bindParam(':GENDER', $GENDER);
        $stmt->bindParam(':AGE', $AGE);
        $stmt->bindParam(':EMAIL', $EMAIL);
        $stmt->bindParam(':ADDRESS', $ADDRESS);
        $stmt->bindParam(':DESIGNATION', $DESIGNATION);
        $stmt->bindParam(':DEPT_NAME', $DEPT_NAME);
        $stmt->bindParam(':PLANT', $PLANT);
        $stmt->bindParam(':REPORTING_MANAGER', $REPORTING_MANAGER);
        $stmt->bindParam(':STATUS', $STATUS);
        $stmt->bindParam(':EMP_ID', $EMP_ID);

       
        if ($stmt->execute()) {
            // echo "Record updated successfully.";

header("Location: delete_edit.php");
exit(); // It's good practice to follow up with an exit() call

        } else {
            echo "Failed to update the record.";
        }
    } else {
        echo "EMP_ID is not set.";
    }
}
?>
