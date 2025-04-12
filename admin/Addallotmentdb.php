<?php
$lectureid=$_POST['tbllecture'];
$batchid=$_POST['tblclass'];
$subjectcode=$_POST['tblsubject'];
//echo "insert into allotment(id,lectureid,batchid,subjectcode)value(NULL,'$lectureid','$batchid','$subjectcode');";
//echo $lecture.$phone.$pass.$prev;
$sql="insert into tblallotment(id,lectureid,batchid,subjectcode)values(NULL,'$lectureid','$batchid','$subjectcode');";
//echo $sql;
include 'includes/dbconnection.php';
if(mysqli_query($conn,$sql))
{
    echo"<script>alert(\"allotment inserted successfull\")</script>";
    echo '<META http-equiv="refresh" content="0;Allocate.php">';
}
 else 
     {
     echo"<script>alert(\"allotment inserted unsuccessfull\")</script>";
   echo '<META http-equiv="refresh" content="0;Allocate.php">';
    
}
?>


