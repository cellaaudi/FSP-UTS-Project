<?php
require('parent.php');

class Matkul extends Koneksi
{
    public function __construct($server, $user, $pass, $db)
    {
        parent::__construct($server, $user, $pass, $db);
    }

    public function getMatkul()
    {
        $matkul = [];

        $sql = "SELECT * FROM matakuliah";
        $res = $this->con->query($sql);

        while ($row = $res->fetch_assoc()) {
            $kode = $row['kode'];
            $nama = $row['nama'];

            $matkul[] = array("kode" => $kode, "nama" => $nama);
        }

        return $matkul;
    }
}
