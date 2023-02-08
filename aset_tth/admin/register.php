<?php
//inisialisasi session
session_start();

// Check if the user is logged in and has a level of "admin"
if (!isset($_SESSION['level']) || $_SESSION['level'] !== 'admin') {
    // If the user is not logged in or is not an admin, redirect them to the login page
    header('Location: ../index.php');
    exit;
}
?>

<?php
//menyertakan file program koneksi.php pada register
require('../koneksi.php');
//inisialisasi session
$error = '';
$validate = '';
//mengecek apakah form registrasi di submit atau tidak
    if( isset($_POST['submit']) ){
            // menghilangkan backshlases
            $username_admin = stripslashes($_POST['username_admin']);
            //cara sederhana mengamankan dari sql injection
            $username_admin = mysqli_real_escape_string($koneksi, $username_admin);
            $password = stripslashes($_POST['password']);
            $password = mysqli_real_escape_string($koneksi, $password);
            $repass   = stripslashes($_POST['repassword']);
            $repass   = mysqli_real_escape_string($koneksi, $repass);
            $level = stripslashes($_POST['level']);
            $level = mysqli_real_escape_string($koneksi, $level);
            //cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
            if(!empty(trim($username_admin)) && !empty(trim($password)) && !empty(trim($repass)) && !empty(trim($level))){
                //mengecek apakah password yang diinputkan sama dengan re-password yang diinputkan kembali
                if($password == $repass){
                    //memanggil method cek_nama untuk mengecek apakah user sudah terdaftar atau belum
                    if( cek_nama($username_admin,$koneksi) == 0 ){
                        //hashing password sebelum disimpan didatabase
                        $password  = password_hash($password, PASSWORD_DEFAULT);
                        //insert data ke database
                        $query = "INSERT INTO users (username_admin, password, level ) VALUES ('$username_admin','$password','$level')";
                        $result   = mysqli_query($koneksi, $query);
                    //jika insert data berhasil maka akan diredirect ke halaman index.php serta menyimpan data username ke session
                    if ($result) {
                        
                        header('Location: index.php');
                     
                    //jika gagal maka akan menampilkan pesan error
                    } else {
                        $error =  'Register User Gagal !!';
                    }
                }else{
                        $error =  'Username sudah terdaftar !!';
                }
            }else{
                $validate = 'Password tidak sama !!';
            }
             
        }else {
            $error =  'Data tidak boleh kosong !!';
        }
    } 


    //fungsi untuk mengecek username apakah sudah terdaftar atau belum
    function cek_nama($username_admin,$koneksi){
        $username_admin = mysqli_real_escape_string($koneksi, $username_admin);
        $query = "SELECT * FROM users WHERE username_admin = '$username_admin'";
        if( $result = mysqli_query($koneksi, $query) ) return mysqli_num_rows($result);
    }
?>
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
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../style.css" rel="stylesheet">

        <script src=
        "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        type="text/javascript">
        </script>
    
        <script src=
        "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
        </script>

        <script type="text/javascript" src="../js/html5-qrcode.min.js"></script>
</head>

<div>
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
   <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href="index.html" class="navbar-brand p-0">
            <img src="../images/Ttth.png" margin="3px" height="60px;" padding-left="30px;" style="margin:1px; padding: 0px;" >
        </a>
        <h1 class="m-0 text-uppercase text-primary me-2">Met</h1>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0 me-n3">
                <a href="index.php" class="nav-item nav-link">Home</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

<body>
    <!-- Page Header Start -->
    <div class="container-fluid bg-dark p-10">
        <div class="row">
            <div class="col-14 text-center">
                <h3 class="display-6 text-white">Sign Up</h3>

            </div>
        </div>
    </div>
<body>
        <section class="container-fluid bg-primary mb-4">
            <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
            <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-4">
                <form class="form-container" action="register.php" method="POST">
                    <br>
                    <?php if($error != ''){ ?>
                        <div class="alert alert-danger" role="alert"><?= $error; ?></div>
                    <?php } ?>
                    
                   <br>
                    <div class="form-group">
                        <label style="color:black;" for="username">Username</label>
                        <input type="text" class="form-control" id="username_admin" name="username_admin" placeholder="Input username" autofocus>
                    </div>
                    <div class="form-group">
                        <label style="color:black;" for="InputPassword">Password</label>
                        <input type="password" class="form-control" id="InputPassword" name="password" placeholder="Password">
                        <?php if($validate != '') {?>
                            <p class="text-danger"><?= $validate; ?></p>
                        <?php }?>
                    </div>
                    <div class="form-group">
                        <label style="color:black;" for="InputPassword">Re-Password</label>
                        <input type="password" class="form-control" id="InputRePassword" name="repassword" placeholder="Re-Password">
                        <?php if($validate != '') {?>
                            <p class="text-danger"><?= $validate; ?></p>
                        <?php }?>
                    </div>
                     <div class="form-group">
  <div class="form-check">
    <input class="form-check-input bg-dark" type="radio" name="level" id="level-admin" value="admin">
    <label style="color:black;" class="form-check-label" for="level-admin">Admin</label>
  </div>
  <div class="form-check">
    <input class="form-check-input bg-dark" type="radio" name="level" id="level-engineer" value="engineer">
    <label style="color:black;" class="form-check-label" for="level-engineer">Engineer</label>
  </div>
</div>
                    <button type="submit" name="submit" class="btn btn-dark btn-block">Register</button> <br>
                     </form>

            </section>
</section>
</section>            
        <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary text-center border-top py-4 px-5" style="border-color: rgba(256, 256, 256, .1) !important;">
        <p class="m-0">&copy; <a class="text-secondary border-bottom" href="#">Measuring Equipment Tracker</a>. All Rights Reserved.<a class="text-secondary border-bottom" href="#"></a></p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>
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
    <!-- Bootstrap requirement jQuery pada posisi pertama, kemudian Popper.js, dan  yang terakhit Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>