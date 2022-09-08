<?php 
include('./includes/db.php'); 
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

    <title>SB Admin 2 - Blank</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
         <?php include('./includes/navbar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->


                <?php include('./includes/topbar.php');  
                 ?>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Leave Attandance</h1>

                    <!-- Content Row -->
                    <div class="row ">

        

                 <div class="card shadow mb-4 ml-2 px-4 pt-4" style="width:100%">
                    <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Leave Table</h6>
                    </div>

                    <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered"  width="100%" cellspacing="0" >

                                <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>

                                    <tbody>
           
                                    
       <?php  

        if(isset($_GET['delstd'])){
         $_GET['delstd'];
             $delrequest=$_GET['delstd'];
          
            
              $delselect="DELETE FROM approval Where attdno='$delrequest'";
        
               $rundelete=mysqli_query($conn, $delselect);
      
              //  $deldata="DELETE FROM stdattandance WHERE student_id='$studentid' and student_date='$datetaken'";
      
              //  $delQ=mysqli_query($conn,$deldata);
        
        
            }
       
       ?>

                            <?php 
      
      $getdata="SELECT * FROM approval";

      $getdatarun=mysqli_query($conn, $getdata);

      $rowquery=mysqli_num_rows($getdatarun);

      if($rowquery>0){

       while($rows=mysqli_fetch_array($getdatarun)){
      
          $studentid=$rows['student_id'];
          $studentname=$rows['student_name'];
          $studentstatus=$rows['student_present'];
          $studentdate=$rows['student_date'];
          $studentattno=$rows['attdno'];
      
      ?>
    
      <tr>
        <td><?php echo $studentid ?></td>
        <td><?php echo $studentname ?></td>
        <td><?php echo $studentstatus ?></td>
        <td><?php echo $studentdate ?></td>
        <td>
            <form action="" method="post">
                <input type="submit"  value="Send" name="send" class="btn btn-block btn-primary">
            </form>
        </td>
        <td>
            <a href="stdapproval.php?delstd=<?php echo $studentattno ?>" class="btn btn-google btn-block">Delete</a>
        </td>

      </tr>

       <?php  }} ?>                     
                     



       <?php 
       
       if(isset($_POST['send'])){
        echo $send=$_POST['send'];
         echo $studentid;
         echo $studentname;
         
          $studentstatus;
         $studentdate;
         echo $studentattno;
         $datetaken=date('Y-m-d');

        //  $curdate=date('Y-m-d');
        $qurty=mysqli_query($conn,"SELECT * from stdattandance where student_id='$studentid' and student_date='$datetaken'");
    $count=mysqli_num_rows($qurty);

       if($count>0){
        $senddata="UPDATE stdattandance(student_id,student_name,student_present,student_date) VALUES ('$studentid','$studentname','$studentstatus','$studentdate')";

        $sendQ=mysqli_query($conn,$senddata);

         echo "data updated";

       }else{

        $senddata1="INSERT INTO stdattandance(student_id,student_name,student_present,student_date) VALUES ('$studentid','$studentname','$studentstatus','$studentdate')";

        $sendQ=mysqli_query($conn,$senddata1);

        echo "data inserted";


       }  
            
      //  $deldata="DELETE FROM approval WHERE attdno='$studentattno'";
         
      //  $delQ=mysqli_query($conn,$deldata);
    

       }        
       
       
       ?>

                                    </tbody>



                                </table>
                            </div>
                    </div>

                 </div>

                    </div>


                        </div>



                            
                   
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js">

    </script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/fontawesome-free/js/all.min.js"></script>

</body>

</html>