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
 $con_c=implode(",",$_POST["con_c"]);
 $con_f=$_POST ["con_f"];

 if($con_c == 1){
     $con_r = $con_med-$con_f;
    }
    elseif($con_c == 0){
         $con_r = $con_med;
    }else{
        $con_r=0;
    }
    // echo $con_r;

    session_start();

    if (!isset($_SESSION['member_HN'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: start.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['member_HN']);
        header('location: start.php');
    }



//  $sql ="INSERT INTO confirm_pt(con_HN,con_d,con_code,con_n,con_med,con_c,con_f)  
//  VALUES('$con_HN','$con_d','$con_code','$con_n','$con_med','$con_c','$con_f')";
//  $result=mysqli_query($connect,$sql);


// if($result){
//     echo"สำเร็จ";
    
//     exit(0);
// }else{
//     echo"miss";
// }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cardiac center</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
      crossorigin="anonymous"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="/css/styles_web_p.css" />
    <link rel="stylesheet" href="/css/styles_order.css" />
    <link rel="stylesheet" href="/css/styles_web.css" />
    <script src="web_p.php" defer></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="PT-web_p.php"
          ><img
            src="/img/heart.png"
            width="60"
            height="50"
            class="d-inline-block align-text-center"
          />Cardiac Center</a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto my-2 my-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">ตารางรับประทานยา</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="PT-web_p.php?logout='1'">ออกจากระบบ</a>
            </li>
        </div>
      </div>
    </nav>

    <h1 class="center-align">กรุณาตรวจสอบ</h1>

    <div class="container">
      <div class="card">
        <div class="card-body">
          <form action = "conmed1.php?HN=<?php echo $row["member_HN"];?>" method="POST">
            <div class="row mb-3">
              <label for="inputText1" class="col-sm-2 col-form-label">รหัสผู้ป่วย</label>
              <div class="col-sm-10">
                <input type="text"  class="form-control" name="con_HN" value="<?php echo"$con_HN";?>"/>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText1" class="col-sm-2 col-form-label">วันที่ยืนยัน</label>
              <div class="col-sm-10">
                <input type="text"  class="form-control" name="con_d" value="<?php echo"$con_d";?>"/>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText1" class="col-sm-2 col-form-label">CODE</label>
              <div class="col-sm-10">
                <input type="text"  class="form-control" name="con_code" value="<?php echo"$con_code";?>"/>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText1" class="col-sm-2 col-form-label">ชื่อยา</label>
              <div class="col-sm-10">
                <input type="text"  class="form-control" name="con_n" value="<?php echo"$con_n";?>"/>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText1" class="col-sm-2 col-form-label">จำนวนยาต่อวัน(เม็ด)</label>
              <div class="col-sm-10">
                <input type="text"  class="form-control" name="con_med" value="<?php echo"$con_med";?>"/>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText1" class="col-sm-2 col-form-label">การยืนยันการรับประทาน</label>
              <div class="col-sm-10">
                <input type="text"  class="form-control" name="con_c" value="<?php echo"$con_c";?>"/>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText1" class="col-sm-2 col-form-label">จำนวนยาที่ลืม(เม็ด)</label>
              <div class="col-sm-10">
                <input type="number"  class="form-control" name="con_f" value="<?php echo"$con_f";?>"/>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText1" class="col-sm-2 col-form-label">จำนวนยาที่รับประทานจริง</label>
              <div class="col-sm-10">
                <input type="number"  class="form-control" name="con_r" value="<?php echo"$con_r";?>"/>
              </div>
            </div>
            <button type="submit" name="submit1" class="btn btn-primary btn-last" >ถูกต้อง</button>
            </form>
            </div>
            </div>
            </div>



     <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
      integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
      crossorigin="anonymous"
    ></script>
</body>
</html>


 


