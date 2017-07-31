<?php
    include 'db.php';

    if(isset($_POST['submit'])){
        // Simpan data yang di inputkan ke POST ke masing-masing variable
        // dan convert semua tag HTML yang mungkin dimasukkan untuk mengindari XSS
        $nama = htmlentities($_POST['nama']);
        $password = htmlentities($_POST['password']);

        // Prepared statement untuk menambah data
        $query = $db->prepare("INSERT INTO `users`(`nama`, `password`)
        VALUES (:nama,:password)");
        $query->bindParam(":nama", $nama);
        $query->bindParam(":password", $password);
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
        <title>Tambah Data</title>
    </head>
    <body>
        <h1>Tambah Data</h1>
        <form method="post">
            Nama: <input required type="text" name="nama" placeholder="Nama" /> <br>
            Password: <input required type="text" name="password" placeholder="Password" /> <br>
            <input type="submit" name="submit" />
        </form>
    </body>
</html>