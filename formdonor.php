<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <?php
    require_once("navigation_bar.html");
    require_once("donor_controller.php");


    $golongan_darah_list = getGolDarahList();
    ?>

    <form class="form" action="formdonor.php" method="post">
        <select name="rumah_sakit" id="rumah_sakit" required>
            <option value="" disabled selected>Pilih Rumah Sakit</option>

            <?php
            $rumah_sakit_list = getRumahSakitList();

            foreach ($rumah_sakit_list as $rumah_sakit) {
            ?>
                <option value="<?= $rumah_sakit ?>"><?= $rumah_sakit ?></option>
            <?php
            }
            ?>
        </select>

        <select name="golongan_darah" id="golongan_darah" required>
            <option value="" disabled selected>Pilih Golongan Darah</option>

            <?php
            $golongan_darah_list = getGolDarahList();

            foreach ($golongan_darah_list as $golongan_darah) {
            ?>
                <option value="<?= $golongan_darah ?>"><?= $golongan_darah ?></option>
            <?php
            }
            ?>
        </select>

        <!-- <input type="text" name="rumah_sakit" placeholder="Rumah Sakit">
        <input type="text" class="form-field animation a4" name="golongan_darah" placeholder="Golongan Darah"> -->

        <input class="form-button animation a6" type="submit" name="submit" value="SUBMIT">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $rs = $_POST['rumah_sakit'];
        $gol_darah = $_POST['golongan_darah'];

        createDonor($rs, $gol_darah);
        // header("location: index.php");
    }
    ?>
</body>

</html>