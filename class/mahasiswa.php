<?php
require_once('parent.php');

class Mahasiswa extends Koneksi
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getMahasiswa()
    {
        $mahasiswa = [];

        $sql = "SELECT * FROM mahasiswa";
        $res = $this->con->query($sql);

        while ($row = $res->fetch_assoc()) {
            $nrp = $row['nrp'];
            $nama = $row['nama'];

            $mahasiswa[] = array("nrp" => $nrp, "nama" => $nama);
        }

        return $mahasiswa;
    }
}
