<?php 

$namaServer = "localhost"; 
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$namaServer;dbname=pdoconnection", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$stmt = $conn->prepare("SELECT id_user, nama, password FROM users");
    $stmt->execute();
	
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
	
    $result = $stmt->fetchAll();
	if($result != null)
	{
		foreach($result as $row=>$value) {
			echo "ID User : " . $value["id_user"]. " - Nama : " . $value["nama"]. "- Password : " . $value["password"]. " <br>";
		}
	}
	else
	{
		echo "0 Hasil";
	}
    }
		catch(PDOException $e)
    {
    echo "Error : " . $e->getMessage();
    }
	
$conn = null;
?>