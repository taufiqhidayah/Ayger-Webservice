<?php
	/* ===== www.dedykuncoro.com ===== */
	include 'konek.php';
	
	class usr{}
	
	$email = $_POST["email"];
	$password = $_POST['password'];

	$query = mysqli_query($con,"SELECT * FROM user WHERE email='$email'");
	
	$row = mysqli_fetch_array($query);
	
	if (!empty($row)){
		if(md5($password,$row['password'])){
		$response = new usr();
		$response->success = "true";
		$response->message = "Selamat datang ".$row['email'];
		$response->email = $row['email'];
		$response->iduser = $row['iduser'];
		$response->nama = $row['nama'];

		die(json_encode($response));
	}else{
		$response = new usr();
		$response->success = "false";
		$response->message = " password salah";
		die(json_encode($response));
	}
	} else { 
		$response = new usr();
		$response->success = "false";
		$response->message = "Username atau password salah";
		die(json_encode($response));
	}
	
	mysql_close();
	
?>