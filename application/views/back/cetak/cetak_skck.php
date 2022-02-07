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
        <h2><u>SURAT PENGANTAR SKCK</u></h2>
        <?php foreach ($cetakskck as $key => $view) { ?>
    </center>

    <center>
        <h4>No. <?= $view->id_pend ?> /SKD/2021</h4>
    </center>

    <p>Yang bertandatangan dibawah ini Ketua RT.002 / RW. 018 Kelurahan Setia Mekar
        Kecamatan Tambun Selatan Kabupaten Bekasi, dengan ini menerangkan bahwa:
    </p>

    <table>
        <tbody>

            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>
                    <?= $view->nama ?>
                </td>
            </tr>

            <tr>
                <td>Tempat/Tanggal Lahir</td>
                <td>:</td>
                <td>
                    <?= $view->tempat_lh ?>/
                    <?= $view->tgl_lh ?>
                </td>
            </tr>

            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                    <?= $view->jekel ?>
                </td>
            </tr>

            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>
                    <?= $view->pekerjaan ?>
                </td>
            </tr>

            <tr>
                <td>Agama</td>
                <td>:</td>
                <td>
                    <?= $view->agama ?>
                </td>
            </tr>

            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>Kp. Baru RT
                    <?= $view->rt ?> RW
                    <?= $view->rw ?> Desa
                    <?= $view->desa ?> Kecamatan Tambun Selatan
                </td>
            </tr>

        <?php } ?>
        </tbody>
    </table>

    <p>Orang tersebut diatas, adalah <b>benar-benar warga kami dan berkelakuan baik di masyarakat. </b>
        Surat keterangan ini dibuat sebagai keperluan <b>pengurusan SKCK.</b>
    </p>
    <br>
    <p>Demikian surat keterangan ini kami buat, untuk dapat dipergunakan sebagaimana mestinya.</p>
    </p>
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