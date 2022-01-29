<?php
require('Dbconnects.php');

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
    <link rel="stylesheet" href="/css/styles_web_p.css"/>
    <link rel="stylesheet" href="/css/styles_msg.css"/>
    <link rel="stylesheet" href="fa/css/all.css"/>
    <script src="web_p.php" defer></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
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
           </ul>
           <?php
          require('Dbconnects.php');
          $member_HN=$_GET["HN"];
          $sql_get = mysqli_query($connect,"SELECT me.*,p.member_HN
                                    FROM message as me
                                    INNER JOIN patient AS p ON me.HN = p.member_HN
                                    WHERE me.status=0 AND me.HN=$member_HN");
          $count = mysqli_num_rows($sql_get);
          
          ?>
          <form class="d-flex">
          <ul class="navbar-nav me-auto my-2 my-lg-0">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarScrollingDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
              <i class="fas fa-envelope" style="zoom:1.2"></i>
              <span class="badge bg-danger" id="count"><?php echo $count; ?></span>
              </a>
              <ul
                class="dropdown-menu"
                aria-labelledby="navbarDropdown"
              >
                <?php
                require('Dbconnects.php');
                  $member_HN=$_GET["HN"]; 
                  $sql_get1 = mysqli_query($connect,"SELECT me.*,p.member_HN
                                                     FROM message as me
                                                     INNER JOIN patient AS p ON me.HN = p.member_HN
                                                     WHERE me.status=0 AND me.HN=$member_HN");
              
                  if(mysqli_num_rows($sql_get1)>0){
                    while($result =  mysqli_fetch_assoc($sql_get1)){
                      echo '<li><a class="dropdown-item" href="read_msg.php?HN='.$result['HN'].'">'.$result['message'].'</a></li>';
                      echo '<div class="dropdow-divider"></div>';
                    }
                  }else{
                    echo '<li><a class="dropdown-item text-danger font-weight-bold" href="#"><i class="fas fa-frown"></i> Sorry! No Message</a></li>';
                  }
                
                ?>
                
              </ul>
            </li>
          </ul>
        </div>
        </div>
        </div>
      </div>
    </nav>

    <div class="row">
   <div class="card information">
    <p class="card-title-head"><b>ข้อมูลผู้ป่วย</b></p>
    <?php require('Dbconnects.php');
      $member_HN=$_GET["HN"];
      $sql="SELECT * FROM patient WHERE member_HN =$member_HN";
      $result=mysqli_query($connect,$sql);
      $row=mysqli_fetch_assoc($result);
      ?>
    
      <div class="col-sm-8">
        <div class="card Layout-information">
          <div class="card-body">
            <form class="row gap-3">
              <div class="col-auto">
                <label for="label_HN">รหัสผู้ป่วย :</label>
                <input readonly 
                  placeholder="รหัส"
                  id="lebel_HN"
                  type="text"
                  v-model="HN"
                  name="member_HN" 
                  value="<?php echo $row['member_HN'] ;?>"
                />
              </div>
              <div class="row gap-3">
                <div class="col-auto">
                  <label for="label_patientname">ชื่อผู้ป่วย :</label>
                  <input readonly
                    placeholder="ชื่อผู้ป่วย"
                    id="lebel_patientname"
                    type="text"
                    v-model="patientname"
                    name="member_fname" 
                    value="<?php echo $row["member_fname"] ;?>"
                  />
                </div>
                <div class="col-sm-6">
                  <label for="label_patientname">นามสกุลผู้ป่วย :</label>
                  <input readonly
                    placeholder="นามสกุลผู้ป่วย"
                    id="lebel_patientname"
                    type="text"
                    v-model="patientname"
                    name="member_lname" 
                    value="<?php echo $row["member_lname"] ;?>"
                  />
                </div>
              </div>
              <div class="row gap-3">
                <div class="col-auto">
                  <label for="label_patientname">เพศ :</label>
                  <input readonly
                    placeholder="เพศ"
                    id="lebel_gender"
                    type="text"
                    v-model="gender"
                    name="member_genger" 
                    value="<?php echo $row["member_gender"] ;?>"
                  />
                </div>
                <div class="col-auto">
                  <label for="label_date">วันเกิด :</label>
                  <input  readonly
                    placeholder="วัน/เดือน/ปี"
                    id="lebel_date"
                    type="text"
                    v-model="date"
                    name="member_birth" 
                    value="<?php echo $row["member_birth"] ;?>"
                  />
                </div>
                <div class="col-auto">
                  <label for="label_age">อายุ :</label>
                  <input readonly
                    placeholder="อายุ"
                    id="lebel_age"
                    type="number"
                    v-model="age"
                    name="member_age" 
                    value="<?php echo $row["member_age"] ;?>"
                  />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      </div>
      </div>

      

<div class="row">
        <div class="card information col-sm-7">
          <p class="card-title-head"><b>ตารางการรับประทานยาของผู้ป่วย</b></p>
          <table class="table">
            <thead>
              <tr>
                <td class="align-middle" colspan="2" rowspan="2">ช่วงเวลา</td>
                <td class="align-middle" colspan="2">
                  <script language="javascript">
                    now = new Date();
                    var thday = new Array(
                      "อาทิตย์",
                      "จันทร์",
                      "อังคาร",
                      "พุธ",
                      "พฤหัส",
                      "ศุกร์",
                      "เสาร์"
                    );
                    var thmonth = new Array(
                      "มกราคม",
                      "กุมภาพันธ์",
                      "มีนาคม",
                      "เมษายน",
                      "พฤษภาคม",
                      "มิถุนายน",
                      "กรกฎาคม",
                      "สิงหาคม",
                      "กันยายน",
                      "ตุลาคม",
                      "พฤศจิกายน",
                      "ธันวาคม"
                    );
                    document.write(
                      "วัน" +
                        thday[now.getDay()] +
                        "ที่ " +
                        now.getDate() +
                        " " +
                        thmonth[now.getMonth()] +
                        " " +
                        (1900 + now.getYear() + 543)
                    );
                  </script>
                </td>
              </tr>
              <tr>
                <td class="align-middle">รายการยา</td>
                <td class="align-middle">ครั้งละกี่เม็ด</td>
              </tr>
            </thead>
            <tbody>
              
              <tr>
                <td class="align-middle" rowspan="2">เช้า</td>
                <td class="align-middle">ก่อนอาหาร</td>
                <td class="align-middle">
                <?php 
              include('Dbconnects.php'); 
              $member_HN=$_GET["HN"];        
              $sql = "SELECT s.*,p.member_HN, t.timed, m.med_pp, m.med_pm, m.med_p, m.med_w, m.med_e
                      FROM stock as s
                      INNER JOIN patient as p ON s.or_HN= p.member_HN
                      INNER JOIN medicine as m ON s.or_code= m.med_code
                      INNER JOIN timea as t ON s.or_time= t.timed 
                      WHERE t.timeid=1 AND or_ptime LIKE '%1%' AND s.or_HN =$member_HN
                      ORDER BY s.or_code ASC"
                      or die ("Error Query [".$sql."]");
                      // echo $query;
                      // exit;
              $result=mysqli_query($connect,$sql);
              foreach ($result as $row) {?>
                  <div class="information-popup">
                    <a
                      href="#"
                      onclick="document.getElementById('id10').style.display='block'"
                      class=""
                      ><?php echo $row["or_n"] ;?></a>
                  </div>
                  <?php } ?>
                </td>
                <td class="align-middle  w3-margin-bottom setnumber">
                <?php 
              include('Dbconnects.php');         
              $sql = "SELECT s.*,p.member_HN, t.timed, m.med_pp, m.med_pm, m.med_p, m.med_w, m.med_e
                      FROM stock as s
                      INNER JOIN patient as p ON s.or_HN= p.member_HN
                      INNER JOIN medicine as m ON s.or_code= m.med_code
                      INNER JOIN timea as t ON s.or_time= t.timed 
                      WHERE t.timeid=1 AND or_ptime LIKE '%1%' AND s.or_HN =$member_HN
                      ORDER BY s.or_code ASC"
                      or die ("Error Query [".$sql."]");
                      // echo $query;
                      // exit;
              $result=mysqli_query($connect,$sql);
              foreach ($result as $row) {?>
                  <?php echo $row["or_day"] ;?>  <br>
                  <?php } ?>
                </td>
                
                <td class="align-middle btn">
                <?php 
              include('Dbconnects.php');         
              $sql = "SELECT s.*,p.member_HN, t.timed, m.med_pp, m.med_pm, m.med_p, m.med_w, m.med_e
                      FROM stock as s
                      INNER JOIN patient as p ON s.or_HN= p.member_HN
                      INNER JOIN medicine as m ON s.or_code= m.med_code
                      INNER JOIN timea as t ON s.or_time= t.timed 
                      WHERE t.timeid=1 AND or_ptime LIKE '%1%' AND s.or_HN =$member_HN
                      ORDER BY s.or_code ASC"
                      or die ("Error Query [".$sql."]");
                      // echo $query;
                      // exit;
              $result=mysqli_query($connect,$sql); ?>
              <?php foreach ($result as $row) {?>
                <form action="savemed.php" method="POST">
                  <input type="hidden" value="<?php echo $row["or_n"];?>" name="n">
                  <button type=submit class="btn btn-info">view</button>
                  <!-- <a href="information.php?name=<?php echo $row["or_n"];?>" class="btn btn-info">view</a> <br> -->
                </form>
                <?php } ?>
                </td>
                </tr>
                
              
              <tr>
              <td class="align-middle">หลังอาหาร</td>
                <td class="align-middle">
                <?php 
              include('Dbconnects.php');         
              $sql = "SELECT s.*,p.member_HN, t.timed, m.med_pp, m.med_pm, m.med_p, m.med_w, m.med_e
                      FROM stock as s
                      INNER JOIN patient as p ON s.or_HN= p.member_HN
                      INNER JOIN medicine as m ON s.or_code= m.med_code
                      INNER JOIN timea as t ON s.or_time= t.timed 
                      WHERE t.timeid=2 AND or_ptime LIKE '%1%' AND s.or_HN =$member_HN
                      ORDER BY s.or_code ASC"
                      or die ("Error Query [".$sql."]");
                      // echo $query;
                      // exit;
              $result=mysqli_query($connect,$sql);
              foreach ($result as $row) {?>
                  <div class="information-popup">
                    <a
                      href="#"
                      onclick="document.getElementById('id10').style.display='block'"
                      class=""
                      ><?php echo $row["or_n"] ;?></a>
                  </div>
                  <?php } ?>
                </td>
                <td class="align-middle  w3-margin-bottom setnumber">
                <?php 
              include('Dbconnects.php');         
              $sql = "SELECT s.*,p.member_HN, t.timed, m.med_pp, m.med_pm, m.med_p, m.med_w, m.med_e
                        FROM stock as s
                        INNER JOIN patient as p ON s.or_HN= p.member_HN
                        INNER JOIN medicine as m ON s.or_code= m.med_code
                        INNER JOIN timea as t ON s.or_time= t.timed 
                        WHERE t.timeid=2 AND or_ptime LIKE '%1%' AND s.or_HN =$member_HN
                        ORDER BY s.or_code ASC"
                        or die ("Error Query [".$sql."]");
                      // echo $query;
                      // exit;
              $result=mysqli_query($connect,$sql);
              foreach ($result as $row) {?>
                  <?php echo $row["or_day"] ;?>  <br>
                  <?php } ?>
                </td>
                <td class="align-middle btn">
                <?php 
              include('Dbconnects.php');         
              $sql = "SELECT s.*,p.member_HN, t.timed, m.med_pp, m.med_pm, m.med_p, m.med_w, m.med_e
                        FROM stock as s
                        INNER JOIN patient as p ON s.or_HN= p.member_HN
                        INNER JOIN medicine as m ON s.or_code= m.med_code
                        INNER JOIN timea as t ON s.or_time= t.timed 
                        WHERE t.timeid=2 AND or_ptime LIKE '%1%' AND s.or_HN =$member_HN
                        ORDER BY s.or_code ASC"
                        or die ("Error Query [".$sql."]");
                      // echo $query;
                      // exit;
                      $result=mysqli_query($connect,$sql); ?>
                      <?php foreach ($result as $row) {?>
                        <form action="savemed.php" method="POST">
                          <input type="hidden" value="<?php echo $row["or_n"];?>" name="n">
                          <button type=submit class="btn btn-info" >view</button>
                          <!-- <a href="information.php?name=<?php echo $row["or_n"];?>" class="btn btn-info">view</a> <br> -->
                        </form>
                        <?php } ?>
                        </td>
                        </tr>

              <tr>
                <td class="align-middle" rowspan="2">กลางวัน</td>
                <td class="align-middle">ก่อนอาหาร</td>
                <td class="align-middle">
                <?php 
              include('Dbconnects.php');         
              $sql = "SELECT s.*,p.member_HN, t.timed, m.med_pp, m.med_pm, m.med_p, m.med_w, m.med_e
                      FROM stock as s
                      INNER JOIN patient as p ON s.or_HN= p.member_HN
                      INNER JOIN medicine as m ON s.or_code= m.med_code
                      INNER JOIN timea as t ON s.or_time= t.timed 
                      WHERE t.timeid=1 AND or_ptime LIKE '%2%' AND s.or_HN =$member_HN
                      ORDER BY s.or_code ASC"
                      or die ("Error Query [".$sql."]");
                      // echo $query;
                      // exit;
              $result=mysqli_query($connect,$sql);
              foreach ($result as $row) {?>
                  <div class="information-popup">
                    <a
                      href="#"
                      onclick="document.getElementById('id10').style.display='block'"
                      class=""
                      ><?php echo $row["or_n"] ;?></a>
                  </div>
                  <?php } ?>
                </td>
                <td class="align-middle  w3-margin-bottom setnumber">
                <?php 
              include('Dbconnects.php');         
              $sql = "SELECT s.*,p.member_HN, t.timed, m.med_pp, m.med_pm, m.med_p, m.med_w, m.med_e
                      FROM stock as s
                      INNER JOIN patient as p ON s.or_HN= p.member_HN
                      INNER JOIN medicine as m ON s.or_code= m.med_code
                      INNER JOIN timea as t ON s.or_time= t.timed 
                      WHERE t.timeid=1 AND or_ptime LIKE '%2%' AND s.or_HN =$member_HN
                      ORDER BY s.or_code ASC"
                      or die ("Error Query [".$sql."]");
                      // echo $query;
                      // exit;
              $result=mysqli_query($connect,$sql);
              foreach ($result as $row) {?>
                  <?php echo $row["or_day"] ;?>  <br>
                  <?php } ?>
                </td>
                <td class="align-middle btn">
                <?php 
              include('Dbconnects.php');         
              $sql = "SELECT s.*,p.member_HN, t.timed, m.med_pp, m.med_pm, m.med_p, m.med_w, m.med_e
                      FROM stock as s
                      INNER JOIN patient as p ON s.or_HN= p.member_HN
                      INNER JOIN medicine as m ON s.or_code= m.med_code
                      INNER JOIN timea as t ON s.or_time= t.timed 
                      WHERE t.timeid=1 AND or_ptime LIKE '%2%' AND s.or_HN =$member_HN
                      ORDER BY s.or_code ASC"
                      or die ("Error Query [".$sql."]");
                      // echo $query;
                      // exit;
                      $result=mysqli_query($connect,$sql); ?>
                      <?php foreach ($result as $row) {?>
                        <form action="savemed.php" method="POST">
                          <input type="hidden" value="<?php echo $row["or_n"];?>" name="n">
                          <button type=submit class="btn btn-info">view</button>
                          <!-- <a href="information.php?name=<?php echo $row["or_n"];?>" class="btn btn-info">view</a> <br> -->
                        </form>
                        <?php } ?>
                        </td>
                        </tr>
                
              
              <tr>
              <td class="align-middle">หลังอาหาร</td>
                <td class="align-middle">
                <?php 
              include('Dbconnects.php');         
              $sql = "SELECT s.*,p.member_HN, t.timed, m.med_pp, m.med_pm, m.med_p, m.med_w, m.med_e
                      FROM stock as s
                      INNER JOIN patient as p ON s.or_HN= p.member_HN
                      INNER JOIN medicine as m ON s.or_code= m.med_code
                      INNER JOIN timea as t ON s.or_time= t.timed 
                      WHERE t.timeid=2 AND or_ptime LIKE '%2%' AND s.or_HN =$member_HN
                      ORDER BY s.or_code ASC"
                      or die ("Error Query [".$sql."]");
                      // echo $query;
                      // exit;
              $result=mysqli_query($connect,$sql);
              foreach ($result as $row) {?>
                  <div class="information-popup">
                    <a
                      href="#"
                      onclick="document.getElementById('id10').style.display='block'"
                      class=""
                      ><?php echo $row["or_n"] ;?></a>
                  </div>
                  <?php } ?>
                </td>
                <td class="align-middle  w3-margin-bottom setnumber">
                <?php 
              include('Dbconnects.php');         
              $sql = "SELECT s.*,p.member_HN, t.timed, m.med_pp, m.med_pm, m.med_p, m.med_w, m.med_e
                      FROM stock as s
                      INNER JOIN patient as p ON s.or_HN= p.member_HN
                      INNER JOIN medicine as m ON s.or_code= m.med_code
                      INNER JOIN timea as t ON s.or_time= t.timed 
                      WHERE t.timeid=2 AND or_ptime LIKE '%2%' AND s.or_HN =$member_HN
                      ORDER BY s.or_code ASC"
                      or die ("Error Query [".$sql."]");
                      // echo $query;
                      // exit;
              $result=mysqli_query($connect,$sql);
              foreach ($result as $row) {?>
                  <?php echo $row["or_day"] ;?>  <br>
                  <?php } ?>
                </td>
                <td class="align-middle btn">
                <?php 
              include('Dbconnects.php');         
              $sql = "SELECT s.*,p.member_HN, t.timed, m.med_pp, m.med_pm, m.med_p, m.med_w, m.med_e
                      FROM stock as s
                      INNER JOIN patient as p ON s.or_HN= p.member_HN
                      INNER JOIN medicine as m ON s.or_code= m.med_code
                      INNER JOIN timea as t ON s.or_time= t.timed 
                      WHERE t.timeid=2 AND or_ptime LIKE '%2%' AND s.or_HN =$member_HN
                      ORDER BY s.or_code ASC"
                      or die ("Error Query [".$sql."]");
                      // echo $query;
                      // exit;
                      $result=mysqli_query($connect,$sql); ?>
                      <?php foreach ($result as $row) {?>
                        <form action="savemed.php" method="POST">
                          <input type="hidden" value="<?php echo $row["or_n"];?>" name="n">
                          <button type=submit class="btn btn-info">view</button>
                          <!-- <a href="information.php?name=<?php echo $row["or_n"];?>" class="btn btn-info">view</a> <br> -->
                        </form>
                        <?php } ?>
                        </td>
                        </tr>

              <tr>
                <td class="align-middle" rowspan="2">เย็น</td>
                <td class="align-middle">ก่อนอาหาร</td>
                <td class="align-middle">
                <?php 
              include('Dbconnects.php');         
              $sql = "SELECT s.*,p.member_HN, t.timed, m.med_pp, m.med_pm, m.med_p, m.med_w, m.med_e
                      FROM stock as s
                      INNER JOIN patient as p ON s.or_HN= p.member_HN
                      INNER JOIN medicine as m ON s.or_code= m.med_code
                      INNER JOIN timea as t ON s.or_time= t.timed 
                      WHERE t.timeid=1 AND or_ptime LIKE '%3%' AND s.or_HN =$member_HN
                      ORDER BY s.or_code ASC"
                      or die ("Error Query [".$sql."]");
                      // echo $query;
                      // exit;
              $result=mysqli_query($connect,$sql);
              foreach ($result as $row) {?>
                  <div class="information-popup">
                    <a
                      href="#"
                      onclick="document.getElementById('id10').style.display='block'"
                      class=""
                      ><?php echo $row["or_n"] ;?></a>
                  </div>
                  <?php } ?>
                </td>
                <td class="align-middle  w3-margin-bottom setnumber">
                <?php 
              include('Dbconnects.php');         
              $sql = "SELECT s.*,p.member_HN, t.timed, m.med_pp, m.med_pm, m.med_p, m.med_w, m.med_e
                      FROM stock as s
                      INNER JOIN patient as p ON s.or_HN= p.member_HN
                      INNER JOIN medicine as m ON s.or_code= m.med_code
                      INNER JOIN timea as t ON s.or_time= t.timed 
                      WHERE t.timeid=1 AND or_ptime LIKE '%3%' AND s.or_HN =$member_HN
                      ORDER BY s.or_code ASC"
                      or die ("Error Query [".$sql."]");
                      // echo $query;
                      // exit;
              $result=mysqli_query($connect,$sql);
              foreach ($result as $row) {?>
                  <?php echo $row["or_day"] ;?>  <br>
                  <?php } ?>
                </td>
                <td class="align-middle btn">
                <?php 
              include('Dbconnects.php');         
              $sql = "SELECT s.*,p.member_HN, t.timed, m.med_pp, m.med_pm, m.med_p, m.med_w, m.med_e
                      FROM stock as s
                      INNER JOIN patient as p ON s.or_HN= p.member_HN
                      INNER JOIN medicine as m ON s.or_code= m.med_code
                      INNER JOIN timea as t ON s.or_time= t.timed 
                      WHERE t.timeid=1 AND or_ptime LIKE '%3%' AND s.or_HN =$member_HN
                      ORDER BY s.or_code ASC"
                      or die ("Error Query [".$sql."]");
                      // echo $query;
                      // exit;
              $result=mysqli_query($connect,$sql); ?>
              <?php foreach ($result as $row) {?>
                <form action="savemed.php" method="POST">
                  <input type="hidden" value="<?php echo $row["or_n"];?>" name="n">
                  <button type=submit class="btn btn-info">view</button>
                  <!-- <a href="information.php?name=<?php echo $row["or_n"];?>" class="btn btn-info">view</a> <br> -->
                </form>
                <?php } ?>
                </td>
                </tr>

              
              <tr>
              <td class="align-middle">หลังอาหาร</td>
                <td class="align-middle">
                <?php 
              include('Dbconnects.php');         
              $sql = "SELECT s.*,p.member_HN, t.timed, m.med_pp, m.med_pm, m.med_p, m.med_w, m.med_e
                      FROM stock as s
                      INNER JOIN patient as p ON s.or_HN= p.member_HN
                      INNER JOIN medicine as m ON s.or_code= m.med_code
                      INNER JOIN timea as t ON s.or_time= t.timed 
                      WHERE t.timeid=2 AND or_ptime LIKE '%3%' AND s.or_HN =$member_HN
                      ORDER BY s.or_code ASC"
                      or die ("Error Query [".$sql."]");
                      // echo $query;
                      // exit;
              $result=mysqli_query($connect,$sql);
              foreach ($result as $row) {?>
                  <div class="information-popup">
                    <a
                      href="#"
                      onclick="document.getElementById('id10').style.display='block'"
                      class=""
                      ><?php echo $row["or_n"] ;?></a>
                  </div>
                  <?php } ?>
                </td>
                <td class="align-middle  w3-margin-bottom setnumber">
                <?php 
              include('Dbconnects.php');         
              $sql = "SELECT s.*,p.member_HN, t.timed, m.med_pp, m.med_pm, m.med_p, m.med_w, m.med_e
                      FROM stock as s
                      INNER JOIN patient as p ON s.or_HN= p.member_HN
                      INNER JOIN medicine as m ON s.or_code= m.med_code
                      INNER JOIN timea as t ON s.or_time= t.timed 
                      WHERE t.timeid=2 AND or_ptime LIKE '%3%' AND s.or_HN =$member_HN
                      ORDER BY s.or_code ASC"
                      or die ("Error Query [".$sql."]");
                      // echo $query;
                      // exit;
              $result=mysqli_query($connect,$sql);
              foreach ($result as $row) {?>
                  <?php echo $row["or_day"] ;?>  <br>
                  <?php } ?>
                </td>
                <td class="align-middle btn">
                <?php 
              include('Dbconnects.php');         
              $sql = "SELECT s.*,p.member_HN, t.timed, m.med_pp, m.med_pm, m.med_p, m.med_w, m.med_e
                      FROM stock as s
                      INNER JOIN patient as p ON s.or_HN= p.member_HN
                      INNER JOIN medicine as m ON s.or_code= m.med_code
                      INNER JOIN timea as t ON s.or_time= t.timed 
                      WHERE t.timeid=2 AND or_ptime LIKE '%3%' AND s.or_HN =$member_HN
                      ORDER BY s.or_code ASC"
                      or die ("Error Query [".$sql."]");
                      // echo $query;
                      // exit;
                      $result=mysqli_query($connect,$sql); ?>
                      <?php foreach ($result as $row) {?>
                        <form action="savemed.php" method="POST">
                          <input type="hidden" value="<?php echo $row["or_n"];?>" name="n">
                          <button type=submit class="btn btn-info">view</button>
                          <!-- <a href="information.php?name=<?php echo $row["or_n"];?>" class="btn btn-info">view</a> <br> -->
                        </form>
                        <?php } ?>
                        </td>
                        </tr>

              <tr>
                <td class="align-middle" colspan="2">ก่อนนอน</td>
                <td class="align-middle">
                <?php 
              include('Dbconnects.php');         
              $sql = "SELECT s.*,p.member_HN, t.timed, m.med_pp, m.med_pm, m.med_p, m.med_w, m.med_e
                      FROM stock as s
                      INNER JOIN patient as p ON s.or_HN= p.member_HN
                      INNER JOIN medicine as m ON s.or_code= m.med_code
                      INNER JOIN timea as t ON s.or_time= t.timed 
                      WHERE t.timeid=3 AND or_ptime LIKE '%4%' AND s.or_HN =$member_HN
                      ORDER BY s.or_code ASC"
                      or die ("Error Query [".$sql."]");
                      // echo $query;
                      // exit;
              $result=mysqli_query($connect,$sql);
              foreach ($result as $row) {?>
                  <div class="information-popup">
                    <a
                      href="#"
                      onclick="document.getElementById('id10').style.display='block'"
                      class=""
                      ><?php echo $row["or_n"] ;?></a>
                  </div>
                  <?php } ?>
                </td>
                <td class="align-middle  w3-margin-bottom setnumber">
                <?php 
              include('Dbconnects.php');         
              $sql = "SELECT s.*,p.member_HN, t.timed, m.med_pp, m.med_pm, m.med_p, m.med_w, m.med_e
                      FROM stock as s
                      INNER JOIN patient as p ON s.or_HN= p.member_HN
                      INNER JOIN medicine as m ON s.or_code= m.med_code
                      INNER JOIN timea as t ON s.or_time= t.timed 
                      WHERE t.timeid=3 AND or_ptime LIKE '%4%' AND s.or_HN =$member_HN
                      ORDER BY s.or_code ASC"
                      or die ("Error Query [".$sql."]");
                      // echo $query;
                      // exit;
              $result=mysqli_query($connect,$sql);
              foreach ($result as $row) {?>
                  <?php echo $row["or_day"] ;?>  <br>
                  <?php } ?>
                </td>
                <td class="align-middle btn">
                <?php 
              include('Dbconnects.php');         
              $sql = "SELECT s.*,p.member_HN, t.timed, m.med_pp, m.med_pm, m.med_p, m.med_w, m.med_e
                      FROM stock as s
                      INNER JOIN patient as p ON s.or_HN= p.member_HN
                      INNER JOIN medicine as m ON s.or_code= m.med_code
                      INNER JOIN timea as t ON s.or_time= t.timed 
                      WHERE t.timeid=3 AND or_ptime LIKE '%4%' AND s.or_HN =$member_HN
                      ORDER BY s.or_code ASC"
                      or die ("Error Query [".$sql."]");
                      // echo $query;
                      // exit;
              $result=mysqli_query($connect,$sql); ?>
              <?php foreach ($result as $row) {?>
                <form action="savemed.php" method="POST">
                  <input type="hidden" value="<?php echo $row["or_n"];?>" name="n">
                  <button type=submit class="btn btn-info">view</button>
                  <!-- <a href="information.php?name=<?php echo $row["or_n"];?>" class="btn btn-info">view</a> <br> -->
                </form>
                <?php } ?>
                </td>
                </tr>
               
            </tbody>
          </table>
          <br />
        </div>
        <div class="col-sm-3">
          <label class="w3-margin-bottom card-title-head_1"><b>วิธีปฎิบัติตัวกรณีลืมรับประทานยา</b></label>
          <div class="card_1">
            <label class="information_1"><b>กรณีลืมทานยาไม่เกิน 12 ชั่วโมง</b>&nbsp;นับจากเวลาเดิมที่เคยกินให้รีบทานทันทีที่นึกขึ้นได้ในขนาดยาเท่าเดิม</label>
          </div>
          <br/>
          <div class="card_1">
            <label class="information_1"><b>กรณีลืมทานยาเกิน 12 ชั่วโมง</b>&nbsp;ไปแล้วให้ข้ามยามื้อนั้นไปและทานมื้อต่อไปในขนาดเดิม เวลาเดิมโดยไม่ต้องเพิ่มขนาดยาเป็น 2 เท่า</label>
          </div>
          <br/>
          <button type="button" name="print" id="print" class="btn-last" onclick="window.print();">Print</button>
        </div>
      </div>
      <div class="w3-container container">
          <button
            onclick="document.getElementById('id01').style.display='block'"
            class="w3-button w3-green w3-large" id="btn_01"
          >
            ยืนยันการรับประทานยา
          </button>
          <div id="id01" class="w3-modal">
          <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:1000px">
          <div class="w3-center">
             
                <span
                  onclick="document.getElementById('id01').style.display='none'"
                  class="w3-button w3-xlarge w3-hover-red w3-display-topright"
                  title="Close Modal">&times;
                </span>
                <img
                  src="/img/logo_popup.png"
                  alt="logo"
                  style="width: 40%"
                  class="w3-circle w3-margin-top"
                />
              </div>
                <div class="w3-section">
                  <label class="w3-margin-bottom">
                    <b>ยืนยันการรับประทานยา</b></label>
                  <br/>
                  <div class="row row-cols-lg-auto ">
                    <label class="w3-margin-bottom">
                      <b>รหัสผู้ป่วย :</b></label>
                      
                    <input
                          class="w3-input w3-border w3-margin-bottom sizetext"
                          type="text"
                          placeholder="รายการยา"
                          value="<?php echo $row["member_HN"] ;?>"
                          name=""
                          id="name"
                          required
                        />
                        </div>
              
                  <p class="card-text">*จดบันทึกทุกครั้งที่ลืมรับประทานยา</p> 
                    <p id="quantity1-error"></p>
                    <?php 
              include('Dbconnects.php');         
              $sql = "SELECT s.*,p.member_HN, t.timed, m.med_pp, m.med_pm, m.med_p, m.med_w, m.med_e
                      FROM stock as s
                      INNER JOIN patient as p ON s.or_HN= p.member_HN
                      INNER JOIN medicine as m ON s.or_code= m.med_code
                      INNER JOIN timea as t ON s.or_time= t.timed 
                      WHERE  s.or_HN =$member_HN
                      ORDER BY s.or_code ASC"
                      or die ("Error Query [".$sql."]");
                      // echo $query;
                      // exit;
              $result=mysqli_query($connect,$sql);?>
              
                    <table class="table">
  <thead>

 
    <tr>
      <th scope="col"  style="font-size: 16px;">#</th>
      <th scope="col" style="font-size: 16px;"></th>
      <th scope="col" style="font-size: 16px;">รหัสยา</th>
      <th scope="col" style="font-size: 16px;">ชื่อยา</th>
      <th scope="col" style="font-size: 16px;">จำนวนยาต่อวัน(เม็ด)</th>
      <th scope="col" style="font-size: 16px;">การยืนยัน</th>
      <th scope="col" style="font-size: 16px;">จำนวนยาที่ลืม(เม็ด)</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($result as $row) {?> 
    <?php  $date = date('y-m-d'); ?>
    <tr>
    <form class="w3-container" action="conmed.php?HN=<?php echo $row["member_HN"];?>" method="POST" >
    <td><input type="hidden" name="con_HN" readonly style="width: 130px;" value="<?php echo $row["or_HN"] ;?>"></td>
    <td><input type="hidden" name="con_d"  style="width: 150px;" value="<?php echo $date;?>"></td>
    <td><input type="text" name="con_code" readonly style="width: 100px;" value="<?php echo $row["or_code"] ;?>"></td>
      <td><input type="text" name="con_n" readonly value="<?php echo $row["or_n"] ;?>"></td>
      <td><input type="text" name="con_med" style="width: 50px;" value="<?php echo $row["or_med"] ;?>"></td>
      <td><input type="checkbox" name="con_c[]" VALUE="0">&nbsp;ยืนยัน <br>
          <input type="checkbox" name="con_c[]" VALUE="1">&nbsp;ลืม
    </td>
    <td><input type="text" name="con_f" style="width: 50px;" ></td>
     
      <td><button class=" w3-button w3-block w3-green w3-section w3-padding" type="submit" name="submit" id="btn" >บันทึก</button></td>
    </tr>
    </form>
    <?php  } ?>
             
    </tbody>
   
</table>
                
                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                 <button onclick="document.getElementById('id01').style.display='none'"
                type="button"
                class="w3-button w3-red"
                >ยกเลิก</button>
                </div>
              
            </div>
          </div>
        </div>

<br />


  
    

    
    <!-- <script>
const form = document.getElementById("id01");
const btnElement = document.getElementById("btn");
const inputArray = document.querySelectorAll("input");

form.addEventListener("submit", logSubmit);
for (const input of inputArray) {
  const id = input.getAttribute("id");
  const errorElement = document.getElementById(`${id}-error`);
  input.addEventListener("input", (event) =>
    handleChange(event, id, errorElement)
  );
}

function handleChange(event, id, errorElement) {
  const value = event.target.value;
  errorElement.textContent = validateInput(id, value);
  validateAllInputs();
}

function validateInput(id, value) {
  let error = "";
  switch (id) {
    case "quantity1":
      const setnumber1 = document.getElementById("setnumber1").value;
      if (value !== setnumber1) error = "*รับประทานยาไม่ถูกต้องโปรดจดบันทึกข้อมูล";
      break;
      case "quantity2":
      const setnumber2 = document.getElementById("setnumber2").value;
      if (value !== setnumber2) error = "*รับประทานยาไม่ถูกต้องโปรดจดบันทึกข้อมูล";
      break;
      case "quantity3":
      const setnumber3 = document.getElementById("setnumber3").value;
      if (value !== setnumber3) error = "*รับประทานยาไม่ถูกต้องโปรดจดบันทึกข้อมูล";
      break;
      case "quantity4":
      const setnumber4 = document.getElementById("setnumber4").value;
      if (value !== setnumber4) error = "*รับประทานยาไม่ถูกต้องโปรดจดบันทึกข้อมูล";
      break;
      case "quantity5":
      const setnumber5 = document.getElementById("setnumber5").value;
      if (value !== setnumber5) error = "*รับประทานยาไม่ถูกต้องโปรดจดบันทึกข้อมูล";
      break;
      case "quantity6":
      const setnumber6 = document.getElementById("setnumber6").value;
      if (value !== setnumber6) error = "*รับประทานยาไม่ถูกต้องโปรดจดบันทึกข้อมูล";
      break;
      case "quantity7":
      const setnumber7 = document.getElementById("setnumber7").value;
      if (value !== setnumber7) error = "*รับประทานยาไม่ถูกต้องโปรดจดบันทึกข้อมูล";
      break;
    default:
      console.log("Unknwon id");
  }
  return error;
}

function logSubmit(event) {
  event.preventDefault();
  alert("บันทึกข้อมูลเรียบร้อยแล้ว");

  for (const input of inputArray) {
    input.value = "";
  }
  
}
</script> -->

  </body>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
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
</html>