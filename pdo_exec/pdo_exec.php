<?php
$dbh = new PDO('mysql:host=localhost;dbname=pdoconstruct', "root", "");

/* Delete all rows from the FRUIT table */
$count = $dbh->exec("DELETE FROM table WHERE nama = 'Arma'");

/* Return number of rows that were deleted */
print("Deleted $count rows.\n");
?>