<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Users / Profile - NiceAdmin Bootstrap Template</title>
    <?php include "headcode.php" ?>

    <style>

    </style>
</head>

<body>

    <?php include "topnavbar.php" ?>

    <div class="container" style="margin-top: 100px;">
        <div class="row">

            <div class="pagetitle">
                <h1>User Profile</h1>

            </div><!-- End Page Title -->

            <section class="section profile">
                <div class="row">

                    <div class="col-xl-7">

                        <div class="card">
                            <div class="card-body pt-3">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                    <h5 class="card-title">Profile Details</h5>

                                    <?php

                                    $rid = $_GET['id'];
                                    include ('dbcon.php');

                                    $sql2 = "SELECT * FROM `tblrequest` WHERE `id` = '$rid'";
                                    $result2 = mysqli_query($con, $sql2);
                                    while ($line = mysqli_fetch_array($result2)) {
                                        $userid = $line['userid'];
                                    }

                                    $sql = "SELECT * FROM `tbluser` WHERE `id` = '$userid'";
                                    $result = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {

                                        $username = $row['username'];
                                        $email = $row['email'];
                                        $gender = $row['gender'];
                                        $city = $row['city'];
                                        $state = $row['state'];
                                        $address = $row['address'];
                                        $pincode = $row['pincode'];
                                        $mobile = $row['mobileno'];
                                        $status = $row['status'];
                                        $joindate = $row['cdate'];
                                        $birth = $row['birthdate'];

                                        echo '
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-4 label ">User Name</div>
                                                    <div class="col-lg-9 col-md-8">' . $username . '</div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-3 col-md-4 label ">Birthdate</div>
                                                    <div class="col-lg-9 col-md-8">' . $birth . '</div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-4 label ">Email</div>
                                                    <div class="col-lg-9 col-md-8">' . $email . '</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-4 label ">Mobile</div>
                                                    <div class="col-lg-9 col-md-8">' . $mobile . '</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-4 label ">Gender</div>
                                                    <div class="col-lg-9 col-md-8">';
                                        if ($gender == 1) {
                                            echo "Male";
                                        } else {
                                            echo "Female";
                                        }
                                        echo '</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-4 label ">City</div>
                                                    <div class="col-lg-9 col-md-8">' . $city . '</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-4 label ">State</div>
                                                    <div class="col-lg-9 col-md-8">' . $state . '</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-4 label ">Address</div>
                                                    <div class="col-lg-9 col-md-8">' . $address . '</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-4 label ">Pincode</div>
                                                    <div class="col-lg-9 col-md-8">' . $pincode . '</div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-4 label ">Status</div>
                                                    <div class="col-lg-9 col-md-8">';
                                        if ($status == 1) {
                                            echo "Legal";
                                        } else {
                                            echo "Blocked";
                                        }
                                        echo '</div>
                                                </div>
                                                ';
                                    }
                                    ?>

                                    <h5 class="card-title">Problem Details</h5>

                                    <?php
                                    $rid = $_GET['id'];
                                    include ('dbcon.php');

                                    $sql2 = "SELECT * FROM `tblrequest` WHERE `id` = '$rid'";
                                    $result2 = mysqli_query($con, $sql2);
                                    while ($line = mysqli_fetch_array($result2)) {
                                        $userid = $line['userid'];
                                        $msg = $line['message'];

                                        echo '<div class="row">
                                                <div class="col-lg-3 col-md-4 label ">Complaint</div>
                                                <div class="col-lg-9 col-md-8">' . $msg . '</div>
                                            </div>';
                                    }

                                    ?>

                                    <form action="" method="post" id="form1" name="form1">

                                        <button type="submit" class="btn btn-success" id="solvedbtn" name="solvedbtn">
                                            Issue Solved
                                        </button>

                                    </form>

                                    <?php 
                                        $rid = $_GET['id'];

                                        if (isset($_POST['solvedbtn'])) {
                                            include("dbcon.php");
                                            $sql = "UPDATE `tblrequest` SET `status`= '0' WHERE `id` = '$rid'";
                                            if (mysqli_query($con,$sql)) {
                                                header("location:index.php");
                                            }
                                        }
                                    ?>



                                </div>


                            </div>
                        </div>

                    </div>

                    <div class="col-xl-5">

                        <div class="card">
                            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                                <?php
                                $rid = $_GET['id'];

                                include ('dbcon.php');

                                $sql = "SELECT * FROM `tblrequest` WHERE `id` = '$rid'";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $photo = $row['photo'];

                                    echo '<img src="' . $photo . '" alt="Profile" style="height: auto;border-radius:5px;" width:100% >';
                                    echo '<h2 style="font-size:50px;">Problem Photo</h2>';
                                }
                                ?>

                                <h2></h2>

                            </div>
                        </div>

                    </div>
                </div>

            </section>

        </div>
    </div>

    <?php include "footer.php" ?>

</body>

</html>