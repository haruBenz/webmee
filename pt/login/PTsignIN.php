<?php
    session_start();
    include('Dbconnects.php'); 
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardiac certer</title>
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
    <link rel='stylesheet' href='/css/styles_loginP.css'/>
    
</head>
<body>
    <div id="user-login">
      <div class="container">
        <br /><br />
        <h1 class="mb-3">HEART FAILURE SYSTEM</h1>
        <a><img src="/img/login_logo.jpg" height="180px"/></a>
        <br /><br />

        <form action="PTsignIN_db.php" method="POST">
        <?php if (isset($_SESSION['error'])) : ?>
          <div class="error">
                <h3>
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">User Login</label>
            <div class="box">
              <input class='form-control' 
                     type='text' 
                     placeholder='Hospital Number'
                     name = member_HN>
                    </input>    
            </div> 
          </div>
          <br/>
          <div class="center-align">
            <button type="submit" class="btn btn-primary" name="login_HN" id="signin">LOGIN</button>
          </div>
          </form>
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