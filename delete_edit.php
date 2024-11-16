<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 50px;
        }
        .table-container {
            margin: 20px auto;
            max-width: 1200px;
        }
        .table th, .table td {
            text-align: center;
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
        .btn-edit {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn-edit:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Employee Details</h2>
        <?php
        include("./config.php");
        $employees = $conn->prepare("SELECT * FROM details");
        $employees->execute();
        $result = $employees->fetchAll();

        echo "<div class='table-container'>";
        echo "<table class='table table-bordered table-striped'>";
        echo "<thead>
                <tr>
                    <th>Employee ID</th>
                    <th>Employee Code</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Designation</th>
                    <th>Department</th>
                    <th>Plant</th>
                    <th>Reporting Manager</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
              </thead>";
        echo "<tbody>";
        foreach ($result as $employee) {
            echo "<tr>
                    <td>".$employee['EMP_ID']."</td>
                    <td>".$employee['EMP_CODE']."</td>
                    <td>".$employee['EMP_NAME']."</td>
                    <td>".$employee['GENDER']."</td>
                    <td>".$employee['AGE']."</td>
                    <td>".$employee['EMAIL']."</td>
                    <td>".$employee['ADDRESS']."</td>
                    <td>".$employee['DESIGNATION']."</td>
                    <td>".$employee['DEPT_NAME']."</td>
                    <td>".$employee['PLANT']."</td>
                    <td>".$employee['REPORTING_MANAGER']."</td>
                    <td>".$employee['STATUS']."</td>
                    <td>
                        <form method='post' style='display:inline;'>
                            <button type='submit' name='delete' value='".$employee['EMP_ID']."' class='btn-delete'>Delete</button>
                        </form>
                        <a href='update.php?id=".$employee['EMP_ID']."' class='btn-edit'>Edit</a>
                    </td>
                </tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";

        if (isset($_POST['delete'])) {
            $EMP_ID = $_POST['delete'];
            $deleteStmt = $conn->prepare("DELETE FROM details WHERE EMP_ID = :EMP_ID");
            $deleteStmt->bindParam(':EMP_ID', $EMP_ID, PDO::PARAM_INT);
            
            if ($deleteStmt->execute()) {
                echo "<div class='alert alert-success' role='alert'>Record deleted successfully!</div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>Failed to delete the record.</div>";
            }
        }
        ?>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
