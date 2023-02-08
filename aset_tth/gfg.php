<?php

// Get the no_aset
$no_aset = $_REQUEST['no_aset'];

// Database connection
$koneksi = mysqli_connect("localhost", "root", "", "track_aset");

if ($no_aset !== "") {
	
	// Get corresponding nama alat ukur and
	// merek, tipe model dan no seri for that user id	
	$query = mysqli_query($koneksi, "SELECT nama_alat_ukur,
	merek, tipe_model, no_seri, buku_manual FROM alat_ukur WHERE no_aset='$no_aset'");

	$row = mysqli_fetch_array($query);

	// Get the nama alat ukur
	$nama_alat_ukur = $row["nama_alat_ukur"];

	// Get the merek
	$merek = $row["merek"];

	// Get the tipe_model
	$tipe_model = $row["tipe_model"];

	// Get the no_seri
	$no_seri = $row["no_seri"];


}

// Store it in a array
$result = array("$nama_alat_ukur", "$merek", "$tipe_model", "$no_seri", );

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
