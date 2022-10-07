<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        1 : <input type="text" name="nilai[]"><br>
        2 : <input type="text" name="nilai[]"><br>
        3 : <input type="text" name="nilai[]"><br>
        4 : <input type="text" name="nilai[]"><br><br>
        <input type="submit" value="Test" name="test">
    </form><br><br>

    <?php
    if (isset($_POST['test'])) {
        var_dump($_POST['nilai']);
        echo "<br>";
        for ($i = 0; $i < 4; $i++) {
            if ($_POST['nilai'] !=  'string(0) ""') {
                echo $_POST['nilai'][$i] . "<br>";
            }
        }
    }

    ?>
</body>
</html>