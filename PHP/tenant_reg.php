<?php
header("Content_Type:text/html;charset = utf-8");
    $username = trim($_POST['username']);
    $pw = trim($_POST['password']);
    $cpw = trim($_POST['password2']);
    $phone = $_POST['idcard'];

    include_once "conn.php";

    $sql = "select * from tenant where tn_name = '$username'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($num){
        echo "<script>alert('User name already exists, please reenter it.');history.back();</script>";
        exit;
    }

    $sql = "insert into tenant(tn_name,tn_passwd,tn_phonenum) values ('$username', '$pw', $phone)";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "<script>alert('Successful registration');location.href='../web/tenantlogin.html'</script>";
    }else{
        echo "<script>alert('Registration failed');</script>, $result";
    }
?>