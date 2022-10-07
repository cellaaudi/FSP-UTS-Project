<?php
require_once('parent.php');

class Peserta extends Koneksi
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertPeserta($id, $nilai, $postnilai)
    {
        $kodexnrp = explode("-", $id);

        $sql = "INSERT INTO peserta VALUES(?, ?, ?)";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param('ssi', $kodexnrp[0], $kodexnrp[1], $nilai);

        foreach ($postnilai as $key => $kodexnrp[1]) {
            $nilai = $postnilai[$key];

            $stmt->execute();
        }
        // $res = $this->con->query($sql);

    //     while ($row = $res->fetch_assoc()) {
    //         $nrp = $row['nrp'];
    //         $nama = $row['nama'];

    //         $mahasiswa[] = array("nrp" => $nrp, "nama" => $nama);
    //     }

    //     return $mahasiswa;
    }
}