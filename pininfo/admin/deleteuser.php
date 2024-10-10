<?php 

    $id = $_GET['id'];
    include ('dbcon.php');

    $sql = "DELETE FROM `tbluser` WHERE `id` = '$id'";
    if(mysqli_query($con, $sql)) {
        header("location:m-user.php");
    }
?>