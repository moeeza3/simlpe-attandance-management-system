<?php 
include('./includes/db.php'); 
session_start();


$conn=mysqli_connect('localhost','root','','schoolmanagement');
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
     
    <?php 
     
    

    ?>

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
                    <h1 class="h3 mb-4 text-gray-800">Student Attandance</h1>

                    <!-- Content Row -->
                    <div class="row ">
                 
                    <?php 
                    $dn= date('Y-m-d');

                    $result=mysqli_query($conn,"SELECT count(*) as presenttotal from stdattandance WHERE student_id='$_SESSION[studentid]' and student_present='present' and MONTH(student_date)=MONTH(CURRENT_DATE())");
                   $data=mysqli_fetch_assoc($result);
                   $presenttotal=$data['presenttotal'];
                    
                    
                    ?>
                 
                    <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                               Present (Monthly)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $presenttotal ?> </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>



                        <?php 
                    $dn= date('Y-m-d');

                    $result=mysqli_query($conn,"SELECT count(*) as absenttotal from stdattandance WHERE student_id='$_SESSION[studentid]' and student_present='absent' and MONTH(student_date)=MONTH(CURRENT_DATE())");
                   $data=mysqli_fetch_assoc($result);
                   $absenttotal=$data['absenttotal'];
                    
                    
                    ?>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                               Absent(Monthly)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $absenttotal ?></div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php 
                    $dn= date('Y-m-d');

                    $result=mysqli_query($conn,"SELECT count(*) as leavetotal from stdattandance WHERE student_id='$_SESSION[studentid]' and student_present='leave' and MONTH(student_date)=MONTH(CURRENT_DATE())");
                   $data=mysqli_fetch_assoc($result);
                   $leavetotal=$data['leavetotal'];
                    
                    
                    ?>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                               Leave (Monthly)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo $leavetotal ?>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>

 <?php
                        $dn= date('Y-m-d');

$result=mysqli_query($conn,"SELECT count(*) as total from stdattandance WHERE student_id='$_SESSION[studentid]' and student_present='present' and MONTH(student_date)=MONTH(CURRENT_DATE())");
$data=mysqli_fetch_assoc($result);
$grade=$data['total'];

if($grade==26){
 
  $gradestatus="<div class='col-lg-6 mb-4'>
  <div class='card bg-primary text-white shadow'>
      <div class='card-body'>
          Grade
          <div class='text-white-100 h4 font-weight-bold mb-0'>A++</div>
      </div>
  </div>
</div>
";


} else if($grade<26 && $grade>=22){

    $gradestatus="<div class='col-lg-6 mb-4'>
    <div class='card bg-success text-white shadow'>
        <div class='card-body'>
            Grade
            <div class='text-white-100 h4 font-weight-bold mb-0'>A</div>
        </div>
    </div>
  </div>
  ";

}else if($grade<22 && $grade>=18){

    $gradestatus="<div class='col-lg-6 mb-4'>
    <div class='card bg-info text-white shadow'>
        <div class='card-body'>
            Grade
            <div class='text-white-100 h4 font-weight-bold mb-0'>B</div>
        </div>
    </div>
  </div>
  ";

}else if($grade<18 && $grade>=14){

    $gradestatus="<div class='col-lg-6 mb-4'>
    <div class='card bg-warning text-white shadow'>
        <div class='card-body'>
            Grade
            <div class='text-white-100 h4 font-weight-bold mb-0'>C</div>
        </div>
    </div>
  </div>
  ";

}else if($grade<14 && $grade>=10){

    $gradestatus="<div class='col-lg-6 mb-4'>
    <div class='card bg-danger text-white shadow'>
        <div class='card-body'>
            Grade
            <div class='text-white-100 h4 font-weight-bold mb-0'>D</div>
        </div>
    </div>
  </div>
  ";

}else{

    $gradestatus="<div class='col-lg-6 mb-4'>
    <div class='card bg-danger text-white shadow'>
        <div class='card-body'>
            Grade
            <div class='text-white-100 h4 font-weight-bold mb-0'>E</div>
        </div>
    </div>
  </div>
  ";

}

