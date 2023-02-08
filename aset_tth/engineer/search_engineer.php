<?php
session_start();

// Check if the user is logged in and has a level of "admin"
if (!isset($_SESSION['level']) || $_SESSION['level'] !== 'engineer') {
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

        <style>
        .table {
            border-collapse: collapse;
            border border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }
        .th,td {
            text-align: left;
            padding: 8px;
        }
        .tr:nth-child(even){border-color: #f2f2f2}
    </style>
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
        <a href="index_engineer.php" class="navbar-brand p-0">
            <img src="../images/Ttth.png" margin="3px" height="60px;" padding-left="30px;" style="margin:1px; padding: 0px;" >
        </a>
        <h1 class="m-0 text-uppercase text-primary me-2">Met</h1>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0 me-n3">
                <a href="index_engineer.php" class="nav-item nav-link">Home</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

<body>
    <!-- Page Header Start -->
    <div class="container-fluid bg-dark p-10">
        <div class="row">
            <div class="col-14 text-center">
                <h1 class="display-7 text-white">Result</h1>
<form method="GET" action="search_engineer.php" style="text-align: center;">
		<label style="color:white;">Search History: </label>
		<input type="text" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo $_GET['kata_cari']; } ?>"  autofocus/>
		<button class="bg-white"type="submit">search</button>
				</form>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

				<div style="overflow-x: auto;" class="card-body bg-primary">
				<table class="table table-bordered bg-white">
					<thead>
						<tr>
							<th class="text-center text-dark">No</th>
							<th class="text-center text-dark">Username</th>
							<th class="text-center text-dark">Asset Number</th>
							<th class="text-center text-dark">Asset</th>
							<th class="text-center text-dark">Brand</th>
							<th class="text-center text-dark">Type/Model</th>
							<!-- <th class="text-center text-dark">Serial Number</th> -->
							<th class="text-center text-dark">Asset Location</th>
							<th class="text-center text-dark">Date</th>
							
						</tr>
					</thead>
					<tbody>

						<?php
				include('../koneksi.php'); //memanggil file koneksi
				$no = 1;

							$datas = mysqli_query($koneksi, "SELECT * FROM data_input ORDER BY id_input DESC LIMIT 10") or die(mysqli_error($koneksi));
							//script untuk menampilkan data barang
					
							//melakukan perulangan
							// while($row = mysqli_fetch_assoc($datas)) {

					if(isset($_GET['kata_cari'])) {
					//menampung variabel kata_cari dari form pencarian
					$kata_cari = $_GET['kata_cari'];

					//jika hanya ingin mencari berdasarkan kode_produk, silahkan hapus dari awal OR
					//jika ingin mencari 1 ketentuan saja query nya ini : SELECT * FROM produk WHERE kode_produk like '%".$kata_cari."%' 
					$query = "SELECT * FROM data_input WHERE no_aset_dt like '%".$kata_cari."%' OR nama_alat_ukur_dt like '%".$kata_cari."%' OR merek_dt like '%".$kata_cari."%' OR tipe_model_dt like '%".$kata_cari."%' OR nama_users like '%".$kata_cari."%' OR lokasi_aset like '%".$kata_cari."%' OR tanggal_pinjam like '%".$kata_cari."%' ORDER BY id_input DESC LIMIT 25";
				} else {
					//jika tidak ada pencarian, default yang dijalankan query ini
					$query = "SELECT * FROM data_input ORDER BY id_input DESC";
				}
				

				$result = mysqli_query($koneksi, $query);

				if(!$result) {
					die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
				}
				//kalau ini melakukan foreach atau perulangan
				while ($row = mysqli_fetch_assoc($result)) {

								
						?>	


					<tr>
						<td class="text-center text-dark"><?= $no; ?></td>
						<td class="text-center text-dark"><?= $row['nama_users']; //untuk menampilkan nama ?></td>
						<td class="text-center text-dark"><?= $row['no_aset_dt']; ?></td>
						<td class="text-center text-dark"><?= $row['nama_alat_ukur_dt']; ?></td>
						<td class="text-center text-dark"><?= $row['merek_dt']; ?></td>
						<td class="text-center text-dark"><?= $row['tipe_model_dt']; ?></td>
						<td class="text-center text-dark"><?= $row['lokasi_aset']; ?></td>
						<td class="text-center text-dark"><?= $row['tanggal_pinjam']; ?></td>
						
					</tr>
				
						<?php $no++; }  ?>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
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