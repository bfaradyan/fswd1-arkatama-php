<?php
include "connection.php";

if(isset($_POST['submit'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $role = $_POST['role'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $password = $_POST['password'];

  $avatar = $_FILES['avatar']['name'];
  if($avatar != "") {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($avatar);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["avatar"]["tmp_name"]);
      if($check !== false) {
        $uploadOk = 1;
      } else {
        $uploadOk = 0;
      }
    }

    if ($_FILES["avatar"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    } else {
      if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
        $sql = "UPDATE users SET name='$name', email='$email', role='$role', phone='$phone', address='$address', password='$password', avatar='$avatar' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
          header("Location: readuser.php");
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }        
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
  } else {
    $sql = "UPDATE users SET name='$name', email='$email', role='$role', phone='$phone', address='$address', password='$password' WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
      header("Location: readuser.php");
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }

}

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM users WHERE id='$id'";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
  } else {
    echo "Data tidak ditemukan";
  }
}
mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Data User</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
    <h1>Edit Data User</h1>
    <form method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
      <div class="form-group">
        <label for="name">Nama:</label>
        <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>" required>
      </div>
      <div class="form-group">
        <label for="role">Role:</label>
        <select class="form-control" name="role">
          <option value="admin" <?php if($row['role'] == 'admin') echo 'selected' ?>>Admin</option>
          <option value="user" <?php if($row['role'] == 'user') echo 'selected' ?>>User</option>
        </select>
      </div>
      <div class="form-group">
        <label for="phone">No. Telepon:</label>
        <input type="tel" class="form-control" name="phone" value="<?php echo $row['phone'] ?>" required>
      </div>
      <div class="form-group">
        <label for="address">Alamat:</label>
        <textarea class="form-control" name="address" required><?php echo $row['address'] ?></textarea>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" required>
      </div>
      <div class="form-group">
        <label for="avatar">Avatar:</label>
        <input type="file" class="form-control-file" name="avatar">
      </div>
      <div class="form-group">
        <img src="uploads/<?php echo $row['avatar'] ?>" class="img-thumbnail" width="150px">
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Update</button>
      <br><br>
    </form>
  </div>
</body>
</html>