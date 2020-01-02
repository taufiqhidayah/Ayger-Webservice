<?php

date_default_timezone_set("America/New_York");
include "konek.php";
	$tgl =date("Y-m-d");
	$response = array();
	$iduser =$_POST['iduser'];
	$idvendor=$_POST['idvendor'];
	$saldo=$_POST['saldo'];
	$idalat=$_POST['idalat'];
	
	$query =mysqli_query($con, "UPDATE user SET user.saldo ='$saldo' where user.iduser ='$iduser'");
	$query= mysqli_query($con,"Insert into transaksi(iduser,idvendor,tanggal,idalat) values('$iduser','$idvendor','$tgl','$idalat')");
	if($query==TRUE)
	{
		$response["success"]	= "true";
		$response["message"]	= "Data berhasil di Update";
		echo json_encode($response);
	}else{
		$response["success"]	= "false";
		$response["message"]	= "Data gagal di Update";
		echo json_encode($response);
	}
?>