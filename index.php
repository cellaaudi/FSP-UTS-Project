<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FSP-A UTS Project</title>
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
    <form action="" method="post">
        <div>
            Mata Kuliah :
            <select name="selMatkul" id="selMatkul">
                <option value=" " style="display: none;">-- Pilih Mata Kuliah --</option>
                <?php
                require('class/matakuliah.php');
                $matakuliah = new Matkul();
                $resmatkul = $matakuliah->getMatkul();

                foreach ($resmatkul as $arr) {
                    echo "<option value='" . $arr['kode'] . "' name='matkul'>" . $arr['nama'] . "</option>";
                }

                ?>
            </select>
            <input id="btnPilih" type="submit" name="btnPilih" value="Pilih">
        </div>
    </form>
    <br>
    <table>
        <thead>
            <tr>
                <td class="td-peserta">Peserta</td>
                <td class="td-nilai">E</td>
                <td class="td-nilai">D</td>
                <td class="td-nilai">C</td>
                <td class="td-nilai">BC</td>
                <td class="td-nilai">B</td>
                <td class="td-nilai">AB</td>
                <td class="td-nilai">A</td>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_POST['btnPilih'])) {
                $idMatkul = $_POST['selMatkul'];
                // print_r($_POST['selMatkul']);

                require('class/peserta.php');
                $peserta = new Peserta();
                $respeserta = $peserta->getPesertaMatkul($idMatkul);
                print_r($respeserta);

                require('class/mahasiswa.php');
                $mahasiswa = new Mahasiswa();
                $resmhs = $mahasiswa->getMahasiswa();

                // for ($j = 0; $j < count($respeserta); $j++) {
                if (!is_null($respeserta)) {

                    // cek mahasiswa dari table peserta yang nilenya gak null, baru bakal di echo
                    // maybe foreach duluan baru if else, di else di break
                    // foreach harusnya cuma di mhs yang nilai nya gak null di kode matkul ini
                    foreach ($resmhs as $arr) {
                        echo "<tr>";
                        echo "<td class='td-peserta'>" . $arr['nrp'] . " - " . $arr['nama'] . "</td>";

                        for ($i = 0; $i < 7; $i++) {
                            echo "<td>";
                            echo "tes";
                            echo "</td>";
                        }

                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td class='td-empty' colspan='8'><i>Tidak Ada Peserta untuk Mata Kuliah ini</i></td></tr>";
                }
                // }
            } else {
                echo "<tr><td class='td-empty' colspan='8'><i>Mata Kuliah belum ditentukan</i></td></tr>";
            }

            ?>
        </tbody>
    </table>
    <br><br>
    <form action="ubahpeserta.php" method="post">
        <input type="submit" value="Ubah Peserta">
    </form>

    <script type="text/javascript" src="js/fsp.js"></script>
</body>

</html>