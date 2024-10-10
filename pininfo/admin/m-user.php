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
  $pagewhat = 5;
  ?>

  <?php include "topnavbar.php" ?>

  <?php include "sidenavbar.php" ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>User Manage</h1>
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
                    <th class="text-center">Details</th>
                    <th class="text-center">Delete</th>
                    <th class="text-center">ID</th>
                    <th class="text-center">ProfilePhoto</th>
                    <th class="text-center">Username</th>
                    <th class="text-center">email</th>
                    <th class="text-center">mobile</th>
                    <th class="text-center">status</th>
                    <th class="text-center">Join Date</th>
                  </tr>
                </thead>
                
                <tbody>';

              include ("dbcon.php");

              //$con = mysqli_connect("localhost","root","","pininfo");
              
              $sql = "SELECT * FROM `tbluser`";
              $result = mysqli_query($con, $sql);
              while ($row = mysqli_fetch_array($result)) {

                echo "<tr>";

                $id = $row['id'];

                echo "<td class=\"text-center align-middle\">";
                echo "<a href=\"viewpageuser.php?id=$id\" class = \"btn btn-success\">View</a>";
                echo "</td>";

                echo "<td class=\"text-center align-middle\">";
                echo "<a href=\"deleteuser.php?id=$id\" class = \"btn btn-danger\" >Delete</a>";
                echo "</td>";

                echo "<td class=\"text-center align-middle\">";
                echo $row['id'];
                echo "</td>";

                echo "<td class=\"text-center align-middle\">";
                $photo = $row['profilephoto'];
                echo " <img src=\"$photo\" style=\"width:70px;height:70px;border-radius:70px\" alt=\"\">";
                echo "</td>";

                echo "<td class=\"text-center align-middle\">";
                echo $row['username'];
                echo "</td>";

                echo "<td class=\"text-center align-middle\">";
                echo $row['email'];
                echo "</td>";

                echo "<td class=\"text-center align-middle\">";
                echo $row['mobileno'];
                echo "</td>";

                echo "<td class=\"text-center align-middle\">";
                echo $row['status'];
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

  </main><!-- End #main -->

  <?php include "footer.php" ?>

</body>

</html>