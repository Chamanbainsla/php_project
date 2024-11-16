<form action="" method="post">
    <input type="text" name="search" placeholder="enter name for search">
    <br/>
    <br/>
    <button>Search</button>
</form>
<?php
include('./config.php');
if(isset($_POST['search'])){
   $search= $_POST['search'];
  $employee=$conn->prepare("select * from details where EMP_NAME like '%$search%'");
  $employee->execute();
  $result=$employee->fetchAll();
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
}
?>