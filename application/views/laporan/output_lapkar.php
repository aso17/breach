<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style type="text/css">
        .line-title {
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }

        .table {
            width: 100%;
            border-spacing: 0;
            border-collapse: collapse;
        }

        .table tr:first-child th,
        .table tr:first-child td {
            border-top: 1px solid #000;
        }

        .table tr th,
        .table td {
            border-left: 1px solid #000;
        }

        .table tr th,
        .table td {
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
            padding: 4px;
            vertical-align: top;
        }

        .text-center {
            text-align: center;
        }

        .page1 {
            font-size: 16px;
            line-height: 80px;
        }

        .page2 {
            font-size: 16px;
            line-height: 110px;
        }
    </style>
</head>

<body>

    <table style="width: 100%;">
        <tr>
            <td align="center">
                <span style="Line-height: 0,2; font-weight: bold;">
                    <h1>
                        <center>
                            <font size="6" face="arial">PT MAYORA INDAH JATAKE 1</font>
                        </center>
                    </h1>
                    <center><b>
                            <center><b>Jl. Telesonic Jatake, RT.001/RW.004, Pasir Jaya,<b></center><br>
                            <center><b>Kec. Jatiuwung, Kota Tangerang, Banten 15135<b></center>
                </span>
            </td>
        </tr>
    </table>
    <hr class="line-title">
    <div>
        <div class="text-center" style="font-size: 18px;">
            <h3>Laporan Pelanggaran Karyawan</h3>
            <?php echo $subtitle ?>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIK Karyawan</th>
                    <th>Nama Karyawan</th>
                    <th>Departemen</th>
                    <th>Level</th>
                    <th>Kategori</th>
                    <th>Keterangan Pelanggaran</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($datafilter as $kar) : ?>
                    <tr>
                        <td class="text-center"><?php echo $no++ ?></td>
                        <td class="text-center"><?php echo $kar->nik_karyawan ?></td>
                        <td class="text-center"><?php echo $kar->nama_lengkap ?></td>
                        <td class="text-center"><?php echo $kar->departemen ?></td>
                        <td class="text-center"><?php echo $kar->level ?></td>
                        <td class="text-center"><?php echo $kar->kategori ?></td>
                        <td class="text-center"><?php echo $kar->keterangan ?></td>
                        <td class="text-center"><?= date('d/m/Y', strtotime($kar->waktu)); ?></td>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <p class="page2" align='right'>Tangerang,...............................</p>
    <p class="page1" align='right'>(........................................)</p>
</body>


</html>