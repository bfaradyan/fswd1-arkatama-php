<?php
	include 'koneksi.php';

	function tambah_data($data, $files){
		$email = $data['email'];
		$name = $data['name'];
		$role = $data['role'];

		$split = explode('.', $files['avatar']['name']);
		$ekstensi = $split[count($split)-1];

		$avatar = $email.'.'.$ekstensi;
		$address = $data['address'];

		$dir = "img/";
		$tmpFile = $files['avatar']['tmp_name'];

		move_uploaded_file($tmpFile, $dir.$avatar);

		$query = "INSERT INTO tb_siswa VALUES(null, '$email', '$name', '$role', '$avatar', '$address')";
		$sql = mysqli_query($GLOBALS['conn'], $query);

		return true;
	}

	function ubah_data($data, $files){
		$user_id = $data['user_id'];
		$email = $data['email'];
		$name = $data['name'];
		$role = $data['role'];
		$address = $data['address'];

		$queryShow = "SELECT * FROM tb_siswa WHERE user_id = '$user_id';";
		$sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
		$result = mysqli_fetch_assoc($sqlShow);

		if($files['avatar']['name'] == ""){
			$avatar = $result['avatar'];
		} else {

			$split = explode('.', $files['avatar']['name']);
			$ekstensi = $split[count($split)-1];

			$avatar = $result['email'].'.'.$ekstensi;
			unlink("img/".$result['avatar']);
			move_uploaded_file($files['avatar']['tmp_name'], 'img/'.$avatar);
		}

		$query = "UPDATE tb_siswa SET email='$email', name='$name', role='$role', address='$address', avatar = '$avatar' WHERE user_id='$user_id';";
		$sql = mysqli_query($GLOBALS['conn'], $query);

		return true;
	}

	function hapus_data($data){
		$user_id = $data['hapus'];

		$queryShow = "SELECT * FROM tb_siswa WHERE user_id = '$user_id';";
		$sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
		$result = mysqli_fetch_assoc($sqlShow);


		unlink("img/".$result['avatar']);

		$query = "DELETE FROM tb_siswa WHERE user_id = '$user_id';";
		$sql = mysqli_query($GLOBALS['conn'], $query);

		return true;
	}

?>