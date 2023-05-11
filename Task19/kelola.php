<!DOCTYPE html>

<?php
include 'koneksi.php';

$user_id = '';
$email = '';
$name = '';
$role = '';
$address = '';

if(isset($_GET['ubah'])){
	$user_id = $_GET['ubah'];

	$query = "SELECT * FROM tb_siswa WHERE user_id = '$user_id';";
	$sql = mysqli_query($conn, $query);

	$result = mysqli_fetch_assoc($sql);

	$email = $result['email'];
	$name = $result['name'];
	$role = $result['role'];
	$address = $result['address'];

}
?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
	integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

	
	<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" 
	integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

	<title>belajar_crud</title>
</head>
<body>
	<div class="container">
		<form method="POST" action="proses.php" enctype="multipart/form-data">
			<input type="hidden" value="<?php echo $user_id; ?>" name="user_id">
			<div class="mb-3 row">
				<label for="email" class="col-sm-2 col-form-label">
					email
				</label>
				<div class="col-sm-10">
					<input required type="text" name="email" class="form-control" id="email" value="<?php echo $email; ?>">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="name" class="col-sm-2 col-form-label">
					Name
				</label>
				<div class="col-sm-10">
					<input required type="text" name="name" class="form-control" id="name"  value="<?php echo $name; ?>">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="role" class="col-sm-2 col-form-label">
					Role
				</label>
				<div class="col-sm-10">
					<select required id="role" name="role" class="form-select">
						<option <?php if($role == 'Admin'){ echo "selected";} ?> value="Admin">Admin</option>
						<option <?php if($role == 'User'){ echo "selected";} ?> value="User">User</option>
					</select>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="avatar" class="col-sm-2 col-form-label">
					Avatar
				</label>
				<div class="col-sm-10">
					<input <?php if(!isset($_GET['ubah'])){ echo "required";} ?> class="form-control" type="file" name="avatar" id="avatar" accept="image/*">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="address" class="col-sm-2 col-form-label">
					Address
				</label>
				<div class="col-sm-10">
					<textarea required class="form-control" id="address" name="address" rows="3"><?php echo $address; ?></textarea>
				</div>
			</div>

			<div class="mb-3 row mt-4">
				<div class="col">
					<?php
					if(isset($_GET['ubah'])){
						?>
						<button type="submit" name="aksi" value="edit" class="btn btn-primary">
							<i class="fa fa-floppy-o" aria-hidden="true"></i>
							Simpan Perubahan
						</button>
						<?php
					} else {
						?>
						<button type="submit" name="aksi" value="add" class="btn btn-primary">
							<i class="fa fa-floppy-o" aria-hidden="true"></i>
							Tambahkan
						</button>
						<?php
					}
					?>
					<a href="index.php" type="button" class="btn btn-danger">
						<i class="fa fa-reply" aria-hidden="true"></i>
						Batal
					</a>
				</div>
			</div>
		</form>
	</div>
</body>
</html>
