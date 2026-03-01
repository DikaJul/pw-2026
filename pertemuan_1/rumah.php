<?php

class Rumah 
{
    var $alamat;
    var $warna;
    var $jumlahKamar;
    var $luas;

    function pintuTerbuka()
    {
        return "Pintu telah terbuka";
    }
}

$rumahSaya = new Rumah();

$rumahSaya->alamat = "Jl. Teyvat No. 06";
$rumahSaya->luas = 120; 
$rumahSaya->jumlahKamar = 2;
$rumahSaya->warna = "Merah"; 

echo $rumahSaya->pintuTerbuka();
?>
