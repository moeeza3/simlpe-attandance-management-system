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

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>
<?php   

             

     
if(isset($_GET['editrec'])){

$edit_id=$_GET['editrec'];

$select="SELECT * FROM studentdata WHERE student_id='$edit_id'";

$run=mysqli_query($conn, $select);


$row_user=mysqli_fetch_assoc($run);

$student_id=$row_user['student_id'];
$student_name=$row_user['student_name'];
$student_email=$row_user['student_email'];
$student_password=$row_user['student_password'];
$student_contact=$row_user['student_tel'];
$student_image=$row_user['student_image'];
$student_address=$row_user['student_address'];




}


?>


<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-flex flex-column justify-content-center ">
                        <img src="../upload/<?php echo $student_image ?>" alt="<?php echo $student_image ?>" class="img-fluid d-block stdimage " style="height:100%">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>

                           


                    <!-- ..............form.............. -->
                            <form class="user" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputname"
                                        placeholder="Your Name" name="student_name" value="<?php echo $student_name; ?>">
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" name="student_email" value="<?php echo $student_email; ?>">
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                                        placeholder="Password" name="student_password" value="<?php echo $student_password; ?>">
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="tel" class="form-control form-control-user"
                                            id="exampleInputtel" placeholder="Telephone" name="student_tel" value="<?php echo $student_contact; ?>">
                                    </div>
                                    <div class="col-sm-6  d-flex justify-content-center align-items-center">
                                        <input type="file" class="form-control-file"
                                            id="exampleInputimage" name="student_image" value="<?php echo $student_image; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputaddress"
                                        placeholder="Address" name="student_address" value="<?php echo $student_address; ?>">
                                </div>

                                <input type="submit" class="btn btn-primary btn-user btn-block"  name="insert-btn" value="Update">
                        
                              
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php
   
 
     if(mysqli_connect_errno()){
        echo 'connection error';
     }else{
         echo 'connection ok';
     }

     if(isset($_POST['insert-btn'])){

        //to pick values from the form using post method
        $edit_name=$_POST['student_name'];
        $edit_email=$_POST['student_email'];
        $edit_password=$_POST['student_password'];
        $edit_tel=$_POST['student_tel'];
        $edit_address=$_POST['student_address'];
        //to pick image name and its temporary name
        //we can add only images text data like size, name in database
        $editimage=$_FILES['student_image']['name'];
        $edit_temp_img=$_FILES['student_image']['tmp_name'];
        
        
        //if image empty then set previouse image fi we dont update image while updating other data
        if(empty($editimage)){
            $editimage=$student_image;
        }
      
    
        $updateuser="UPDATE studentdata SET student_name='$edit_name',student_email='$edit_email',student_password='$edit_password',student_tel='$edit_tel',student_address='$edit_address',student_image='$editimage' WHERE student_id='$edit_id'";
    
        //to run query
        //we use method inside we use conection and query to be runned
        $update_run=mysqli_query($conn, $updateuser);
       //check if  working
        if($update_run===true){
            echo "Data updated";
            //move temp name img file to upload folder with that name
          echo   $file_destination = '../upload/' . $editimage;
             move_uploaded_file($edit_temp_img, $file_destination);
        }else{
            echo "Data update Failed, Try again";
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