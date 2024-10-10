<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Login - NiceAdmin Bootstrap Template</title>
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
                  <span class="d-none d-lg-block">Admin Login</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your Email & Password to Login</p>
                  </div>

                  <form class="row g-3 needs-validation" method="post" name="form" id="form" action="" novalidate>

                    <div class="col-12">
                      <label for="emailplace" class="form-label">Email</label>
                      <input type="email" name="emailplace" class="form-control" id="emailplace" required>
                      <div class="invalid-feedback">Please enter your Email!</div>
                    </div>

                    <div class="col-12">
                      <label for="passwordplace" class="form-label">Password</label>
                      <input type="password" name="passwordplace" class="form-control" id="passwordplace" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" id="registerbtn"
                        name="registerbtn">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="pages-register.php">Create an account</a></p>
                    </div>

                    <?php
                    if (isset($_POST["registerbtn"])) {

                      $email = $_POST['emailplace'];
                      $password = $_POST['passwordplace'];

                      //include ('dbcon.php');

                      $con= mysqli_connect(@'localhost','root','','pininfo');
                      $sql = "SELECT * FROM tbladmin";
                      $result = mysqli_query($con, $sql);
                      while ($line = mysqli_fetch_array($result)) {

                        $adminid = $line['id'];
                        $demail = $line['emailid'];
                        $dpassword = $line['password'];

                        if ($email == $demail && $password == $dpassword) {

                          session_start();
                          $_SESSION['admin'] = $adminid;

                          echo'HI how are you';

                          header("Location: index.php");

                        }
                      }
                    }
                    ?>

                  </form>



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