<?php
require 'index.php';

function registrasi($data) {
	global $conn;

    $username = htmlspecialchars($data["username"]);
	$email = htmlspecialchars($data["email"]);
	$password = mysqli_real_escape_string($conn, $data["password"]);
    $alamat = htmlspecialchars($data['alamat']);
    $role = $_POST['role'];

	// cek email sudah ada atau belum
	$result = mysqli_query($conn, "SELECT email FROM pengguna WHERE email = '$email'");

	if(mysqli_fetch_assoc($result)) {
		echo "<script>
				alert('Email sudah terdaftar!')
		      </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	$query = "INSERT INTO `pengguna`(`role`, `nama`, `email`, `password`, `alamat`) VALUES ('$role', '$username', '$email', '$password', '$alamat')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
?>
