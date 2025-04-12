<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsaid']) == 0) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $sid = $_POST['sid'];
        $sclass = $_POST['sclass'];
        $ssem = $_POST['ssem'];
        $scie1 = $_POST['scie1'];
        $scie2 = $_POST['scie2'];
        $scie3 = $_POST['scie3'];
        $ssubcode = $_POST['ssubcode'];
        $sql = "insert into `tblmarks`(StuID,Class,sem,cie1,cie2,cie3,SubjectCode) values (:sid,:sclass,:ssem,:scie1,:scie2,:scie3,:ssubcode)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':sid', $sid, PDO::PARAM_STR);
        $query->bindParam(':sclass', $sclass, PDO::PARAM_STR);
        $query->bindParam(':ssem', $ssem, PDO::PARAM_STR);
        $query->bindParam(':scie1', $scie1, PDO::PARAM_STR);
        $query->bindParam(':scie2', $scie2, PDO::PARAM_STR);
        $query->bindParam(':scie3', $scie3, PDO::PARAM_STR);
        $query->bindParam(':ssubcode',$ssubcode, PDO::PARAM_STR);
        $query->execute();
        $LastInsertId = $dbh->lastInsertId();
        if ($LastInsertId ) {
            echo '<script>alert("Marks info added successfully.")</script>';
            echo "<script>window.location.href ='marks-enter.php'</script>";
        } else {
            echo '<script>alert("Something Went Wrong. Please try again")</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Activity Analysis || Add Students</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/select2/select2.min.css">
    <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include_once('includes/header.php'); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include_once('includes/sidebar.php'); ?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title"> Marks Enter </h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Marks Enter</li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title" style="text-align: center;">Marks Enter</h4>
                                <form class="forms-sample" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleInputName1">Student ID</label>
                                        <input type="text" name="sid" value="" class="form-control" required='true'>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail3">Student Class</label>
                                        <select name="sclass" class="form-control" required='true'>
                                            <option value="">Select Class</option>
                                            <?php
                                            $sql2 = "SELECT * from  tblclass ";
                                            $query2 = $dbh->prepare($sql2);
                                            $query2->execute();
                                            $result2 = $query2->fetchAll(PDO::FETCH_OBJ);
                                            foreach ($result2 as $row1) {
                                                ?>
                                                <option
                                                    value="<?php echo htmlentities($row1->ID); ?>"><?php echo htmlentities($row1->ClassName); ?><?php echo htmlentities($row1->Section); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Sem</label>
                                        <select name="ssem" class="form-control" required='true'>
                                            <option value="">Choose sem</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail3">Subject Code</label>
                                        <select name="ssubcode" class="form-control" required='true'>
                                            <option value="">Select Class</option>
                                            <?php
                                            $sql2 = "SELECT * FROM `tblsubjects`";
                                            $query2 = $dbh->prepare($sql2);
                                            $query2->execute();
                                            $result2 = $query2->fetchAll(PDO::FETCH_OBJ);
                                            foreach ($result2 as $row1) {
                                                ?>
                                                <option
                                                    value="<?php echo htmlentities($row1->ID); ?>"><?php echo htmlentities($row1->SubjectName); ?><?php echo htmlentities($row1->SubjectCode); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">CIE 1</label>
                                        <input type="text" name="scie1" value="" class="form-control" required='true'>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">CIE 2</label>
                                        <input type="text" name="scie2" value="" class="form-control" required='true'>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">CIE 3</label>
                                        <input type="text" name="scie3" value="" class="form-control" required='true'>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2" name="submit">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <?php include_once('includes/footer.php'); ?>
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
<script src="vendors/select2/select2.min.js"></script>
<script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="js/off-canvas.js"></script>
<script src="js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="js/typeahead.js"></script>
<script src="js/select2.js"></script>
<!-- End custom js for this page -->
</body>
</html>
