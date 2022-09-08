<?php 
include '../includes/db.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Attandance</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container d-flex justify-content-center">

        <div class="card col-6 o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">


                <?php   

   if(isset($_GET['editattandance'])){
   
   $editid=$_GET['editattandance'];

 $select="SELECT * FROM stdattandance WHERE attdno='$editid'";

 $run=mysqli_query($conn, $select);


 $row_user=mysqli_fetch_assoc($run);

  $studentid=$row_user['student_id'];
 $student_name=$row_user['student_name'];
 $student_status=$row_user['student_present'];
 $student_date=$row_user['student_date'];
  $studattdno=$row_user['attdno'];
   

   }

?>  



   
 
                    <div class="editatt  container-fluid">
                        <div class="py-5 px-2">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Edit Attandance</h1>
                            </div>
                            <h2>ID: <?php echo $studentid ?></h2> 
                           <h2>Name: <?php echo $student_name ?></h2>  
                           <h4>Date: <?php echo $student_date ?></h4>
                    <!-- ..............form.............. -->
                            <form class="user" action="" method="post">
                            
                         
                           
                           <div class="form-check">
  <input class="form-check-input" type="checkbox" name="present" value="present" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
    Present
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" name="absent" value="absent" id="defaultCheck2">
  <label class="form-check-label" for="defaultCheck2">
    Absent
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" name="leave" value="leave" id="defaultCheck3">
  <label class="form-check-label" for="defaultCheck3">
    Leave
  </label>
</div>
<br>

<br>
                                <input type="submit" class="btn btn-primary btn-user btn-block"  name="updateattan" value="Update Attendance">
                                    
                                
                              
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php

if(isset($_POST['updateattan'])){

 

if(isset($_POST['present'])){


$updatepresent=$_POST['present'];
// $updateabsent=$_POST['absent'];
// $updateleave=$_POST['leave'];

 $updateselect="UPDATE stdattandance SET student_present='$updatepresent' WHERE attdno='$studattdno'";
 
$runupdate=mysqli_query($conn, $updateselect);

if($runupdate==true){
  echo "Successfulyy updated ".$updatepresent;




}else{
echo "error submitting";
}

}

if(isset($_POST['absent'])){



$updateabsent=$_POST['absent'];
// $updateleave=$_POST['leave'];

 $updateselect="UPDATE stdattandance SET  student_present='$updateabsent' WHERE attdno='$studattdno'";
 
$runupdate1=mysqli_query($conn, $updateselect);

if($runupdate1==true){

echo "Successfulyy updated ".$updateabsent;


}else{
echo "error submitting";
}

}

if(isset($_POST['leave']) ){



$updateleave=$_POST['leave'];

$updateselect="UPDATE stdattandance SET  student_present='$updateleave' WHERE  attdno='$studattdno'";
 
$runupdate=mysqli_query($conn, $updateselect);

if($runupdate==true){

echo "Successfulyy updated ".$updateleave;


}else{
echo "error submitting";
}

}

}


?>




    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>