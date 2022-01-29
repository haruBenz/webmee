<?php
require('Dbconnects.php'); 

$or_HN=$_POST["or_HN"];
$or_code=$_POST["or_code"];
$or_n=$_POST["or_n"];
$or_time=implode(",",$_POST["or_time"]);
$or_ptime=implode(",",$_POST["or_ptime"]);
$or_tt=$_POST["or_tt"];
$or_day=$_POST["or_day"];
$or_unit=$_POST["or_unit"];

if ($or_ptime == "1" ){
    $freq = "1";}
else if($or_ptime == "2" ){
    $freq="1" ;}
    else if($or_ptime == "3" ){
        $freq="1" ;}
        else if($or_ptime == "4" ){
            $freq="1" ;}
            else if($or_ptime == "1,2" ){
                $freq="2" ;}
                else if($or_ptime == "1,3" ){
                    $freq="2" ;}
                    else if($or_ptime == "1,4" ){
                        $freq="2" ;}
                        else if($or_ptime == "2,3" ){
                        $freq="2" ;}
                            else if($or_ptime == "2,4" ){
                            $freq="2" ;}
                                else if($or_ptime == "3,4" ){
                                $freq="2" ;}
                                    else if($or_ptime == "1,2,3" ){
                                    $freq="3" ;}
                                        else if($or_ptime == "1,2,3,4" ){
                                        $freq="4" ;}
                else{
                $freq="0" ;
            }
    $or_med = $freq*$or_day;

    session_start();

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: start.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: start.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardiac center</title>
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
 
    <link rel="stylesheet" href="/css/styles_web.css" />
    <link rel="stylesheet" href="/css/styles_order.css" />
</head>
<body>
     <nav class="navbar navbar-expand-lg navbar-light">  
      <div class="container-fluid">
        <a class="navbar-brand" href="insertForm.php"
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
            <li class="nav-item dropdown">
              <a class="nav-link" href="patients-lits.php">รายชื่อผู้ป่วย</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="/php/insertForm.php">ลงทะเบียนผู้ป่วย</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/php/update.php">เพิ่มข้อมูลยา</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="/php/order.php">การสั่งยา</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/php/send_msg.php ">ข้อความ</a>
            </li>
            <li class="nav-item">
            <?php if (isset($_SESSION['username'])) : ?>
              <a class="nav-link" href="patients-lits.php?logout='1'">ออกจากระบบ</a>
              <?php endif ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <h1 class="center-align">กรุณาตรวจสอบ</h1>

    

    <div class="container">
      <div class="card">
        <div class="card-body">
          <form action="add3.php" method="POST">
            <div class="row mb-3">
              <label for="inputText1" class="col-sm-2 col-form-label">รหัสผู้ป่วย</label>
              <div class="col-sm-10">
                <input type="text"  class="form-control" name="or_HN" value="<?php echo"$or_HN";?>"/>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText1" class="col-sm-2 col-form-label">CODE</label>
              <div class="col-sm-10">
                <input type="text"  class="form-control" name="or_code" value="<?php echo"$or_code";?>"/>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText1" class="col-sm-2 col-form-label">ชื่อยา</label>
              <div class="col-sm-10">
                <input type="text"  class="form-control" name="or_n" value="<?php echo"$or_n";?>"/>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText1" class="col-sm-2 col-form-label">ช่วงที่รับประทาน</label>
              <div class="col-sm-10">
                <input type="text"  class="form-control" name="or_time" value="<?php echo"$or_time";?>"/>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText1" class="col-sm-2 col-form-label">ความถี่ต่อวัน</label>
              <div class="col-sm-10">
                <input type="text"  class="form-control" name="or_ptime" value="<?php echo"$or_ptime";?>"/>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText1" class="col-sm-2 col-form-label">จำนวนยาทั้งหมด</label>
              <div class="col-sm-10">
                <input type="number"  class="form-control" name="or_tt" value="<?php echo"$or_tt";?>"/>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText1" class="col-sm-2 col-form-label">จำนวนรับประทานต่อครั้ง</label>
              <div class="col-sm-10">
                <input type="number"  class="form-control" name="or_day" value="<?php echo"$or_day";?>"/>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText1" class="col-sm-2 col-form-label">หน่วย</label>
              <div class="col-sm-10">
                <input type="text"  class="form-control" name="or_unit" value="<?php echo"$or_unit";?>"/>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText1" class="col-sm-2 col-form-label">จำนวนรับประทานต่อวัน</label>
              <div class="col-sm-10">
                <input type="text"  class="form-control" name="or_med" value="<?php echo"$or_med";?>"/>
              </div>
            </div>
            <button type="submit" name="submit1" class="btn btn-primary btn-last" >ถูกต้อง</button>
            </form>
            </div>
            </div>
            </div>


    <!-- <label>HN :</label>
    <input type="text" name="or_HN" value="<?php echo"$or_HN";?>" ><br>
    <input type="text" name="or_code" value="<?php echo"$or_code";?>" ><br>
    <input type="text" name="or_n" value="<?php echo"$or_n";?>" ><br>
    <input type="text" name="or_time" value="<?php echo"$or_time";?>" ><br>
    <input type="text" name="or_ptime" value="<?php echo"$or_ptime";?>" ><br>
    <input type="number" name="or_tt" value="<?php echo"$or_tt";?>" ><br>
    <input type="text" name="or_day" value="<?php echo"$or_day";?>" ><br>
    <input type="text" name="or_unit" value="<?php echo"$or_unit";?>" ><br>
    <input type="text" name="or_med" value="<?php echo"$or_med";?>" ><br>
    <button type="submit" name="submit1" >right</button>
     -->

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








