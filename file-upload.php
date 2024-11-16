<?php
  error_reporting(0);
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
  
    <title>File Upload</title>
 </head>
 <body>
    <form action="#" method="POST" enctype="multipart/form-data">
        <input type="file" name="Uploadfile"><br><br>
        <input type="submit" name="submit" value="Upload File">
    </form>
 </body>
 </html>

 <?php 
 
 $filename= $_FILES[" Uploadfile"]["name"];
 $tmp_name = $_FILES[" Uploadfile"]["tmp_name"];
 $folder="images/".$filename;
 echo $folder;
 move_uploaded_file($tmp_name, $folder);

 

?>