<?php
require('Dbconnects.php');
$member_HN=$_GET["HN"];
 $sql = "SELECT * FROM patient ORDER BY member_HN ASC";
 $result=mysqli_query($connect,$sql);
 $row=mysqli_fetch_assoc($result);

 $con_HN=$_POST ["con_HN"];
 $con_d=$_POST ["con_d"];
 $con_code=$_POST ["con_code"];
 $con_n=$_POST ["con_n"];
 $con_med=$_POST ["con_med"];
 $con_c=$_POST["con_c"];
 $con_f=$_POST ["con_f"];
 $con_r=$_POST ["con_r"];

// $sql ="INSERT INTO confirm_pt(con_HN,con_d,con_code,con_n,con_med,con_c,con_f,con_r)  
// VALUES('$con_HN','$con_d','$con_code','$con_n','$con_med','$con_c','$con_f','$con_r')";
// $result=mysqli_query($connect,$sql);
// if($result){
//     echo"สำเร็จ";
    
//     exit(0);
// }else{
//     echo"miss";
// }

$query="SELECT * FROM confirm_pt WHERE con_HN='$con_HN' AND con_d='$con_d' AND con_code='$con_code'";
 $result=mysqli_query($connect,$query);
 if (mysqli_num_rows($result) > 0){
    echo "<script type='text/javascript'>";
    echo "alert('ข้อมูลเคยบันทึกแล้ว');";
    echo "window.location = 'PT-web_p.php?HN=$member_HN'; ";
    echo "</script>";
    
}else{
    $sql ="INSERT INTO confirm_pt(con_HN,con_d,con_code,con_n,con_med,con_c,con_f,con_r)  
    VALUES('$con_HN','$con_d','$con_code','$con_n','$con_med','$con_c','$con_f','$con_r')";
    $result=mysqli_query($connect,$sql);
if($result){
    echo "<script type='text/javascript'>";
    echo "alert('บันทึกข้อมูลสำเร็จ');";
    echo "window.location = 'PT-web_p.php?HN=$member_HN'; ";
    echo "</script>";
    exit;
}else {
    echo "<script type='text/javascript'>";
    echo "alert('เกิดข้อผิดพลาด โปรดลองใหม่อีกครั้ง');";
    echo "window.location = 'PT-web_p.php?HN=$member_HN'; ";
    echo "</script>";
    }
}
?>