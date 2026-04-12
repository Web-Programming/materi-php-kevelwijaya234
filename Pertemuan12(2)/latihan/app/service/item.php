<?php
    namespace app\service;
    class Item {
        public $nama;
        public function __construct($nama){
            $this->nama = $nama;
        }
        public function info(){
            return "Service". $this-> nama;
        }
    }
?>