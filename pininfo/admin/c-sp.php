<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Components / Accordion - NiceAdmin Bootstrap Template</title>
  <?php include "headcode.php"?>
</head>

<body>
<?php
  $pagewhat = 6;
  ?>

  <?php include "topnavbar.php"?>

  <?php include "sidenavbar.php"?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Service Provider Create</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Blank</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Form</h5>
              <!-- Multi Columns Form -->
              <form class="row g-3 needs-validation" id="form1" method="POST" name="form1" enctype="multipart/form-data">

                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="nameplace" name="nameplace" placeholder="Your Name">
                    <label for="nameplace">Name</label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="usernameplace" name="usernameplace"
                      placeholder="Your Name">
                    <label for="usernameplace">Username</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating mb-3">
                    <select class="form-select" id="genderplace" name="genderplace" aria-label="Gender Place">
                      <option value="1">Male</option>
                      <option value="2">Female</option>
                    </select>
                    <label for="genderplace">Gender</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="email" class="form-control" id="emailplace" name="emailplace" placeholder="Your Name">
                    <label for="emailplace">Email</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="date" class="form-control" id="birthdateplace" name="birthdateplace"
                      placeholder="Your Name">
                    <label for="birthdateplace">Birthdate</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="password" class="form-control" id="passwordplace" name="passwordplace"
                      placeholder="Your Name">
                    <label for="passwordplace">Password</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="password" class="form-control" id="cpasswordplace" name="cpasswordplace"
                      placeholder="Your Name">
                    <label for="cpasswordplace">Confirm Password</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="addressplace" name="addressplace"
                      placeholder="Your Name">
                    <label for="addressplace">Address</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="mobileplace" name="mobileplace"
                      placeholder="Your Name">
                    <label for="mobileplace">Mobile</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="cityplace" name="cityplace" placeholder="City">
                    <label for="cityplace">City</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="stateplace" name="stateplace" placeholder="State">
                    <label for="stateplace">State</label>
                  </div>
                </div>

                <!--
                <div class="col-md-3">
                  <div class="form-floating mb-3">
                    <select class="form-select" id="stateplace" name="stateplace" aria-label="State">
                      <option selected>Gujarat</option>
                      <option value="1">Maharastra</option>
                    </select>
                    <label for="stateplace">State</label>
                  </div>
                </div>
                -->

                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="postcodeplace" name="postcodeplace"
                      placeholder="Your Name">
                    <label for="postcodeplace">Post Code</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="file" class="form-label">Profile Photo</label>
                  <input type="file" class="form-control" id="file" name="file">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" id="registerbtn" name="registerbtn">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>

                <?php
                if (isset($_POST["registerbtn"])) {

                  $name = $_POST["nameplace"];
                  $username = $_POST["usernameplace"];
                  $gender = $_POST["genderplace"];
                  $email = $_POST["emailplace"];
                  $birthdate = $_POST["birthdateplace"];
                  $password = $_POST["passwordplace"];
                  $cpassword = $_POST["cpasswordplace"];
                  $address = $_POST["addressplace"];
                  $mobile = $_POST["mobileplace"];
                  $city = $_POST["cityplace"];
                  $state = $_POST["stateplace"];
                  $postcode = $_POST["postcodeplace"];

                  $i = "../image/spphotos/" . $_FILES['file']['name'];

                  if (file_exists("../image/spphotos/" . $_FILES['file']['name'])) {
                    echo $_FILES['file']['name'] . "File is Already Exists";

                  } else {

                    if ($cpassword == $password) {

                      move_uploaded_file($_FILES["file"]["tmp_name"], "../image/spphotos/" . $_FILES["file"]["name"]);

                      $timeZone = new DateTimeZone("Asia/Kolkata");
                      $date = new DateTime();
                      $date->setTimeZone($timeZone);
                      $d = $date->format('y-m-d h:i:s');

                      include('dbcon.php');

                      $sql = "insert into `tblsp` (`id`,`name`,`username`,`password`,`email`,`birthdate`,`gender`,`city`,`state`,`address`,`pincode`,`mobileno`,`profilephoto`,`status`,`cdate`) values(NULL,'$name','$username','$password','$email','$birthdate','$gender','$city','$state','$address','$postcode','$mobile','$i',1,'$d')";

                      if (mysqli_query($con, $sql)) {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                  Record Saved !
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                      }

                    } else {
                      echo "Password is not same";
                    }

                  }

                }
                ?>

              </form><!-- End Multi Columns Form -->
            </div>
          </div>

        </div>

        
      </div>
    </section>

  </main><!-- End #main -->

 <?php include "footer.php"?>

</body>

</html>