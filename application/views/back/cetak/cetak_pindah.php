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
        <h2><u>SURAT PENGANTAR PINDAH</u></h2>
        <?php foreach ($cetakpindah as $key => $view) { ?>
    </center>

    <center>
        <h4>No. /SKP/2021</h4>
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
                <td>TTL</td>
                <td>:</td>
                <td>
                    <?= $view->tempat_lh ?>/
                    <?= $view->tgl_lh ?>
                </td>
            </tr>

        <?php } ?>
        </tbody>
    </table>

    <p>Telah benar-benar <b>Pindah</b> dari Kelurahan Setia Mekar, Kecamatan Tambun Selatan, Kabupuaten Bekasi</P>
    <p>Demikian Surat ini dibuat, agar dapat digunakan sebagai mana mestinya.</P>
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