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

    <?php include "sidenavbar.php" ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Admin Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <?php
                            $userid = $_GET['id'];

                            include ('dbcon.php');

                            $sql = "SELECT * FROM `tbladmin` WHERE `id` = '$userid'";
                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $photo = $row['profilephoto'];
                                $uname = $row['username'];
                                $name = $row['name'];

                                echo '<img src="' . $photo . '" alt="Profile" style="height: auto;border-radius:5px;" width:100% >';
                                echo '<h2 style="font-size:50px;">' . $uname . '</h2>';
                                echo '<h3 class="text-uppercase" style="font-size:28px;">' . $name . '</h3';
                            }
                            ?>

                            <h2></h2>

                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Overview</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                        Profile</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">Change Password</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                    <h5 class="card-title">Profile Details</h5>

                                    <?php

                                    $userid = $_GET['id'];
                                    include ('dbcon.php');
                                    $sql = "SELECT * FROM `tbladmin` WHERE `id` = '$userid'";
                                    $result = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $name = $row['name'];
                                        $username = $row['username'];
                                        $password = $row['password'];
                                        $email = $row['emailid'];
                                        $status = $row['status'];
                                        $joindate = $row['cdate'];

                                        echo '<div class="row">
                                                    <div class="col-lg-3 col-md-4 label ">Name</div>
                                                    <div class="col-lg-9 col-md-8">' . $name . '</div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-4 label ">User Name</div>
                                                    <div class="col-lg-9 col-md-8">' . $username . '</div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-4 label ">Email</div>
                                                    <div class="col-lg-9 col-md-8">' . $email . '</div>
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
                                                
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-4 label ">Join Date</div>
                                                    <div class="col-lg-9 col-md-8">' . $joindate . '</div>
                                                </div>';
                                    }
                                    ?>

                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <form class="needs-validation" method="post" action="" id="form1" name="form1"
                                        enctype="multipart/form-data">
                                        <?php
                                        $userid = $_GET['id'];
                                        include ('dbcon.php');

                                        $sql = "SELECT * FROM `tbladmin` WHERE `id` = '$userid'";
                                        $result = mysqli_query($con, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $name = $row['name'];
                                            $username = $row['username'];
                                            $password = $row['password'];
                                            $mobile = $row['mobileno'];
                                            $email = $row['emailid'];
                                            $status = $row['status'];
                                            $joindate = $row['cdate'];
                                            $photo = $row['profilephoto'];

                                            echo '  <div class="row mb-3">
                                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                                            Image</label>
                                                        <div class="col-md-8 col-lg-9">
                                                            <div class="pt-2">
                                                            <input type="file" name="file" id="file">
                                                            <button type="submit" class="btn btn-primary" name="uploadbtn" id="uploadbtn">Change Photo</button>
                                                            </div>
                                                        </div>
                                                    </div>';

                                            if (isset($_POST['uploadbtn'])) {

                                                $i = "../image/adminphotos/" . $_FILES['file']['name'];

                                                if (file_exists("../image/adminphotos/" . $_FILES['file']['name'])) {
                                                    echo $_FILES['file']['name'] . "File is Already Exists";

                                                } else {

                                                    move_uploaded_file($_FILES["file"]["tmp_name"], "../image/adminphotos/" . $_FILES["file"]["name"]);

                                                    include ('dbcon.php');
                                                    $sql = "UPDATE `tbladmin` SET `profilephoto` = '$i' WHERE id = $userid";

                                                    if (mysqli_query($con, $sql)) {
                                                        echo "Record saved successfully";
                                                        header("location:m-admin.php");
                                                    }

                                                }

                                            }

                                            ?>

                                            <?php

                                            $userid = $_GET["id"];

                                            echo '
                                                    
                                                    <div class="row mb-3">
                                                        <label for="nameplace" class="col-md-4 col-lg-3 col-form-label">Name</label>
                                                        <div class="col-md-8 col-lg-9">
                                                            <input name="nameplace" type="text" class="form-control" id="nameplace"
                                                                value="' . $name . '">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="usernameplace" class="col-md-4 col-lg-3 col-form-label">Username</label>
                                                        <div class="col-md-8 col-lg-9">
                                                            <input name="usernameplace" type="text" class="form-control" id="usernameplace"
                                                                value="' . $username . '">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="mobileplace" class="col-md-4 col-lg-3 col-form-label">Mobile</label>
                                                        <div class="col-md-8 col-lg-9">
                                                            <input name="mobileplace" type="number" class="form-control" id="mobileplace"
                                                                value="' . $mobile . '">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="emailplace" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                                        <div class="col-md-8 col-lg-9">
                                                            <input name="emailplace" type="email" class="form-control" id="emailplace"
                                                                value="' . $email . '">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary" id="rbtn" name="rbtn">Save Changes</button>
                                                    </div>';

                                        }

                                        if (isset($_POST['rbtn'])) {

                                            $nname = $_POST['nameplace'];
                                            $nusername = $_POST['usernameplace'];
                                            $nmobile = $_POST['mobileplace'];
                                            $nemail = $_POST['emailplace'];

                                            include ('dbcon.php');
                                            $sql = "UPDATE `tbladmin` SET `name` = '$nname' ,`username` = '$nusername',`mobileno` = '$nmobile',`emailid` = '$nemail' WHERE `id` = '$userid'";
                                            if (mysqli_query($con, $sql)) {
                                                header("location:m-admin.php");
                                            }

                                        }

                                        ?>

                                    </form><!-- End Profile Edit Form -->

                                </div>



                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form id="form2" name="form2" method="post" action="" class="needs-validation" >

                                        <?php
                                        $userid = $_GET['id'];

                                        include ("dbcon.php");

                                            $sql = "SELECT * FROM `tbladmin` WHERE `id` = '$userid'";
                                            $result = mysqli_query($con, $sql);
                                            $pass;
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $pass = $row['password'];
                                            }
                                            //echo $pass;



                                        if (isset($_POST["passsubmitbtn"])) {

                                            $currentpass = $_POST["password"];
                                            $npass = $_POST["newpassword"];
                                            $cpass = $_POST["renewpassword"];

                                            if ($pass == $currentpass) 
                                            {
                                                if ($npass == $cpass) 
                                                {
                                                    include ("dbcon.php");
                                                    $sql2 = "UPDATE `tbladmin` SET `password` = '$npass' WHERE `id` = '$userid'";

                                                    if (mysqli_query($con, $sql2)) 
                                                    {
                                                        header("location:m-admin.php");
                                                    }
                                                } 
                                                else 
                                                {
                                                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        New Passwords Are Not Same
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>';
                                                }

                                            } 
                                            else 
                                            {
                                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        Current Password Is Not Same
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>';
                                            }
                                        }

                                        ?>

                                        <div class="row mb-3">
                                            <label for="password"
                                                class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="password" type="password" class="form-control"
                                                    id="password">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="newpassword" class="col-md-4 col-lg-3 col-form-label">New
                                                Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="newpassword" type="password" class="form-control"
                                                    id="newpassword">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="renewpassword" class="col-md-4 col-lg-3 col-form-label">Re-enter
                                                New Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="renewpassword" type="password" class="form-control"
                                                    id="renewpassword">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" name="passsubmitbtn" id="passsubmitbtn"
                                                class="btn btn-primary">Change Password</button>
                                        </div>
                                    </form><!-- End Change Password Form -->

                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <?php include "footer.php" ?>

</body>

</html>