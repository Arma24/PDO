<?php

	$host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "pdoconnection";
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $password, array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));

// try {  
//   $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//   $dbh->beginTransaction();
//   $dbh->exec("insert into table (nama_lengkap, nama_panggilan) values ('Armaningtyas', 'Arma')");
//   $dbh->commit();

// } catch (Exception $e) {
//   $dbh->rollBack();
//   echo "Failed: " . $e->getMessage();
// }

try {
    // First of all, let's begin a transaction
    $dbh->beginTransaction();

    $dbh->query('first query');
    $dbh->query('second query');
    $dbh->query('third query');

    $dbh->commit();
} catch (Exception $e) {
    $dbh->rollback();
}    
echo "Proses berhasil";

?>