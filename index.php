<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FSP-A UTS Project</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <form action="" method="post">
        <div>
            Mata Kuliah :
            <select name="selmatkul" id="">
                <option value=" " style="display: none;">-- Pilih Mata Kuliah --</option>
                <?php
                require('class/matakuliah.php');
                $matakuliah = new Matkul('localhost', 'root', '', 'fsp-uts');
                $resmatkul = $matakuliah->getMatkul();

                foreach ($resmatkul as $arr) {
                    echo "<option value='" . $arr['kode'] . "'>" . $arr['nama'] . "</option>";
                }

                ?>
            </select>
            <input type="submit" value="Pilih">
        </div>
    </form>
    <br>
    <table>
        <thead>
            <tr>
                <td>Peserta</td>
                <td>E</td>
                <td>D</td>
                <td>C</td>
                <td>BC</td>
                <td>B</td>
                <td>AB</td>
                <td>A</td>
            </tr>
        </thead>
    </table>
</body>

</html>