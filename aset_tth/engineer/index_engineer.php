<?php
session_start();

// Check if the user is logged in and has a level of "engineer"
if (!isset($_SESSION['level']) || $_SESSION['level'] !== 'engineer') {
    // If the user is not logged in or is not an engineer, redirect them to the login page
    header('Location: ../index.php');
    exit;
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
                <a href="pinjam_asset_engineer.php" class="nav-item nav-link">Check In</a>
                <a href="data_alat_ukur_engineer.php" class="nav-item nav-link">Measuring Equipment Data</a>
                <a href="../logout.php" class="nav-item nav-link">Log out</a>
            </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

<body>
    <!-- Page Header Start -->
    <div class="container-fluid bg-dark p-10">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 text-white">History</h1>
                                            <form method="GET" action="search_engineer.php" style="text-align: center;">
        <label style="color:white;"> Search History : </label>
        <input type="text" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo $_GET['kata_cari']; } ?>"  autofocus/>
        <button class="bg-white" type="submit">Search</button>
                </form>

            </div>
        </div>
    </div>
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
							<th class="text-center text-dark">Asset Location</th>
							<th class="text-center text-dark">Date</th>
						
						</tr>
					</thead>
					<tbody>

						<?php
					include('../koneksi.php'); //memanggil file koneksi

							$datas = mysqli_query($koneksi, "SELECT * FROM data_input ORDER BY id_input DESC LIMIT 3") or die(mysqli_error($koneksi));
							//script untuk menampilkan data barang
					
							//melakukan perulangan
							// while($row = mysqli_fetch_assoc($datas)) {


									$no = 1;//untuk pengurutan nomor
							$page = (isset($_GET['page']))? $_GET['page'] : 1;
						      $limit = 10; 
						      $limit_start = ($page - 1) * $limit;
						      $no = $limit_start + 1;

						      $query = "SELECT * FROM data_input ORDER BY id_input DESC LIMIT $limit_start, $limit";
						      $dewan1 = $koneksi->prepare($query);
						      $dewan1->execute();
						      $res1 = $dewan1->get_result();

						        while ($row = $res1->fetch_assoc()) {

						?>	


					<tr>
						<td class="text-center text-dark"><?= $no; ?></td>
						<td class="text-center text-dark"><?= $row['nama_users']; //untuk menampilkan nama ?></td>
						<td class="text-center text-dark"><?= $row['no_aset_dt']; ?></td>
						<td class="text-center text-dark"><?= $row['nama_alat_ukur_dt']; ?></td>
						<td class="text-center text-dark"><?= $row['merek_dt']; ?></td>
						<td class="text-center text-dark"><?= $row['tipe_model_dt']; ?></td>
						<!-- <td><?= $row['buku_manual_dt']; ?></td> -->
						<td class="text-center text-dark"><?= $row['lokasi_aset']; ?></td>
						<td class="text-center text-dark"><?= $row['tanggal_pinjam']; ?></td>
					</tr>
				
						<?php $no++; }  ?>
						
					</tbody>
				</table>

						<?php
						  $query_jumlah = "SELECT count(*) AS jumlah FROM data_input";
						  $dewan1 = $koneksi->prepare($query_jumlah);
						  $dewan1->execute();
						  $res1 = $dewan1->get_result();
						  $row = $res1->fetch_assoc();
						  $total_records = $row['jumlah'];
						?>
						<p style="color:white;">Total Data : <?php echo $total_records; ?></p>
						<nav class="mb-5">
						  <ul class="pagination justify-content-end">
						    <?php
						      $jumlah_page = ceil($total_records / $limit);
						      $jumlah_number = 1; //jumlah halaman ke kanan dan kiri dari halaman yang aktif
						      $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
						      $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page;
						      
						      if($page == 1){
						        echo '<li class="page-item disabled"><a class="page-link" href="#">First</a></li>';
						        echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
						      } else {
						        $link_prev = ($page > 1)? $page - 1 : 1;
						        echo '<li class="page-item"><a class="page-link" href="?page=1">First</a></li>';
						        echo '<li class="page-item"><a class="page-link" href="?page='.$link_prev.'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
						      }
						 
						      for($i = $start_number; $i <= $end_number; $i++){
						        $link_active = ($page == $i)? ' active' : '';
						        echo '<li class="page-item '.$link_active.'"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
						      }
						 
						      if($page == $jumlah_page){
						        echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
						        echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
						      } else {
						        $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
						        echo '<li class="page-item"><a class="page-link" href="?page='.$link_next.'" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
						        echo '<li class="page-item"><a class="page-link" href="?page='.$jumlah_page.'">Last</a></li>';
						      }
						    ?>
						  </ul>
						</nav>
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