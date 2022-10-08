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
    <form action="" method="POST">
        <table>
            <thead>
                <tr>
                    <td class="td-peserta">Peserta</td>
                    <?php
                    require('class/matakuliah.php');
                    $matakuliah = new Matkul();
                    $resmatkul = $matakuliah->getMatkul();

                    foreach ($resmatkul as $arr) {
                        echo "<td class='td-matkul'>" . $arr['kode'] . " - " . $arr['nama'] . "</td>";
                    }

                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                require('class/mahasiswa.php');
                $mahasiswa = new Mahasiswa();
                $resmhs = $mahasiswa->getMahasiswa();

                require('class/peserta.php');
                $peserta = new Peserta();

                foreach ($resmhs as $arr) {
                    echo "<tr>";
                    echo "<td class='td-peserta'>" . $arr['nrp'] . " - " . $arr['nama'] . "</td>";

                    $respeserta = $peserta->getPeserta($arr['nrp']);

                    foreach ($respeserta as $arr2) {
                        echo "<td>";
                        echo "<input type='number' name='nilai[]' value='" . $arr2['nilai'] . "' value=NULL>";
                        echo "<input type='hidden' name='pkkode[]' value='" . $arr2['kode'] . "'/>";
                        echo "<input type='hidden' name='pknrp[]' value='" . $arr['nrp'] . "'/>";
                        echo "</td>";
                    }

                    echo "</tr>";
                }

                ?>
            </tbody>
        </table>
        <br><br>
        <input id="btnSimpan" name="simpan" type="submit" value="Simpan">
    </form>

    <?php
    if (isset($_POST['simpan'])) {
        // print_r($_POST['nilai']);
        // echo "<br><br>";
        // print_r($_POST['pkkode']);
        // echo "<br><br>";
        // print_r($_POST['pknrp']);

        for ($i = 0; $i < count($_POST['nilai']); $i++) {
            if (!empty($_POST['nilai'][$i])) {
                $peserta->updatePeserta($_POST['nilai'][$i], $_POST['pkkode'][$i], $_POST['pknrp'][$i]);
            } else {
                $peserta->updatePeserta(NULL, $_POST['pkkode'][$i], $_POST['pknrp'][$i]);
            }
        }

        echo "<meta http-equiv='refresh' content='0'>";
    }

    ?>
</body>

</html>