<div class="card shadow mb-4">
    <div class="container">
        <div class="panel">
            <div class="panel-heading">
                <br>
                <h3 class="m-0 font-weight-bold text-primary">Laporan Periode Pelanggaran Karyawan</h3>
                <br>
            </div>
            <div class="panel-body">

                <form action="" method="post">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Dari Tanggal</th>
                            <th>Sampai Tanggal</th>
                            <th width="1%"></th>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <br>
                                    <input type="date" class="form-control <?php echo form_error('tanggalawal') ? 'is-invalid' : '' ?>" id="tanggalawal" name="tanggalawal" placeholder="tanggal awal">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('tanggalawal') ?>
                                    </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <br>
                                    <input type="date" class="form-control <?php echo form_error('tanggalakhir') ? 'is-invalid' : '' ?>" id="tanggalakhir" name="tanggalakhir" placeholder="tanggal akhir">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('tanggalakhir') ?>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <br />
                                <button type="submit" class="btn btn-primary btn-icon-split float-right" style="margin-right: 5px;"><span class="icon text-white-5">
                                        <i class="fas fa-sort-numeric-down"></i></span>
                                    <span class="font-weight-bold text">Filter</span></a></button>
                            </td>
                        </tr>

                    </table>
                </form>

            </div>
        </div>
        <br />
        <?php
        if ($datafilter != NULL) { ?>
            <div class="panel">
                <div class="panel-heading">
                    <h5>Data laporan pelanggaran dari <b><?= date('d F Y', strtotime($tanggalawal)); ?></b> sampai <b><?= date('d F Y', strtotime($tanggalakhir)); ?><b></b></h5>
                </div>
                <br>
                <div class="panel-body">
                    <a href="<?php echo base_url('cetak/pdf/') . $tanggalawal . "/" . $tanggalakhir ?>" class="btn btn-warning btn-icon-split btn-sm" target="_BLANK" style="margin-bottom: 5px;">
                        <span class="icon text-white-10"><i class="fa fa-file-pdf"></i>
                        </span>
                        <span class="font-weight-bold text">PDF</span></a>
                    <br />
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="3">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">NIK Karyawan</th>
                                        <th class="text-center">Nama Karyawan</th>
                                        <th class="text-center">Departemen</th>
                                        <th class="text-center">Kriteria Pelanggaran</th>
                                        <th class="text-center">Kronologis Pelanggaran</th>
                                        <th class="text-center">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($datafilter as $kar) : ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++ ?></td>
                                            <td class="text-center"><?php echo $kar->nik_karyawan ?></td>
                                            <td class="text-center"><?php echo $kar->nama_karyawan ?></td>
                                            <td class="text-center"><?php echo $kar->departemen ?></td>
                                            <td class="text-center"><?php echo $kar->kriteria ?></td>
                                            <td class="text-center"><?php echo $kar->ket_pelanggaran ?></td>
                                            <td class="text-center"><?= date('d-m-Y', strtotime($kar->waktu)); ?></td>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>