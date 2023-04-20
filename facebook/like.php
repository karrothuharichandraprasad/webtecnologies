<?php
session_start();
    $name=$_SESSION['name'];
    $url= $_POST['url'];
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'facebook';
    $conn = mysqli_connect($host, $username, $password, $dbname);
    $res = mysqli_query($conn,"select * from images where user='$name' and url='$url'");
    if(mysqli_num_rows($res)>0){
        $res=mysqli_query($conn,"select * from likes where url='$url'");
        $l = mysqli_fetch_assoc($res);
        $x=$l['likes'];
        $x=$x-1;
        $a=mysqli_query($conn,"UPDATE likes SET likes='$x' WHERE url='$url'");
        $b=mysqli_query($conn,"DELETE FROM images WHERE user='$name' and url='$url'");
    }
    else{
        $res = mysqli_query($conn,"select * from likes where url='$url'");
        $l = mysqli_fetch_assoc($res);
        $x=$l['likes'];
        $x=$x+1;
        $a=mysqli_query($conn,"UPDATE likes SET likes='$x' WHERE url='$url'");
        $b=mysqli_query($conn,"INSERT INTO images(user,url)VALUES('$name','$url')");
    }
    header("Location:home.php");

?>