<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Components / Accordion - NiceAdmin Bootstrap Template</title>
    <?php include "headcode.php" ?>
</head>

<body>

    <?php include "topnavbar.php" ?>

    <div class="container" style="margin-top:100px">


        <div class="pagetitle">
            <h1>User Dashboard
            </h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Form</h5>

                            <form action="" method="post" id="form1" name="form1" enctype="multipart/form-data">

                                <div class="mb-3">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="pincodeplace"
                                                name="pincodeplace" placeholder="Pincode">
                                            <label for="floatingName">Pincode</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="messageplace"
                                                name="messageplace" placeholder="Messaage">
                                            <label for="floatingName">Message</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="col-md-12">
                                        <input type="file" class="form-control" id="file" name="file"
                                            placeholder="Messaage">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" name="btnsubmit" id="btnsubmit"
                                        class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>

                                <?php
                                if (isset($_POST['btnsubmit'])) {
                                    $userid = $_SESSION['user'];

                                    $pincode = $_POST['pincodeplace'];
                                    $msg = $_POST['messageplace'];
                                    $i = "../image/problemphotos/" . $_FILES['file']['name'];

                                    if (file_exists("../image/problemphotos/" . $_FILES['file']['name'])) {
                                        echo $_FILES['file']['name'] . "File is Already Exists";

                                    } else {
                                        move_uploaded_file($_FILES["file"]["tmp_name"], "../image/problemphotos/" . $_FILES["file"]["name"]);

                                        $timeZone = new DateTimeZone("Asia/Kolkata");
                                        $date = new DateTime();
                                        $date->setTimeZone($timeZone);
                                        $d = $date->format('y-m-d h:i:s');

                                        include ('dbcon.php');
                                        $sql = "insert into `tblrequest` (`id`,`userid`,`pincode`,`message`,`photo`,`status`,`cdate`) values(NULL,'$userid','$pincode','$msg','$i',1,'$d')";

                                        if(mysqli_query($con,$sql)){
                                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    Request Sent Successfully!
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>';
                                        }
                                    }
                                }
                                ?>

                            </form>

                        </div>
                    </div>

                </div>


            </div>
        </section>

    </div>

    <?php include "footer.php" ?>

</body>

</html>