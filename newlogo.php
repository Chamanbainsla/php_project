<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .logo {
            max-width: 150px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <?php
        // Display the GROZ logo
        $logoPath = 'https://images.app.goo.gl/PzgmtSMfPDvfLaZCAog'; // Ensure this path is correct
        if (file_exists($logoPath)) {
            echo "<img src='$logoPath' alt='GROZ Logo' class='logo'>";
        } else {
            echo "<p>Logo not found</p>";
        }
        ?>
        <h2 class="text-center mb-4">Employee Details Form</h2>
        <form action="insert.php" method="POST">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="emp_id" class="form-label">Employee ID</label>
                    <input type="text" class="form-control" id="emp_id" name="emp_id" required>
                </div>
                <div class="col-md-6">
                    <label for="emp_code" class="form-label">Employee Code</label>
                    <input type="text" class="form-control" id="emp_code" name="emp_code" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="emp_name" class="form-label">Employee Name</label>
                    <input type="text" class="form-control" id="emp_name" name="emp_name" required>
                </div>
                <div class="col-md-6">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" id="gender" name="gender" required>
                        <option value="" selected disabled>Choose...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" class="form-control" id="age" name="age" required>
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label">Phone No.</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="123-456-7890" required />
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="col-md-6">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="designation" class="form-label">Designation</label>
                    <input type="text" class="form-control" id="designation" name="designation" required>
                </div>
                <div class="col-md-6">
                    <label for="dept_name" class="form-label">Department Name</label>
                    <input type="text" class="form-control" id="dept_name" name="dept_name" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="plant" class="form-label">Plant</label>
                    <input type="text" class="form-control" id="plant" name="plant" required>
                </div>
                <div class="col-md-6">
                    <label for="reporting_manager" class="form-label">Reporting Manager</label>
                    <input type="text" class="form-control" id="reporting_manager" name="reporting_manager" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="" selected disabled>Choose...</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
