<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FSP-A UTS Project</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
    <div class="container">
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
                        echo "<option value='" . $arr['kode'] . "' name='matkul'";

                        if (isset($_POST['btnPilih'])) {
                            if ($_POST['selMatkul'] == $arr['kode']) {
                                echo "selected";
                            }
                        }

                        echo ">" . $arr['nama'] . "</option>";
                    }

                    ?>
                </select>
                <input id="btnPilih" type="submit" name="btnPilih" value="Pilih" class="btn hover focus">
            </div>
        </form>
        <br>
        <div class="div-table">
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

                        require('class/peserta.php');
                        $peserta = new Peserta();
                        $respeserta = $peserta->getPesertaByKode($idMatkul);

                        require('class/mahasiswa.php');
                        $mahasiswa = new Mahasiswa();
                        $resmhs = $mahasiswa->getMahasiswa();

                        if (!empty($respeserta)) {
                            foreach ($respeserta as $arr) {
                                echo "<tr>";
                                echo "<td class='td-peserta'>" . $arr['nrp'] . " - " . $arr['nama'] . "</td>";

                                $na = $arr['nilai'];

                                if ($na >= 81) {
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td>$na</td>";
                                } else if ($na < 81 and $na >= 73) {
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td>$na</td>";
                                    echo "<td></td>";
                                } else if ($na < 73 and $na >= 66) {
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td>$na</td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                } else if ($na < 66 and $na >= 60) {
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td>$na</td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                } else if ($na < 60 and $na >= 55) {
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td>$na</td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                } else if ($na < 55 and $na >= 40) {
                                    echo "<td></td>";
                                    echo "<td>$na</td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                } else if ($na < 40 and $na >= 0) {
                                    echo "<td>$na</td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                }

                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td class='td-empty' colspan='8'><i>Tidak Ada Peserta untuk Mata Kuliah ini</i></td></tr>";
                        }
                    } else {
                        echo "<tr><td class='td-empty' colspan='8'><i>Mata Kuliah belum ditentukan</i></td></tr>";
                    }

                    ?>
                </tbody>
            </table>
        </div>
        <br><br>
        <form action="ubahpeserta.php" method="post">
            <input type="submit" value="Ubah Peserta" class="btn hover focus">
        </form>
    </div>
</body>

</html>