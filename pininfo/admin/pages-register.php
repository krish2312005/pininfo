<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Register - NiceAdmin Bootstrap Template</title>
  <?php include "headcode.php" ?>
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.php" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Admin Panel</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <!-- Multi Columns Form -->
              <form class="row g-3 needs-validation" id="form1" name="form1" enctype="multipart/form-data"
                method="POST">

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

                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="email" class="form-control" id="emailplace" name="emailplace" placeholder="Your Name">
                    <label for="emailplace">Email</label>
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

                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="mobileplace" name="mobileplace"
                      placeholder="Your Name">
                    <label for="mobileplace">Mobile</label>
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
                  $email = $_POST["emailplace"];
                  $password = $_POST["passwordplace"];
                  $cpassword = $_POST["cpasswordplace"];
                  $mobile = $_POST["mobileplace"];

                  $i = "../image/adminphotos/" . $_FILES['file']['name'];

                  if (file_exists("../image/adminphotos/" . $_FILES['file']['name'])) {
                    echo $_FILES['file']['name'] . "File is Already Exists";

                  } else {

                    if ($cpassword == $password) {

                      move_uploaded_file($_FILES["file"]["tmp_name"], "../image/adminphotos/" . $_FILES["file"]["name"]);

                      $timeZone = new DateTimeZone("Asia/Kolkata");
                      $date = new DateTime();
                      $date->setTimeZone($timeZone);
                      $d = $date->format('y-m-d h:i:s');

                      include('dbcon.php');
                      //$con =  mysqli_connect(@'localhost','root','','pininfo');
              
                      $sql = "insert into `tbladmin` (`id`,`name`,`username`,`password`,`mobileno`,`emailid`,`profilephoto`,`status`,`cdate`) values(NULL,'$name','$username','$cpassword','$mobile','$email','$i',1,'$d')";

                      if (mysqli_query($con, $sql)) {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                      Record Saved !
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';

                        header('location:pages-login.php');
                        }
                    } else {
                      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      Password Is Same Use Different Password
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    }

                  }

                }
                ?>

              </form><!-- End Multi Columns Form -->

                </div>
              </div>


            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>