<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: login.php");
  exit();
}

//koneksi ke database
include "connection.php";

//query untuk menampilkan data dari tabel users
$id = $_GET['id'];
$query = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($conn, $query);

//menampilkan data ke dalam tabel
if(mysqli_num_rows($result) > 0){
  $row = mysqli_fetch_assoc($result);
} else {
  $row = null;
}

mysqli_close($conn);
?>
<html>
<head>
	<title>Detail User</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1 class="text-center my-5">Detail User</h1>
		<div class="row">
			<div class="col-md-3">
				<img src="uploads/<?php echo $row['avatar']; ?>" class="img-thumbnail">
			</div>
			<div class="col-md-9">
				<table class="table table-borderless">
					<tr>
						<th>Nama:</th>
							<td><?php echo $row['name']; ?></td>
					</tr>
					<tr>
						<th>Email:</th>
						<td><?php echo $row['email']; ?></td>
					</tr>
					<tr>
						<th>Role:</th>
						<td><?php echo $row['role']; ?></td>
					</tr>
					<tr>
						<th>Phone:</th>
						<td><?php echo $row['phone']; ?></td>
					</tr>
					<tr>
						<th>Alamat:</th>
						<td><?php echo $row['address']; ?></td>
					</tr>
				</table>
				<a href="readuser.php" class="btn btn-primary">Kembali ke Daftar User</a>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
