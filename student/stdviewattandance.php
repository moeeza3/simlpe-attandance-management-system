<?php 
include('./includes/db.php'); 
session_start();


$conn=mysqli_connect('localhost','root','','schoolmanagement');
  $query="SELECT * FROM studentdata WHERE student_id='$_SESSION[studentid]'";
  $rq = $conn->query($query);
  $num = $rq->num_rows;
  $rrw = $rq->fetch_assoc();


  if(isset($_POST['logout'])){
        
    $setstatus=mysqli_query($conn,"UPDATE studentdata SET student_status='0' WHERE student_id='$_SESSION[studentid]'");
   session_destroy();
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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">View Attandance</h1>

                    <!-- Content Row -->
                    <div class="row ">

            

                 <div class="card ml-2 px-4 pt-4" style="width:100%">
                 <form action="" class="row">
                    
                    <div class="form-group col-4">
                    <input type="date" class="form-control form-control-user " name="from_date" id="exampleInputdate1" 
                    placeholder="Enter Name">
                    </div> 

                    <div class="form-group col-4">
                    <input type="date"  name="to_date" class="form-control form-control-user " id="exampleInputdate 2" 
                    placeholder="Enter Name">
                    </div> 


                    <div class="form-group col-4">
                    <input type="submit" value="View Attendance" name="tkattandance" class="btn btn-primary py-2 px-5" >
                    </div> 

                    <div class="form-group ml-2">
                    <input type="submit" value="Download" name="download" class="btn btn-primary py-2 px-5" >
                    </div> 


                    </form>
                
                 </div>

              
                   
                 <div class="card shadow mb-4 ml-2 px-4 pt-4" style="width:100%">
                    <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Record Table</h6>
                    </div>

                    <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >

                                <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Date</th>    
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php 
                                    
                                    if(isset($_GET['from_date']) || isset($_GET['to_date'])){
                                        // echo $fros=$_GET['viewatt'];
                                         $fromdate=$_GET['from_date'];
                                         $todate=$_GET['to_date'];
                                        
                                     
                                      
                                     $data=mysqli_query($conn,"SELECT * FROM stdattandance WHERE student_id='$_SESSION[studentid]' AND (student_date BETWEEN '$fromdate' AND '$todate')");
                                
                                      
                                      if(mysqli_num_rows($data)>0){
                                        echo "Record found";
                                       while($rows=mysqli_fetch_array($data)){
                                      
                                      $stdid=$rows['student_id'];
                                        $stdname=$rows['student_name'];
                                      //   $stdstatus=$rows['student_present'];
                                        $stddate=$rows['student_date'];
                                        $stdattno=$rows['attdno'];
                                
                                      
                                        if($rows['student_present'] == 'present'){$stdstatus = "Present"; $colour="bg-info text-dark";}
                                        else if($rows['student_present'] == 'absent'){$stdstatus = "Absent";
                                        $colour="bg-danger text-dark";}
                                        else if($rows['student_present'] == 'leave'){
                                          $stdstatus = "Leave";
                                          $colour="bg-warning text-dark";
                                        }
                                        ?>
                                      
                                        <tr>
                                        
                                           <td ><?php echo $stdname ?></td>
                                           <td class="<?php echo $colour ?>"><?php echo $stdstatus ?></td>
                                           <td><?php echo $stddate ?></td>
                                           
                                           
                                        </tr>
                                       <?php
                                       }
                                      
                                      
                                      }else{
                                      echo "Record not found";
                                      }
                                      
                                      
                                      // end of if else
                                      
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