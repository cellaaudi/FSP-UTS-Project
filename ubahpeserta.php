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
                // $i = 1;

                foreach ($resmhs as $arr) {
                    echo "<tr id='" . $arr['nrp'] . "'>";
                    echo "<td class='td-peserta'>" . $arr['nrp'] . " - " . $arr['nama'] . "</td>";

                    foreach ($resmatkul as $arr2) {
                        echo "<td><input id='" . $arr2['kode'] . "-" . $arr['nrp'] . "' type='number' name='nilai[]'></td>";

                        // $i++;
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
        $data = array();

        $totalCell = count($resmatkul) * count($resmhs);

        var_dump($_POST['nilai']);
        echo "<br><br>";

        foreach ($resmhs as $arr) {
            foreach ($resmatkul as $arr2) {
                echo "<p>";
                echo $arr2['kode'] . " - " . $arr['nrp'] . " ";

                for ($i = 0; $i < $totalCell; $i++) {
                    echo $_POST['nilai'][$i] . "<br>";
                }

                echo "</p>";
            }
        }

        // for ($i = 0; $i < $totalCell; $i++) {
        //     foreach ($resmhs as $arr) {
        //         foreach ($resmatkul as $arr2) {
        //             echo "<p>";
        //             echo $arr2['kode'] . " - " . $arr['nrp'] . " ";
        //             echo $_POST['nilai'][$i] . "<br>";
        //             echo "</p>";
        //         }
        //     }
        // }

        // require('class/peserta.php');
        // $peserta = new Peserta();

        // foreach ($resmhs as $arr) {
        //     foreach ($resmatkul as $arr2) {

        //     }
        // }

        // $peserta->insertPeserta($_POST['nilai'])
    }

    ?>
</body>

</html>