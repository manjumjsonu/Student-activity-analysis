<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsaid']==0)) {
  header('location:logout.php');
  } else{
   // Code for deletion
      if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);

$query=$dbh->prepare($sql);
$query->bindParam(':rid',$rid,PDO::PARAM_STR);
$query->execute();
 echo "<script>alert('Data deleted');</script>"; 
       


}
?>
  }
  <!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Student  Management System|||Manage Class</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="./vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="./vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- End layout styles -->
   
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
     <?php include_once('includes/header.php');?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include_once('includes/sidebar.php');?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
             <div class="page-header">
              <h3 class="page-title"> Manage Class </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Manage Class</li>
                </ol>
              </nav>
            </div>
<!-- Section: about -->
    <section id="about" class="home-section color-dark bg-white">
        <div class="container marginbot-50">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
                        <div class="section-heading text-center">
                            <h2 class="h-bold"> allotment</h2>
                            <div class="divider-header"></div>
                            <form method="POST" action="Addallotmentdb"> 
                                <?php
                                    include "includes/dbconnection.php";
                                    echo "<select name='tbllecture'>";
                                    $sql="SELECT * FROM `tbllecture`";
                                    $result=$conn->query($sql);
                                    if($result->num_rows>0)
                                    {
                                    while($row=$result->fetch_assoc())
                                    {
                                        $tid=$row['ID'];
                                        $tname=$row['LectureName'];
                                        echo "<option value='$tid'>$tname($tid)</option>";                                                
                                    }
                                    }
                                    echo"</select>";
                                ?><br>
                                <?php
                                    include "includes/dbconnection.php";
                                    echo "<select name=\"tblclass\">";
                                    $sql1="select * from tblclass";
                                    $result1=$conn->query($sql1);
                                    if($result1->num_rows>0)
                                    {
                                    while($row1=$result1->fetch_assoc())
                                    {
                                        $bid=$row1['ID'];
                                        $bname=$row1['ClassName'];
                                        echo "<option value=$bid>$bname($bid)</option>";                                                
                                    }
                                    }
                                    echo"</select>";
                                ?><br>
                                <?php
                                    include "includes/dbconnection.php";
                                    echo "<select name=\"tblsubject\">";
                                    $sql2="SELECT * FROM `tblsubjects`";
                                    $result2=$conn->query($sql2);
                                     if($result2->num_rows>0)
                                    {
                                    while($row2=$result2->fetch_assoc())
                                    {
                                        $sid=$row2['id'];
                                        $sname=$row2['SubjectName'];
                                        echo "<option value=$sid>$sname($sid)</option>";                                                
                                    }
                                    }
                                    echo"</select>";
                                ?>
                                <br>
                                <input type="submit" value="allotment" placeholder="submit" required/><br>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <div class="container"></div>
        </div>
    </section>
 <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         <?php include_once('includes/footer.php');?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="./vendors/chart.js/Chart.min.js"></script>
    <script src="./vendors/moment/moment.min.js"></script>
    <script src="./vendors/daterangepicker/daterangepicker.js"></script>
    <script src="./vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="./js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html><?php }  ?>