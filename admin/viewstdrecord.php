<?php 
include('./includes/db.php'); 
session_start();


//   $conn=mysqli_connect('localhost','root','','schoolmanagement');
//   $query="SELECT * FROM studentdata WHERE student_id='$_SESSION[studentid]'";
//   $rq = $conn->query($query);
//   $num = $rq->num_rows;
//   $rrw = $rq->fetch_assoc();

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
                    <h1 class="h3 mb-4 text-gray-800">View student record Attandance</h1>

                    <!-- Content Row -->
                    <div class="row ">

            

                 <div class="card ml-2 px-4 pt-4 mb-3" style="width:100%">
                 <form action="" method="get" class="row">
                
                 
                 <div class="form-group col-4">
                <input type="text"  name="searchid" class="form-control form-control-user " id="exampleInputid" 
                    placeholder="Enter id">
                    </div> 

                    <div class="form-group col-4">
                <input type="text"  name="searchname" class="form-control form-control-user " id="exampleInputid" 
                    placeholder="Enter Name">
                    </div> 


                    <div class="form-group col-4">
                    <input type="submit" value="View Student" name="result" class="btn btn-primary py-2 px-5" >
                    </div> 

                  

                    </form>
                
                 </div>



                 <?php   


   if(isset($_GET['delrec'])){
 
    $del_id=$_GET['delrec'];
  
    $delete="DELETE FROM studentdata WHERE student_id='$del_id'";
   
    $rundelete=mysqli_query($conn,$delete);
   
    if($rundelete==true){
       echo "record deleted";
      
    }else{
       echo "no record deleted";
    }

   }

?>
              
                   
                 <div class="card shadow mb-4 ml-2  " style="width:100%">
                    <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Record Table</h6>
                    </div>

                    <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered"  width="100%"  >

                                <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>DP</th>
                                            <th>Address</th>
                                            <th>Edit</th>
                                            <th>DEL</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    <?php 
                        
                        if(isset($_GET['result'])){

                           
                            $searchid= $_GET['searchid'];
                            $searchname=$_GET['searchname'];
                            
                         
                    
                            if($searchid!="" || $searchname!=""){
                              $queryq="SELECT * FROM studentdata WHERE student_id='$searchid'  OR student_name='$searchname'";
                        
                               $data= $conn->query($queryq);
                    
                            }
                            if($searchid!="" && $searchname!=""){
                                $queryq="SELECT * FROM studentdata WHERE student_id='$searchid'  AND student_name='$searchname'";
                          
                                 $data= $conn->query($queryq);
                      
                              }
                         
                         
                    
                    
                            if(mysqli_num_rows($data)>0){ 
                    
                              while($rows=mysqli_fetch_array($data)){
                             
                                $stdid=$rows['student_id'];
                                $stdname=$rows['student_name'];
                                $stdemail=$rows['student_email'];
                                $stdcont=$rows['student_tel'];
                                $stdimage=$rows['student_image'];
                                $stdaddress=$rows['student_address'];
                             
                     
                     
                             
                           
                    
                    
                               ?>
                             
                             <tr>
                                    <td><?php echo $stdid ?></td>
                                    <td><?php echo $stdname ?></td>
                                    <td><?php echo  $stdemail ?></td>
                                    <td><?php echo  $stdcont ?></td>
                                    <td>
                                        
                                        <img src='../upload/<?php echo $stdimage ?>' alt='<?php echo $stdimage ?>' class="img-fluid d-block stdimage" style="width:80px">
                                    </td>
                                    <td><?php echo $stdaddress ?></td>
                                    <td>
                                    <a href="editrecord.php?editrec=<?php echo $stdid ?>" class="btn btn-facebook btn-user btn-block">
                                            Edit
                                        </a>
                                    </td>
                                    <td> 
                                        <a href="viewstdrecord.php?delrec=<?php echo $stdid ?>" class="btn btn-google btn-user btn-block">
                                            Delete
                                        </a>
                                    </td>                                                            
                                 </tr>
                              <?php
                              }
                    
                            
                             
                             }else{
                             echo "Record not found";
                             }
                        
                          }  else{

                            $queryq="SELECT * FROM studentdata";
                        
                            $data= $conn->query($queryq);

                            if(mysqli_num_rows($data)>0){ 
                    
                                while($rows=mysqli_fetch_array($data)){
                               
                                 $stdid=$rows['student_id'];
                                 $stdname=$rows['student_name'];
                                 $stdemail=$rows['student_email'];
                                 $stdcont=$rows['student_tel'];
                                 $stdimage=$rows['student_image'];
                                 $stdaddress=$rows['student_address'];
                               //   $stdstatus=$rows['student_present'];   
                      
                                 ?>
                               
                                 <tr>
                                    <td><?php echo $stdid ?></td>
                                    <td><?php echo $stdname ?></td>
                                    <td><?php echo  $stdemail ?></td>
                                    <td><?php echo  $stdcont ?></td>
                                    <td>
                                        
                                        <img src='../upload/<?php echo $stdimage ?>' alt='<?php echo $stdimage ?>' class="img-fluid d-block stdimage" style="width:80px">
                                    </td>
                                    <td><?php echo $stdaddress ?></td>
                                    <td>
                                    <a href="editrecord.php?editrec=<?php echo $stdid ?>" class="btn btn-facebook btn-user btn-block">
                                            Edit
                                        </a>
                                    </td>
                                    <td> 
                                        <a href="viewstdrecord.php?delrec=<?php echo $stdid ?>" class="btn btn-google btn-user btn-block">
                                            Delete
                                        </a>
                                    </td>                                                            
                                 </tr>
                                <?php
                                }
                      
                              
                               
                               }else{
                               echo "Record not found";
                               }


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