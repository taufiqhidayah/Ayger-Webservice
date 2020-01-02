<?php
include "konek.php";
	$response = array();
	$id =$_POST['id'];
	$saldo=$_POST['saldo'];
	
	$query =mysqli_query($con, "UPDATE user SET user.saldo ='$saldo' where user.iduser ='$id'");
	$query
	if($query)
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