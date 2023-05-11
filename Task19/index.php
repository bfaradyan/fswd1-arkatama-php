<?php
	include 'koneksi.php';

	$query = "SELECT * FROM tb_siswa;";
	$sql = mysqli_query($conn, $query);
	$no = 0;

	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
	integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

	
	<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" 
	integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

	<title>CRUD</title>
</head>
<body>

	<div class="container">
		<h1 class="mt-4">User Data</h1>
		<figure>
			<blockquote class="blockquote">
				<p>Berisi data yang telah disimpan di database.</p>
			</blockquote>
			<figcaption class="blockquote-footer">
				CRUD <cite title="Source Title">Create Read Update Delete</cite>
			</figcaption>
		</figure>
		<a href="kelola.php" type="button" class="btn btn-primary mb-3">
			<i class="fa fa-plus"></i>
			Tambah Data
		</a>
		<?php
		if(isset($_SESSION['hasil'])):
			$split = explode(",", $_SESSION['hasil']);
			?>
			<div class="alert alert-<?php echo $split[1];?> alert-dismissible fade show" role="alert">
				<strong><?php echo $split[0];?></strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			<?php
			session_destroy();
		endif;
		?>
		<div class="table-responsive">
			<table id="dt" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th><center>No.</center></th>
						<th>Email</th>
						<th>Name</th>
						<th>Role</th>
						<th>Avatar</th>
						<th>Address</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					while($result = mysqli_fetch_assoc($sql)){
						?>
						<tr>
							<td><center>
								<?php echo ++$no; ?>.
							</center></td>
							<td>
								<?php echo $result['email']; ?>
							</td>
							<td>
								<?php echo $result['name']; ?>
							</td>
							<td>
								<?php echo $result['role']; ?>
							</td>
							<td>
								<img src="img/<?php echo $result['avatar']; ?>" style="width: 100px;">
							</td>
							<td>
								<?php echo $result['address']; ?>
							</td>
							<td>
								<a href="kelola.php?ubah=<?php echo $result['user_id']; ?>" type="button" class="btn btn-success btn-sm">
									<i class="fa fa-pencil"></i>
								</a>
								<a href="proses.php?hapus=<?php echo $result['user_id']; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut???')">
									<i class="fa fa-trash"></i>
								</a>
							</td>
						</tr>
						<?php 
					}
					?>
				</tbody>
			</table>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
	integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

  </body>
</body>
</html>