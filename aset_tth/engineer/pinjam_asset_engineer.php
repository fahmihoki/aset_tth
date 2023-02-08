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
                <h1 class="display-7 text-white">Check In</h1>

            </div>
        </div>
    </div>
    <!-- Page Header End -->
		<body>
			 <section class="container-fluid bg-primary mb-5">
            <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
            <section class="row justify-content-center">
            <section class="col-12 col-sm-5 col-md-4">
            	<div class="col" style="padding:30px;">
    			 </div>
	<div class="container">
		    <form action="" method="post" role="form">
			<div class="row">
  				<div class="col">
    				<div style="width:400px;" id="reader"></div>
  			</div>
  				<div class="col" style="padding:30px;">
    			 </div>
    			
			</div>

 		<script type="text/javascript">
			function onScanSuccess(qrCodeMessage) {
			    document.getElementById('no_aset').value=qrCodeMessage;

			}
			function onScanError(errorMessage) {
			  //handle scan error
			}
			var html5QrcodeScanner = new Html5QrcodeScanner(
			    "reader", { fps: 10, qrbox: 250 });
			html5QrcodeScanner.render(onScanSuccess, onScanError);
		</script>
	
		<div class="row">
			<div class="col-lg-15">
				<div class="form-group">
					<label style="color:black;">Asset Number</label>
					<input  type='text' name="no_aset"
						id='no_aset' class='form-control'
						placeholder='Please scan the asset barcode..'
						onkeyup="GetDetail(this.value)" value="" autofocus required> 
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-15">
				<div class="form-group">
					<label style="color:black;">Asset Name</label>
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
					<label style="color:black;">Brand:</label>
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
		<!-- <div class="row">
			<div class="col-lg-6">
				<div class="form-group">
					<label>Buku manual :</label>
					<input type="text" name="buku_manual"
						id="buku_manual" class="form-control"
						placeholder='Manual Book..'
						value="">
				</div>
			</div>
		</div> -->
		
	   <div class="row">
  <div class="col-lg-15">
    <div class="form-group">
      <label style="color:black;">Asset Location :</label>
      <select name="lokasi_aset" id="lokasi_aset" class="form-control" required>
        <option value="">Select Location</option>
        <option value="Lab Transmisi 1">Lab Transmisi 1</option>
        <option value="Lab Transmisi 2">Lab Transmisi 2</option>
        <option value="Lab Transmisi 3">Lab Transmisi 3</option>
        <option value="Lab Transmisi 4">Lab Transmisi 4</option>
        <option value="Lab Transmisi 5">Lab Transmisi 5</option>
      </select>
    </div>
  </div>
</div>
		<div class="row">
			<div class="col-lg-15">
				<div class="form-group">
					<label style="color:black;" hidden>Name :</label>
					<input type="text" name="nama_users"
						id="nama_users" class="form-control"
						placeholder='Name..'
						value="<?php echo $_SESSION['username_admin']; ?>" hidden>
				</div>
			</div>
		</div>

		<button type="submit" class="btn btn-dark" name="submit" value="simpan">Simpan data</button>
	  				<div class="col" style="padding:30px;">
    			 </div>
</form>	

 				

	<?php
				include('../koneksi.php');
				
				//melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
				if (isset($_POST['submit'])) {
					//menampung data dari inputan

					$no_aset_dt = $_POST['no_aset'];
					$nama_alat_ukur_dt = $_POST['nama_alat_ukur'];
					$merek_dt = $_POST['merek'];
					$tipe_model_dt = $_POST['tipe_model'];
					$no_seri_dt = $_POST['no_seri'];
					// $buku_manual_dt = $_POST['buku_manual'];
					$nama_users = $_POST['nama_users'];
					$lokasi_aset = $_POST['lokasi_aset'];

					//query untuk menambahkan barang ke database, pastikan urutan nya sama dengan di database
					$datas = mysqli_query($koneksi, "INSERT INTO data_input(no_aset_dt, nama_alat_ukur_dt, merek_dt, tipe_model_dt, no_seri_dt, nama_users,  lokasi_aset )values('$no_aset_dt', '$nama_alat_ukur_dt', '$merek_dt', '$tipe_model_dt', '$no_seri_dt', '$nama_users', '$lokasi_aset')") or die(mysqli_error($koneksi));

					
					//id barang tidak dimasukkan, karena sudah menggunakan AUTO_INCREMENT, id akan otomatis

					//ini untuk menampilkan alert berhasil dan redirect ke halaman index
					echo "<script>alert('data berhasil disimpan.');window.location='index_engineer.php';</script>";
				}	
				?>


	<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail(str) {
			if (str.length == 0) {
				document.getElementById("nama_alat_ukur").value = "";
				document.getElementById("merek").value = "";
				document.getElementById("tipe_model").value = "";
				document.getElementById("no_seri").value = "";
				document.getElementById("buku_manual").value = "";
				return;
			}
			else {

				// Creates a new XMLHttpRequest object
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function () {

					// Defines a function to be called when
					// the readyState property changes
					if (this.readyState == 4 &&
							this.status == 200) {
						
						// Typical action to be performed
						// when the document is ready
						var myObj = JSON.parse(this.responseText);

						// Returns the response data as a
						// string and store this array in
						// a variable assign the value
						// received to first name input field
						
						document.getElementById
							("nama_alat_ukur").value = myObj[0];
						
						// Assign the value received to
						// last name input field
						document.getElementById(
							"merek").value = myObj[1];

						document.getElementById(
							"tipe_model").value = myObj[2];

						document.getElementById(
							"no_seri").value = myObj[3];

						document.getElementById(
							"buku_manual").value = myObj[4];
					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "../gfg.php?no_aset=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>
</section>
</section>
</section>
  <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary text-center border-top py-5 px-6" style="border-color: rgba(256, 256, 256, .1) !important;">
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
