
<?php 
include 'includes/db.php';
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

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->

    <link href="css/sb-admin-2.css" rel="stylesheet">
   

</head>

<body class=" d-flex flex-column justify-content-center align-items-center login">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center ">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                            <!-- ........form............. -->
                                    <form class="user" method="post" action="">
                                        <div class="form-group">
                          <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp"
                         placeholder="Enter Email Address..." name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>
                                       
                                        <input type="submit" class="btn btn-primary btn-user btn-block" name="logbtn" value="Login">
                                            
                                        <hr>
                                        <a href="admin/adminlogin.php" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Admin Login
                                        </a>
                                        <a href="student/createaccount.php" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Create Your Account
                                        </a>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <?php 
    

    if(isset($_POST['logbtn'])){
        
       echo $_POST['logbtn'];
       echo $email=$_POST['email'];
       echo $password=$_POST['password'];


        $select="SELECT * FROM studentdata WHERE student_email='$email' AND student_password='$password'";

        $run=mysqli_query($conn, $select);
     
 
        $row_user=mysqli_num_rows($run);
        $row=mysqli_fetch_assoc($run);
        
        if($row_user>0){         
          $_SESSION['studentid']=$row['student_id'];
          $_SESSION['studentname']=$row['student_name'];
          $_SESSION['studentemail']=$row['student_email'];
          $_SESSION['studentpass']=$row['student_password'];
          $_SESSION['studenttel']=$row['student_tel'];
          $_SESSION['studentaddress']=$row['student_address'];
          $_SESSION['studentdetail']=$row['student_detail'];
     
          $dbemail=$row['student_email'];
          $dbpassword=$row['student_password'];

          
       if($email==$dbemail && $password==$dbpassword){
        
        header('Location:student/index.php');
        $_SESSION['email']=$email;
         
        $setstatus=mysqli_query($conn,"UPDATE studentdata SET student_status='1' WHERE student_email='$email'");

     }else{
        echo "wrong email or password";
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