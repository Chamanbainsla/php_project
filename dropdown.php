<?php
   include("./config.php");
   $getemployee=$conn->prepare("select emp_id,emp_name from  details");
   $getemployee->execute();
   $employeeData=$getemployee->fetchAll();

   echo "<select>";
   echo "<option> Select Name</option>";
     foreach($employeeData as $employee){
        echo "<option value=".$employee['emp_id'].">".$employee ['emp_name']."</option>";
     }
   echo "<select>";
?>