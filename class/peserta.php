<?php
require_once('parent.php');

class Peserta extends Koneksi
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getPeserta() {
        $peserta = [];

        $sql = "SELECT * FROM peserta";
        $res = $this->con->query($sql);
        // $stmt = $this->con->prepare($sql);
        // $stmt->bind_param("ss", $kode, $nrp);
        // $stmt->execute();
        // $res = $stmt->get_result();

        while ($row = $res->fetch_assoc()) {
            $kode = $row['kode'];
            $nrp = $row['nrp'];
            $nilai = $row['nilai'];

            $peserta[] = array("kode" => $kode, "nrp" => $nrp, "nilai" => $nilai);
        }

        return $peserta;
    }

    public function getPesertaByNRP($nrp) {
        $peserta = [];

        $sql = "SELECT * FROM peserta WHERE nrp=?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $nrp);
        $stmt->execute();
        $res = $stmt->get_result();

        while ($row = $res->fetch_assoc()) {
            $kode = $row['kode'];
            $nrp = $row['nrp'];
            $nilai = $row['nilai'];

            $peserta[] = array("kode" => $kode, "nrp" => $nrp, "nilai" => $nilai);
        }

        return $peserta;
    }

    public function getPesertaByKode($kode) {
        $peserta = [];

        $sql = "SELECT p.nrp, mhs.nama, p.nilai FROM peserta p INNER JOIN mahasiswa mhs ON p.nrp=mhs.nrp WHERE kode=?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $kode);
        $stmt->execute();
        $res = $stmt->get_result();

        while ($row = $res->fetch_assoc()) {
            $nrp = $row['nrp'];
            $nama = $row['nama'];
            $nilai = $row['nilai'];

            $peserta[] = array("nrp" => $nrp, "nama" => $nama, "nilai" => $nilai);
        }

        return $peserta;
    }

    public function insertPeserta($nilai, $kode, $nrp)
    {
        $sql = "INSERT INTO peserta(kode, nrp, nilai) VALUES (?, ?, ?)";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("ssi", $kode, $nrp, $nilai);
        $stmt->execute();
    }

    public function updatePeserta($nilai, $kode, $nrp) 
    {
        $sql = "UPDATE peserta SET nilai=? WHERE kode=? AND nrp=?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("iss", $nilai, $kode, $nrp);
        $stmt->execute();

        // parameter panggil 1 1 jan array
        // loop di form

        // foreach ($arrnrp as $nrp) {
        //     foreach ($arrkode as $kode) {
        //         $stmt->bind_param('ssi', $kode, $nrp, $nilai);

        //         foreach ($arrkode as $key => $kode) {
        //             // foreach ($arrnrp as $key2 => $nrp) {
        //                 $nilai = $arrnilai[$key];
    
        //                 $stmt->execute();
        //             // }
        //         }
        //     }
        // }
    }

    public function deletePeserta($kode, $nrp)
    {
        $sql = "DELETE FROM peserta WHERE kode=? AND nrp=?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("ss", $kode, $nrp);
        $stmt->execute();
    }
}