<?php
include 'konek.php';
$id 			= $_GET['id'];
$sql 			= mysqli_query($con,"SELECT
vendor.idpenyewa,
alat.idalat,
alat.namalap,
alat.desc,
alat.harga,
vendor.nama,
kategori.namakategori,
vendor.alamat
FROM
transaksi
INNER JOIN alat ON transaksi.idalat = alat.idalat
INNER JOIN vendor ON transaksi.idvendor = vendor.idpenyewa
INNER JOIN user ON transaksi.iduser = user.iduser
INNER JOIN kategori ON alat.idkategori = kategori.idkategori
WHERE user.iduser='$id'")
  or die(mysqli_errno());
$response = array();
if(mysqli_num_rows($sql) > 0)
{
	$response["semualapangan"] = array();
	while ($row = mysqli_fetch_array($sql)) {
		
		$user=array();
		
		$user["idpenyewa"]				=$row["idpenyewa"];			
		$user["alamat"]					= $row["alamat"];
		$user["namalap"]				= $row["namalap"];
		$user["desc"]					= $row["desc"];
		$user["harga"]					= $row["harga"];
		$user["namakategori"]			= $row["namakategori"];
		$user["nama"]					= $row["nama"];
		array_push($response["semualapangan"], $user);
	}
	// $response["success"]	= 1;
	// $response["message"]	= "Data semua member";
	echo json_encode($response);
}else{
	$response["success"]	= 0;
	$response["message"]	= "Tidak ada data";
	echo json_encode($response);
}
?>


