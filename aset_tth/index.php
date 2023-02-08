<?php
//menyertakan file program koneksi.php pada register
require('koneksi.php');
//inisialisasi session
session_start();
$error = '';
$validate = '';
//mengecek apakah sesssion username_admin tersedia atau tidak jika tersedia maka akan diredirect ke halaman index
if( isset($_SESSION['username_admin']) ){
  //mengecek apakah role user adalah admin atau engineer
  if($_SESSION['level'] == 'admin'){
    header('Location: admin/index.php');
  } elseif($_SESSION['level'] == 'engineer'){
    header('Location: engineer/index_engineer.php');
  }
}
//mengecek apakah form disubmit atau tidak
if( isset($_POST['submit']) ){
         
        // menghilangkan backshlases
        $username_admin = stripslashes($_POST['username_admin']);
        //cara sederhana mengamankan dari sql injection
        $username_admin = mysqli_real_escape_string($koneksi, $username_admin);
         // menghilangkan backshlases
        $password = stripslashes($_POST['password']);
         //cara sederhana mengamankan dari sql injection
        $password = mysqli_real_escape_string($koneksi, $password);
        
        //cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
        if(!empty(trim($username_admin)) && !empty(trim($password))){
            //select data berdasarkan username_admin dari database
            $query      = "SELECT * FROM users WHERE username_admin = '$username_admin'";
            $result     = mysqli_query($koneksi, $query);
            $rows       = mysqli_num_rows($result);
            if ($rows != 0) {
                $user = mysqli_fetch_assoc($result);
                $hash   = $user['password'];
                if(password_verify($password, $hash)){
                    //menyimpan username_admin dan role ke dalam session
                    $_SESSION['username_admin'] = $username_admin;
                    $_SESSION['level'] = $user['level'];    
                    //mengecek apakah role user adalah admin atau engineer
                    if($_SESSION['level'] == 'admin'){
                      header('Location: admin/pinjam_asset_admin.php');
                    } elseif($_SESSION['level'] == 'engineer'){
                      header('Location: engineer/pinjam_asset_engineer.php');
                    }
                }
                             
            //jika gagal maka akan menampilkan pesan error
            } else {
                $error =  'Cek Kembali Username/Passwordnya !!';
            }
             
        }else {
            $error =  'Data tidak boleh kosong !!';
        }
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!-- costum css -->
<link rel="stylesheet" href="style.css">

<!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
     <link href="style.css" rel="stylesheet">
</head>

<!-- Topbar Start -->
    <div class="container-fluid bg-dark ps-5 pe-0 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                </div>
            </div>
            <div class="col-md-6 text-center text-lg-end">
                <div class="position-relative d-inline-flex align-items-center bg-primary text-white top-shape px-5">
                    <div class="me-3 pe-3  py-2">
                       <h4 style="color:white;" class="m-0">Measuring Equipment Tracker</h4>
                    </div>
                    <div class="py-2">
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-2">
        <a href="index.html" class="navbar-brand p-10">
 <img src="images/Ttth.png" margin="3px" height="60px;" padding-left="30px;" style="margin:1px; padding: 0px;" >
        </a>
        <h1 class="m-0 text-uppercase text-primary me-2">Met</h1>

    </nav>
    <!-- Navbar End -->
<body>
     <!-- About Start -->
    <div class="container-fluid bg-white p-0">
        <div class="row g-0">
            <div class="col-lg-6 py-6 px-5">
                <form class="form-container" action="index.php" method="POST">
                    <h3 class="text-center text-dark"> Sign-In </h3>
                    <?php if($error != ''){ ?>
                        <div class="alert alert-danger" role="alert"><?= $error; ?></div>
                    <?php } ?>
                    
                    <div class="form-group">
                        <label for="username_admin" class="text-center text-dark">Username</label>
                        <input type="text" class="form-control" id="username_admin" name="username_admin" placeholder="Insert username">
                    </div>
                    <div class="form-group">
                        <label class="text-center text-dark" for="InputPassword">Password</label>
                        <input type="password" class="form-control" id="InputPassword" name="password" placeholder="Password">
                        <?php if($validate != '') {?>
                            <p class="text-danger"><?= $validate; ?></p>
                        <?php }?>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
                    <div class="form-footer mt-2">
                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                <div class="h-100 d-flex flex-column justify-content-center bg-primary p-5">
                    <div class="d-flex text-white mb-5">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white text-primary rounded-circle mx-auto mb-4" style="width: 60px; height: 60px;">
                            <i class="fa fa-user-tie fs-4"></i>
                        </div>
                        <div class="ps-4">
                            <h3>Sign Up ?</h3>
                            <p class="mb-0">Please contact web admin to register your account.                               </p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <div class="container-fluid bg-dark text-secondary text-center border-top py-6 px-6" style="border-color: rgba(256, 256, 256, .1) !important;">
        <p class="m-0">&copy; <a class="text-secondary border-bottom" href="#">Measuring Equipment Tracker</a>. All Rights Reserved</p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>