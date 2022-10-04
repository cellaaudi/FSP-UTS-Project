<?php
require('parent.php');

class Matkul extends Koneksi {
    public function __construct($server, $user, $pass, $db)
    {
        parent::__construct($server, $user, $pass, $db);
    }

    public function getMatkul() {
        $sql = "SELECT * FROM matakuliah";
    }
}

?>