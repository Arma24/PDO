<?php 

class Produk {
    public $nama;
    
    function __construct($nama){
        $this->nama = $nama;
        echo 'Ini adalah constructor : '. $nama;
    }
}

// file proses
$namaproduk = new Produk('saya');

?>