<?php

require_once 'connection.php';

function createCategories($connection, $name){
    

}

if (isset($_POST['submit'])) {
    $createCategories=$_POST['name'];
    $query = mysqli_query($connection, "INSERT INTO categories (name) VALUES ('$createCategories')");
    echo "Data berhasil ditambahkan";
}

?>

<form method="post" action="categories_create.php">
  
  <label for="name">Nama Kategori:</label>
  <input type="text" id="name" name="name" required>
    <br><br>  
  

  <input name= "submit" type="submit" value="Simpan">
</form>