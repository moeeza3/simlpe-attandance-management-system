<?php 
include('./includes/db.php'); 
session_start();
 
  $query="SELECT * FROM studentdata WHERE student_id='$_SESSION[studentid]'";
  $rq = $conn->query($query);
  $num = $rq->num_rows;
  $rrw = $rq->fetch_assoc();

  
  if($num>0){
 
     $stdid=$rrw['student_id'];
     $stdname=$rrw['student_name'];
     $stdemail=$rrw['student_email'];
     $stdpass=$rrw['student_password'];
     $stdtel=$rrw['student_tel'];
     $stdaddress=$rrw['student_address'];
     $image=$rrw['student_image'];


  }
  if(isset($_POST['logout'])){
    session_destroy();
    $setstatus=mysqli_query($conn,"UPDATE studentdata SET student_status='0' WHERE student_id='$_SESSION[studentid]'");
    header('Location:../index.php');
    
 }

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
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>



<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
    <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
            aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small"
                        placeholder="Search for..." aria-label="Search"
                        aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </li>
     
    

    <div class="topbar-divider d-none d-sm-block"></div>
    <form class="form-inline mr-auto w-100 navbar-search" method="post" action="">
       <input type="submit" value="logout" name="logout" >
    </form>
  

</ul>

</nav>
<!-- End of Topbar -->

                

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

                    <!-- Content Row -->
                    <div class="row d-flex ">

                    <div class="imgcontainer d-flex flex-column align-items-center  col-5 px-0">
                     <img src='../upload/<?php echo $image ?>' alt='<?php echo $image ?>' class="img-fluid d-block stdimage">



   <form action="index.php" method="post" enctype='multipart/form-data' >
    
    <div class="input-group mb-3 bg-dark">
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile02" name='student_image'>
    <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
  </div>
  <div class="input-group-append">
    <input type="submit" value="Upload" name="upload" class="input-group-text">
    <!-- <span class="input-group-text" id="">Upload</span> -->
  </div>
</div>
</form>


<?php   
 

   
 if(isset($_POST['upload'])){

    
   $editimage=$_FILES['student_image']['name'];
   $student_temp_img=$_FILES['student_image']['tmp_name'];
 
   
   if(empty($editimage)){
     $editimage=$image;
 }

   $insert="UPDATE studentdata SET student_image='$editimage' where student_id='$_SESSION[studentid]'";


   $insert_run=mysqli_query($conn, $insert);
 
   if($insert_run===true){
       echo "Data has been sent";
      
       $file_destination = '../upload/' . $image;
       move_uploaded_file($student_temp_img, $file_destination);
      

   }else{
       echo "Data sent Failed, Try again";
   }



}

?>

                    </div>
                    <div class="studentinfo col-7">
                    <div class="p-5">
                    <div class="text-center">
                     <h1 class="h3 text-gray-900 mb-4">Welcome Student!</h1>
                     <h2 class="h2 text-gray-900 mb-4">
                        <?php echo $stdname ?>
                     </h2>
                    </div>
                      
                    <div class="row">
                  
                     <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row  d-flex flex-column justify-content-center align-items-center">
                                    <div class="icondiv">
                                    <i class="fas fa-id-badge fa-2x text-gray-800"></i>
                                        </div>
                                        <div class="infodiv text-center">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase my-1">
                                                ID NO.</div>
                                            <div class="mb-0 text-gray-800">
                                        <?php echo $stdid ?>
                                    </div>
                                        </div>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>

                             
                     <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row  d-flex flex-column justify-content-center align-items-center">
                                    <div class="icondiv">
                                    <i class="fas fa-envelope fa-2x text-gray-800"></i>
                                        </div>
                                        <div class="infodiv text-center">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase my-1">
                                                Email</div>
                                            <div class="mb-0 text-gray-800">
                                            <?php echo $stdemail ?>
                                        </div>
                                        </div>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>

                             
                     <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row  d-flex flex-column justify-content-center align-items-center">
                                    <div class="icondiv">
                                    <i class="fas fa-unlock fa-2x text-gray-800"></i>
                                        </div>
                                        <div class="infodiv text-center">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase my-1">
                                                password</div>
                                            <div class="mb-0 text-gray-800">
                                        <?php echo $stdpass ?>
                                    </div>
                                        </div>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>


                             
                     <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row  d-flex flex-column justify-content-center align-items-center">
                                    <div class="icondiv">
                                    <i class="fas fa-phone fa-2x text-gray-800"></i>
                                        </div>
                                        <div class="infodiv text-center">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase my-1">
                                                telephone</div>
                                            <div class="mb-0 text-gray-800">
                                        <?php echo $stdtel ?>
                                        </div>
                                        </div>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>

                             
                     <div class="col-xl-12 col-md-12 mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row  d-flex flex-column justify-content-center align-items-center">
                                    <div class="icondiv">
                                    <i class="fas fa-address-book fa-2x text-gray-800"></i>
                                        </div>
                                        <div class="infodiv text-center">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase my-1">
                                                address</div>
                                            <div class="mb-0 text-gray-800">
                                            <?php echo $stdaddress ?>
                                            </div>
                                        </div>
                                      
                                    </div>
                                </div>
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
   

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/fontawesome-free/js/all.min.js"></script>

</body>

</html>