<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-container {
            margin: 50px auto;
            max-width: 1200px;
        }
        .table {
            margin: 20px 0;
            border-collapse: collapse;
        }
        .table th, .table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        .table thead th {
            background-color: #f8f9fa;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container table-container">
        <h2 class="text-center mb-4">Employee Details</h2>
        <?php
        include("./config.php");
        $getemp = $conn->prepare("SELECT * FROM details");
        $getemp->execute();
        $employees = $getemp->fetchAll();
        
        echo "<table class='table table-striped'>";
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
                </tr>
              </thead>";
        echo "<tbody>";
        foreach ($employees as $employee) {
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
                </tr>";
        }
        echo "</tbody>";
        echo "</table>";
        ?>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
