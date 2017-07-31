<?php 

	include 'db.php';

    if(isset($_GET["id_user"])){
        // Prepared statement untuk menghapus data
        $query = $db->prepare("DELETE FROM `users` WHERE id_user=:id_user");
        $query->bindParam(":id_user", $_GET["id_user"]);
        // Jalankan Perintah SQL
        $query->execute();
        // Alihkan ke index.php
        header("location: index.php");
    }

?>