
<?php
if(isset($_POST['emp_id'])){
    $EMP_ID=$_POST['emp_id'];
    $EMP_CODE=$_POST['emp_code'];
    $EMP_NAME=$_POST['emp_name'];
    $GENDER=$_POST['gender'];
    $AGE=$_POST['age'];
    $EMAIL=$_POST['email'];
    $ADDRESS=$_POST['address'];
    $DESIGNATION=$_POST['designation'];
    $DEPT_NAME=$_POST['dept_name'];
    $PLANT=$_POST['plant'];    
    $REPORTING_MANAGER=$_POST['reporting_manager'];
    $STATUS=$_POST['status'];

  include("./config.php");
  $detail=$conn->prepare("INSERT INTO `details`(`EMP_ID`, `EMP_CODE`, `EMP_NAME`, `GENDER`, `AGE`, `EMAIL`, `ADDRESS`, `DESIGNATION`, `DEPT_NAME`, `PLANT`, `REPORTING_MANAGER`, `STATUS`)
    VALUES ('$EMP_ID','$EMP_CODE','$EMP_NAME','$GENDER','$AGE','$EMAIL','$ADDRESS','$DESIGNATION','$DEPT_NAME','$PLANT','$REPORTING_MANAGER','$STATUS')");
   $result= $detail->execute();
   if($result){
    //   echo "Data Inserted";

header("Location: delete_edit.php");
exit(); // It's good practice to follow up with an exit() call


   }
    else{
        echo "opertaion unsuccesfull";
    }
}
else{
    echo "Operation failed";
}

?>