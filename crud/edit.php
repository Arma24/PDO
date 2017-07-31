<?php 

	include 'db.php';

    if(!isset($_GET['id_user'])){
        die("Error: ID Tidak Dimasukkan");
    }

    //Ambil data
    $query = $db->prepare("SELECT * FROM `users` WHERE id_user = :id_user");
    $query->bindParam(":id_user", $_GET['id_user']);
    // Jalankan perintah sql
    $query->execute();
    if($query->rowCount() == 0){
        // Tidak ada hasil
        die("Error: ID Tidak Ditemukan");
    }else{
        // ID Ditemukan, Ambil data
        $data = $query->fetch();
    }

    if(isset($_POST['submit'])){
        // Simpan data yang di inputkan ke POST ke masing-masing variable
        // dan convert semua tag HTML yang mungkin dimasukkan untuk mengindari XSS
        $nama = htmlentities($_POST['nama']);
        $password = htmlentities($_POST['password']);

        // Prepared statement untuk mengubah data
        $query = $db->prepare("UPDATE `users` SET `nama`=:nama,`password`=:password WHERE id_user=:id_user");
        $query->bindParam(":nama", $nama);
        $query->bindParam(":password", $password);
        $query->bindParam(":id_user", $_GET['id_user']);
        // Jalankan perintah SQL
        $query->execute();
        // Alihkan ke index.php
        header("location: index.php");
    }
?>

<!DOCTYPE html>  
<html>  
    <head>
        <meta charset="utf-8">
        <title>Edit Data</title>
    </head>
    <body>
        <h1>Edit Data</h1>
        <form method="post">
            Nama: <input required type="text" name="nama" placeholder="Nama" value="<?php echo $data['nama'] ?>"/> <br>
            Password: <input required type="text" name="password" placeholder="Password" value="<?php echo $data['password'] ?>"/> <br>
            <input type="submit" name="submit" />
        </form>
    </body>
</html> 