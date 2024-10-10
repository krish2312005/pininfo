<?php 

    $id = $_GET['id'];
    include ('dbcon.php');

    $sql = "DELETE FROM `tbladmin` WHERE `id` = '$id'";
    if(mysqli_query($con, $sql)) {
        header("location:m-admin.php");
    }
?>