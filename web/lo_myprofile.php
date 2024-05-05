<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY PROFILE</title>
    <link rel="stylesheet" href="../css/myprofile.css">
</head>
<body>
    <?php 
        include_once '../PHP/conn.php';
        $sql = "select * from landlord where ll_name = '".$_SESSION['loggedUsername']."'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)){
            $info = mysqli_fetch_array($result);
        }
        else{
            die("Valid user not found!");
        }
    ?>

    <header class="head" id="head">
        <div class="logo_box">
            <p>MRP</p>
        </div>

        <div class="nav_box">
            <span class="message_title">MY PROFILE</span>
            <a href="lo_myorder.php"><span class="oder_title">MY ORDER</span></a>
            <a href="landlord.php"><span class="houser">LANDLORD</span></a>
        </div>

        <?php   
            if(isset($_SESSION['loggedUsername']) && $_SESSION['loggedUsername'] <> ''){ 
        ?>
        <div class="photo">
            <a href="lo_myprofile.php"><img src="<?php echo $info['ll_photo'] ?>" alt="some_text" width="50" height="50" style="border-radius: 50%;margin-top: 25px;margin-left: 122px;"></a>     
        </div>
        <?php
            }
            else{
        ?>  
        <div class="photo">
            <a href="lo_myprofile.php"><img src="images/photo.png" alt="some_text" width="50" height="50" style="border-radius: 50%;margin-top: 25px;margin-left: 122px;"></a>     
        </div>
        <?php
            }
        ?>
    </header>
    
    <section class="mem_box">

        <?php   
            if(isset($_SESSION['loggedUsername']) && $_SESSION['loggedUsername'] <> ''){ 
        ?>
        <div>
            <a href="lo_myprofile.php"><img src= "<?php echo $info['ll_photo'] ?>" alt="Head" width="75" height="75" style="border-radius: 50%;margin-top: 15px;"></a>     
        </div>
        <span class="username"><?php echo $_SESSION['loggedUsername'];?></span>

        <?php
            }
            else{
        ?>   
        <div>
            <a href="lo_myprofile.php"><img src="../web/coverage/photo.png" alt="some_text" width="75" height="75" style="border-radius: 50%;margin-top: 15px;"></a>     
        </div>

        <span class="username">USER NAME</span>
        <?php
            }
        ?>

        <div class="mem_text">
            <a href="tenantlogin.html"><span class="switch_account">Switch</span></a>
            <a href="../PHP/logout.php"><span class="logout">Logout</span></a>
        </div> 
    </section>

    <!-- title -->
    <section class="mymessage">
        <p class="message_text">INFORMATION</p>
    </section>


    <section class="message_box">
    <form action="../PHP/lord_postInfo.php" method="post">

        <div class="photo_box">
            <p class="photo_title">PHOTO</p>
            <div class="upload_photo">
                <input type="button" name="upload_photo" id="uploadbox" value="Local photo" style="border: 0;background-color: #826D6D; color: white;font-size: 12px; width: 100px;height: 28px;">
                <span class="upload_text">Upload support JPG, PNG format</span>
            </div>
        </div>
        <?php   
            if(isset($_SESSION['loggedUsername']) && $_SESSION['loggedUsername'] <> ''){ 
        ?>
        <div>
            <img src="<?php echo $info['ll_photo'] ?>" alt="some_text" width="100" height="100" style="border-radius: 50%;margin-top: -90px; margin-left: 180px;">
        </div>
        <?php
            }
            else{
        ?>   
        <div>
            <img src="photo.png" alt="some_text" width="100" height="100" style="border-radius: 50%;margin-top: -90px; margin-left: 180px;">
        </div>
        <?php
            }
        ?>

        <div class="name_box">
            <p class="name_text">USERNAME</p>
                <input type="text" name="username" readonly value="<?php echo $info['ll_name']?>" style="height: 28px; margin-left: 90px;margin-top: 10px;">
        </div>
        <!-- GENDER -->
        <div class="sex_box">
            <p class="sex_text">GENDER</p>
                <input name="sex" type="radio" value="男" <?php if($info['ll_sex'] == 'MALE'){?> checked <?php }?> style="margin-top: 5px;margin-left: 90px;"/><label>MALE&nbsp;&nbsp;</label>
                <input name="sex" type="radio" value="女" <?php if($info['ll_sex'] == 'FEMALE'){?> checked <?php }?>/><label>FEMALE</label>
        </div>
        <!-- PHONE NUMBER -->
        <div class="phonenumber_box">
            <p class="phonenumber_text">PHONE NUMBER</p>
                <input type="text" name="phone" value="<?php echo $info['ll_phonenum']?>" style="height: 28px; margin-left: 74px;margin-top: 10px;">
        </div>
        <!-- EMAIL -->
        <div class="email_box">
            <p class="email_text">EMAIL</p>
            <input type="email" name="email" value="<?php echo $info['ll_email']?>" 
                        style="height: 28px; margin-left: 90px;margin-top: 10px;">
        </div>
        <!-- LOCATION -->
        <div class="address_box">
            <p class="address_text">LOCATION</p>
                <input type="text" name="address"  value="<?php echo $info['ll_address']?>" 
                        style="height: 28px; width:320px; margin-left: 60px;margin-top: 10px;">
        </div>

        <div class="preserve">
            <input type="submit" value="submit" 
                    style="border: 0;background-color: #826D6D; color: white;font-size: 12px; width: 100px;height: 28px;">
        </div>

    </form>    
    </section>    
    
</body>
</html>