<?php
    $username = trim($_POST['username']);
    $phone = $_POST['phone'];
    $sex = $_POST['sex'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    
    if(!empty($email)){
        if(!preg_match('/^[a-zA-Z0-9_]+@([a-zA-Z0-9]+\.)+(com|cn|net|org)$/',$email)){
            echo "<script>alert('Please enter the correct email!');history.back();</script>";
            exit;
        }
    }
    
    include_once "conn.php";
    
    $sql = "Update landlord set ll_email = '$email', ll_address = '$address', ll_phonenum = $phone, ll_sex = '$sex'
    where ll_name = '$username'";
    $url = '../web/lo_myprofile.php';

    $result = mysqli_query($conn,$sql);

    if($result){
        echo "<script>alert('Data modification is successful!');location.href='$url';</script>";
    }else{
        echo "<script>alert('Data update failed!');history.back();</script>";
    }
?>