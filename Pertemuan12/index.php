<?php
// Cara pemilisan class Mobil
class Mobil {
    // Cara pemilisan property
    public $warna;
    public $merk;

    // Cara pemilisan method
    function maju() {
        return "Mobil maju";
    }

    function berhenti() {
        return "Mobil berhenti";
    }
}

// Instansiasi objek
$mobil_ahmad = new Mobil();
$mobil_anton = new Mobil();

// Set property
$mobil_ahmad->warna = "hitam";
$mobil_ahmad->merk = "Toyota";

// Tampilkan property
echo "Mobil Ahmad";
echo "<br>warna : " . $mobil_ahmad->warna;
echo "<br>Merk : " . $mobil_ahmad->merk;

// Tampilkan method
echo "<br>";
echo $mobil_ahmad->maju();
echo "<br>";
echo $mobil_ahmad->berhenti();
?>