?>
                

                <!-- grade status -->
                    <div class="col-lg-6 mb-4">
                                   
                    <?php echo $gradestatus ?>   
                    
                    </div>




          <?php 
              date_default_timezone_set('Asia/Karachi');
   
              if(isset($_POST['tkattandance']) ){
                   
          
           //  $getid=$studentid;
                   // $setid=$_POST[$studentid];
                   // $datetaken=date('Y-m-d');
               $datetaken=date('Y-m-d');
                   // $checkabsent=$_POST['absent'];
                   // $checkleave=$_POST['leave'];
          
          
           $qurty=mysqli_query($conn,"SELECT * from stdattandance where student_id='$_SESSION[studentid]' and student_date='$datetaken'");
          
          $count=mysqli_num_rows($qurty);
       
       $qurty1=mysqli_query($conn,"SELECT * from approval where student_id='$_SESSION[studentid]' and student_date='$datetaken'");
         $count1=mysqli_num_rows($qurty1);
           
            if($count>0 || $count1>0){
                 echo "Attandance taken already";
            }else{
       
       
                 if(isset($_POST['present'])){
          
                  echo $present= $_POST['present'];
                $insertatt="INSERT INTO stdattandance(student_id,student_name,student_present,student_date) VALUES ('$_SESSION[studentid]','$stdname','$present','$datetaken')";
          
               $runq=mysqli_query($conn, $insertatt);
                   
       
                   }
                   else if(isset($_POST['absent'])){
             
                  echo $absent=$_POST['absent'];
          
                  $insertatt="INSERT INTO stdattandance(student_id,student_name,student_present,student_date) VALUES ('$_SESSION[studentid]','$stdname','$absent','$datetaken')";
          
                  $runq=mysqli_query($conn, $insertatt);
                  
             
                  }else if(isset($_POST['leave'])){
                    echo $leave=$_POST['leave'];
          
                   //  $insertatt="INSERT INTO stdattandance(student_id,student_name,student_present,student_date) VALUES ('$studentid','$student_name','$leave','$datetaken')";
                   //  $runq=mysqli_query($conn, $insertatt);
                  
                    $insertattadmin="INSERT INTO approval(student_id,student_name,student_present,student_date) VALUES ('$_SESSION[studentid]','$stdname','$leave','$datetaken')";
                    $runqadmin=mysqli_query($conn, $insertattadmin);
          
                  }

       
            }
          
              }     
          
          
          ?>

                        <div class="card mb-4 " style="width:100%">
                      <div class="card-header">Take attendance</div>
                        <div class="card-body">
                            <form action="" method="post">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" >
                        
                           <tr>
                            <th class="text-uppercase text-gray-700">present</th>
                            <th class="text-uppercase text-gray-700">absent</th>
                            <th class="text-uppercase text-gray-700">leave</th>
                          
                           </tr>    

                           <tr>
            <td class="text-uppercase text-gray-700">
            <div class="form-check">
       <input class="form-check-input" name="present" type="checkbox" value="present" id="defaultCheck1">
       <label class="form-check-label" for="defaultCheck1">
       Mark Present
       </label>
       </div>
             </td>

                <td class="text-uppercase text-gray-700">
                <div class="form-check">
         <input class="form-check-input" name="absent" type="checkbox" value="absent" id="defaultCheck1">
         <label class="form-check-label" for="defaultCheck1">
          Mark Absent 
         </label>
         </div>
        </td>
                    <td class="text-uppercase text-gray-700">
                     <div class="form-check">
         <input class="form-check-input"  name="leave" type="checkbox" value="leave" id="defaultCheck1">
      <label class="form-check-label" for="defaultCheck1">
       Mark Leave
      </label>
      </div>
        </td>
                          
                           </tr> 
                       
 
                            </table>
                       <input type="submit" value="Take Attendance" name="tkattandance" class="btn btn-primary  py-2 px-5">    
                        </div>
                        </form>
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