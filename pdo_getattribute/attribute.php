<?php 

	require 'conn.php';

	echo $conn->getAttribute(PDO::ATTR_CONNECTION_STATUS);

// 	$conn->setAttribute();
// ?>