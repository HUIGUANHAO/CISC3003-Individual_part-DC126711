<?php
    session_start();

    $username = trim($_SESSION['loggedUsername']);
    $title = trim($_POST['title']);//house_name
    $address = $_POST['address'];//address
    $type = $_POST['type'];//renthouse_type
    $unit = $_POST['unit'];//house_type
    $area = $_POST['area'];//area
    $style = $_POST['style'];//decoration
    $detail = $_POST['detail'];//detail
    $region = $_POST['region'];//region
    $rent = $_POST['rent'];//rent

    include_once "conn.php";
    
    $sql = "insert into house SET landlord_id = (SELECT landlord_id FROM landlord WHERE
     ll_name = '$username'), renthouse_type = '$type', house_type = '$unit', area = '$area', 
     address = '$address', house_name = '$title', detail = '$detail', decoration = '$style', 
     rent = $rent, region = '$region'";
    $url = '../web/landlord.php';

    $result = mysqli_query($conn,$sql);

    if($result){
        echo "<script>alert('Housing information submitted successfully！');location.href='$url';</script>";
    }else{
        echo "<script>alert('Failed to submit housing information!！');history.back();</script>";
    }
?>