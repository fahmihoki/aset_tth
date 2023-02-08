<?php
session_start();

// Check if the user is logged in and has a level of "admin"
if (!isset($_SESSION['level']) || $_SESSION['level'] !== 'admin') {
    // If the user is not logged in or is not an admin, redirect them to the login page
    header('Location: ../index.php');
    exit;
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
                    <div class="me-3 pe-3 py-2">
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
                 <a href="data_alat_ukur.php" class="nav-item nav-link">Measuring Equipment Data</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

<body>
    <!-- Page Header Start -->
    <div class="container-fluid bg-dark p-10">
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="display-6 text-white">Add Measuring Equipment</h3>

            </div>
        </div>
    </div>
<body>
			 <section class="container-fluid bg-primary mb-5">
            <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
            <section class="row justify-content-center">
            <section class="col-11 col-sm-5 col-md-4">
            	<div class="col" style="padding:30px;">
    			 </div>
	<div class="container">
		<form action="" method="post" role="form">
		
		<div class="row">
			<div class="col-lg-15">
				<div class="form-group">
					<label style="color:black;">Asset Number :</label>
					<input type='text' name="no_aset"
						id='no_aset' class='form-control'
						placeholder='Input asset number..'
						value="" autofocus required>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-15">
				<div class="form-group">
					<label style="color:black;">Measuring Equipment Name :</label>
					<input type="text" name="nama_alat_ukur"
						id="nama_alat_ukur" class="form-control"
						placeholder='Asset name..'
						value="" required>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-15">
				<div class="form-group">
					<label style="color:black;">Brand :</label>
					<input type="text" name="merek"
						id="merek" class="form-control"
						placeholder='Brand name..'
						value="" required>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-15">
				<div class="form-group">
					<label style="color:black;">Type/Model :</label>
					<input type="text" name="tipe_model"
						id="tipe_model" class="form-control"
						placeholder='Type/model..'
						value="" required>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-15">
				<div class="form-group">
					<label style="color:black;">Serial Number :</label>
					<input type="text" name="no_seri"
						id="no_seri" class="form-control"
						placeholder='Serial Number..'
						value="" required>
				</div>
			</div>
		</div>
		<button type="submit" class="btn btn-dark" name="submit" value="simpan">Save data</button>
	</div>
</form>
</section>

	<?php
				include('../koneksi.php');
				
				//melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
				if (isset($_POST['submit'])) {
					//menampung data dari inputan

					$no_aset = $_POST['no_aset'];
					$nama_alat_ukur = $_POST['nama_alat_ukur'];
					$merek = $_POST['merek'];
					$tipe_model = $_POST['tipe_model'];
					$no_seri = $_POST['no_seri'];
					

					//query untuk menambahkan data ke database, pastikan urutan nya sama dengan di database
					$datas = mysqli_query($koneksi, "INSERT INTO alat_ukur(no_aset, nama_alat_ukur, merek, tipe_model, no_seri )values('$no_aset', '$nama_alat_ukur', '$merek', '$tipe_model', '$no_seri')") or die(mysqli_error($koneksi));

					//ini untuk menampilkan alert berhasil dan redirect ke halaman index
					echo "<script>alert('data berhasil disimpan.');window.location='alat_ukur.php';</script>";
				}	
	?>
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
</body>
</html>
