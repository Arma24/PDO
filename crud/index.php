<?php  
    include 'db.php';

    // Buat prepared statement untuk mengambil semua data dari tbBiodata
    $query = $db->prepare("SELECT * FROM `users` WHERE `show` = 1");
    // Jalankan perintah SQL
    $query->execute();
    // Ambil semua data dan masukkan ke variable $data
    $data = $query->fetchAll();
?>

<style>
tbody > tr:nth-child(2n+1)>td, tbody > tr:nth-child(2n+1)>th{
background-color:#eeeeee;
}
table{
width:50%;
margin:auto;
border-collapse:collapse;
box-shadow:darkgrey 3px;
}
thead tr{
background-color:#B7B7B7;
}
</style>

<!DOCTYPE html> 
<html>  
    <head>
        <meta charset="utf-8">
        <title>Daftar User</title>
    </head>
    <body>
        <h1 align="center">Daftar User</h1>
        <a href="create.php"><button type="button">Tambah Data</button></a>
        <table border="1">
            <tr>
                <th>
                    ID User
                </th>
                <th>
                    Nama
                </th>
                <th>
                    Password
                </th>
                <th>
                    Aksi
                </th>
            </tr>
            <!-- Perulangan Untuk Menampilkan Semua Data yang ada di Variable Data -->
            <?php foreach ($data as $value): ?>
                <tr>
                    <td>
                        <?php echo $value['id_user'] ?>
                    </td>
                    <td>
                        <?php echo $value['nama'] ?>
                    </td>
                    <td>
                        <?php echo $value['password'] ?>
                    </td>
                    <td>
                        <a href="edit.php?id_user=<?php echo $value['id_user']?>">Edit</a>
                        <a href="delete.php?id_user=<?php echo $value['id_user']?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>