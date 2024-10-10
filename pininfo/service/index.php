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

    <div class="container-fluid" style="margin-top:100px">


        <div class="pagetitle">
            <h1>Service Provider Dashboard
            </h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Requests</h5>

                            <?php

                            $spid = $_SESSION['sp'];

                            echo '<table class="table datatable ">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Details</th>
                                        <th class="text-center">ProfilePhoto</th>
                                        <th class="text-center">User</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Message</th>
                                        <th class="text-center">Pincode</th>
                                        <th class="text-center">Join Date</th>
                                    </tr>
                                    </thead>
                                    
                                    <tbody>';

                            include ("dbcon.php");

                            $sql2 = "SELECT * FROM `tblsp` WHERE `id` = '$spid'";
                            $result2 = mysqli_query($con,$sql2);
                            while ($line = mysqli_fetch_array($result2)) {
                                $pin = $line['pincode'];
                            }

                            //$con = mysqli_connect("localhost","root","","pininfo");
                            
                            $sql = "SELECT * FROM `tblrequest` WHERE `status` = '1' AND `pincode` = '$pin'";
                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($result)) {

                                echo "<tr>";

                                $id = $row['id'];
                                $userid = $row['userid'];

                                echo "<td class=\"text-center align-middle\">";
                                echo "<a href=\"viewpagerequest.php?id=$id\" class = \"btn btn-success\">View</a>";
                                echo "</td>";

                                $sql2 = "SELECT * FROM `tbluser` WHERE `id` = '$userid'";
                                $result2 = mysqli_query($con,$sql2);
                                while($line = mysqli_fetch_array($result2)){
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
                                echo $row['cdate'];
                                echo "</td>";

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

    </div>

    <?php include "footer.php" ?>

</body>

</html>