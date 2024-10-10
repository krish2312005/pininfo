<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Components / Accordion - NiceAdmin Bootstrap Template</title>
    <?php include "headcode.php" ?>
</head>

<body>
    <?php
    $pagewhat = 8;
    ?>

    <?php include "topnavbar.php" ?>

    <?php include "sidenavbar.php" ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Request Manage</h1>
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
                            <h5 class="card-title">Table</h5>
                            <?php
                            echo '<table class="table datatable ">
                                    <thead>
                                    <tr>
                                        <th class="text-center">ProfilePhoto</th>
                                        <th class="text-center">User</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Message</th>
                                        <th class="text-center">Pincode</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Join Date</th>

                                        <th class="text-center">SP Username</th>
                                        <th class="text-center">SP Mobile</th>
                                    </tr>
                                    </thead>
                                    
                                    <tbody>';

                            include ("dbcon.php");

                            //$con = mysqli_connect("localhost","root","","pininfo");
                            
                            $sql = "SELECT * FROM `tblrequest`";
                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($result)) {

                                echo "<tr>";

                                $id = $row['id'];
                                $userid = $row['userid'];


                                $sql2 = "SELECT * FROM `tbluser` WHERE `id` = '$userid'";
                                $result2 = mysqli_query($con, $sql2);
                                while ($line = mysqli_fetch_array($result2)) {
                                    $username = $line['username'];
                                    $email = $line['email'];
                                    $mobile = $line['mobileno'];
                                    $pphoto = $line['profilephoto'];
                                }

                                echo "<td class=\"text-center align-middle\">";
                                echo " <img src=\"$pphoto\" style=\"width:70px;height:70px;border-radius:70px\" alt=\"\">";
                                echo "</td>";

                                echo "<td class=\"text-center align-middle\">";
                                echo $username;
                                echo "</td>";

                                echo "<td class=\"text-center align-middle\">";
                                echo $email;
                                echo "</td>";

                                echo "<td class=\"text-center align-middle\">";
                                echo $row['message'];
                                echo "</td>";

                                echo "<td class=\"text-center align-middle\">";
                                echo $row['pincode'];
                                echo "</td>";

                                echo "<td class=\"text-center align-middle\">";
                                $status = $row['status'];
                                if ($status == 0) {
                                    echo "Solved";
                                }else{
                                    echo "Pending";
                                }
                                echo "</td>";


                                echo "<td class=\"text-center align-middle\">";
                                echo $row['cdate'];
                                echo "</td>";

                                $pin = $row['pincode'];
                                $sql3 = "SELECT * FROM `tblsp` WHERE `pincode` = '$pin'";
                                $result3 = mysqli_query($con,$sql3);
                                while ($line2 = mysqli_fetch_array($result3)) {
                                    $uname = $line2['username'];
                                    $mobile = $line2['mobileno'];

                                    echo "<td class=\"text-center align-middle\">";
                                    echo $uname;
                                    echo "</td>";

                                    echo "<td class=\"text-center align-middle\">";
                                    echo $mobile;
                                    echo "</td>";
                                }


                                echo "</tr>";
                            }

                            echo '
                  
                                </tbody>
                            </table>';
                            ?>
                        </div>
                    </div>

                </div>


            </div>
        </section>

    </main><!-- End #main -->

    <?php include "footer.php" ?>

</body>

</html>