<?php
    session_start();
    $username = trim($_POST['username']);
    $pw = trim($_POST['pw']);
    if(!strlen($username) || !strlen($pw)){
        echo "<script>alert('Please fill in your username and password');history.back();</script>";
        exit;
    }

    include_once "conn.php";
    $sql = "select * from landlord where ll_name = '$username' and ll_passwd = '$pw'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if($num){
        $_SESSION['loggedUsername'] = $username;
        echo "<script>alert('Login successfully');location.href = '../web/lo_rent.php';</script>";
    }else{

        unset($_SESSION['loggedUsername']);

        echo "<script>alert('Wrong username or password');history.back();</script>";
    }
?>