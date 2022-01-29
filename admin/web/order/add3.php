<?php
require('Dbconnects.php'); 

$or_HN=$_POST["or_HN"];
$or_code=$_POST["or_code"];
$or_n=$_POST["or_n"];
$or_time=$_POST["or_time"];
$or_ptime=$_POST["or_ptime"];
$or_tt=$_POST["or_tt"];
$or_day=$_POST["or_day"];
$or_unit=$_POST["or_unit"];
$or_med=$_POST["or_med"];


if (isset($_POST["submit1"])) {
    mysqli_query($connect, "INSERT INTO ordermed(or_HN, or_code, or_n, or_time, or_ptime, or_tt, or_day,or_unit,or_med) 
     VALUES ( '$or_HN', '$or_code', '$or_n', '$or_time', '$or_ptime','$or_tt', '$or_day','$or_unit','$or_med')") or die(mysqli_error($connect));
    
    $count=0;
    $result=mysqli_query($connect, "SELECT * FROM stock WHERE or_HN='$or_HN' && or_code='$or_code'  ");
    $count=mysqli_num_rows($result);
}
   
if ($count==0) 
    {
       mysqli_query($connect, "INSERT INTO stock (or_HN, or_code, or_n, or_time, or_ptime, or_tt, or_day,or_unit,or_med) 
       VALUES ( '$or_HN', '$or_code', '$or_n', '$or_time', '$or_ptime','$or_tt', '$or_day','$or_unit','$or_med')") or die(mysqli_error($connect));
    
    }else{
       mysqli_query($connect, "UPDATE stock SET or_tt=or_tt+'$or_tt' ,or_day='$or_day' ,or_ptime='$or_ptime' ,or_med='$or_med'  WHERE or_HN='$or_HN' && or_code='$or_code' ") or die(mysqli_error($connect));
    }
if($result){
    echo "<script type='text/javascript'>";
    echo "alert('Upload File Succesfuly');";
    echo "window.location = 'order.php'; ";
    echo "</script>";
}
else{
    echo "<script type='text/javascript'>";
    echo "alert('Error back to upload again');";
    echo "window.location = 'order.php'; ";
    echo "</script>";
}

?>