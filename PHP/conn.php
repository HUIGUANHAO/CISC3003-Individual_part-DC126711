<?php
//connect to the database
    $conn = mysqli_connect("localhost", "root", "root", "rentsys");
    if(!$conn){
        die("Failed to connect to the database server");
    }
    //Setting character set
    mysqli_query($conn, "set name utf8");
