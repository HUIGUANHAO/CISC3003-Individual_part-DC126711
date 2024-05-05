<?php
header("Content_Type:text/html;charset = utf-8");
    $username = trim($_POST['username']);
    $pw = trim($_POST['password']);
    $cpw = trim($_POST['password2']);
    $phone = $_POST['phone'];

    include_once "conn.php";

    $sql = "select * from landlord where ll_name = '$username'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($num){
        echo "<script>alert('User name already exists, please reenter it');history.back();</script>";
        exit;
    }

    $sql = "insert into landlord(ll_name,ll_passwd,ll_phonenum) values ('$username', '$pw', $phone)";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "<script>alert('Registered successfully!');location.href='../web/landlordlogin.html'</script>";
    }else{
        echo "<script>alert('Fail to register');</script>";
    }
?>