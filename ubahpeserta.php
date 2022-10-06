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

                foreach ($resmhs as $arr) {
                    echo "<tr>";
                    echo "<td class='td-peserta'>" . $arr['nrp'] . " - " . $arr['nama'] . "</td>";

                    foreach ($resmatkul as $arr2) {
                        echo "<td><input id='" . $arr['nrp'] . "-" . $arr2['kode'] ."' type='number'></td>";
                    }

                    echo "</tr>";
                }

                ?>
            </tbody>
        </table>
        <br><br>
        <input id="btnSimpan" type="button" value="Simpan">
    </form>
</body>

</html>