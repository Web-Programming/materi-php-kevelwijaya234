<?php
    namespace app\produk;
    class Item {
        public $nama;
        public function __construct($nama){
            $this->nama = $nama;
        }
        public function info(){
            return "Produk". $this-> nama;
        }
    }
?>