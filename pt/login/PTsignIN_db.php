<?php 
    session_start();
    include('Dbconnects.php');

    $errors = array();

    if (isset($_POST["login_HN"])) {
        $member_HN = mysqli_real_escape_string($connect, $_POST['member_HN']);
       
        if (empty($member_HN)) {
            array_push($errors, "Hospital Number is required");
        }

        if (count($errors) == 0) {
            
            $query = "SELECT * FROM patient WHERE member_HN = '$member_HN'  ";
            $result = mysqli_query($connect, $query);

            if (mysqli_num_rows($result) == 1) {
                $_SESSION['member_HN'] = $member_HN;
                header("location: PT-web_p.php?HN=$member_HN");
            } else {
                array_push($errors, "Wrong Hospital Number");
                $_SESSION['error'] = "Wrong Hospital Number!";
                header("location: PTsignIN.php");
            }
        } else {
            array_push($errors, "Hospital Number is required");
            $_SESSION['error'] = "Hospital Number is required";
            header("location: PTsignIN.php");
        }
    }
?>