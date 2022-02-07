<?php
$tgl = date("d/m/y");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>CETAK SURAT</title>
</head>

<body>
    <center>
        <h2><u>SURAT KETERANGAN MENINGGAL DUNIA</u></h2>
        <?php foreach ($cetakmendu as $key => $view) { ?>
    </center>

    <center>
        <h4>No. <?= $view->id_mendu ?> /SKMD/2021</h4>
    </center>

    <p>Yang bertandatangan dibawah ini Ketua RT.002 / RW. 018 Kelurahan Setia Mekar
        Kecamatan Tambun Selatan Kabupaten Bekasi, dengan ini menerangkan bahwa:
    </p>

    <table>
        <tbody>

            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>
                    <?= $view->nik ?>
                </td>
            </tr>

            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>
                    <?= $view->nama ?>
                </td>
            </tr>

            <tr>
                <td>Tanggal Kematian</td>
                <td>:</td>
                <td>
                    <?= $view->tgl_mendu ?>
                </td>
            </tr>

            <tr>
                <td>Sebab</td>
                <td>:</td>
                <td>
                    <?= $view->sebab ?>
                </td>
            </tr>

        <?php } ?>
        </tbody>
    </table>

    <p>Benar-benar telah
        <b>Meninggal Dunia</b>, pada waktu yang telah disebutkan diatas.
    </P>
    <p>Demikian Surat ini dibuat, agar dapat digunakan sebagaimana mestinya.</P>
    <br>
    <br>
    <br>
    <br>
    <br>

    <body>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        Setia Mekar,
        <?php echo $tgl; ?>
        <br>&emsp;&emsp;&emsp; KETUA RW 018
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        &emsp; &emsp;
        KETUA RT 002/018
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>(....................................................)
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        &emsp;&emsp;

        (....................................................)
    </body>

    <script>
        window.print();
    </script>

</body>

</html>