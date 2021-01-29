<div class="card shadow mb-4">
    <div class="container">
        <div class="panel">
            <div class="panel-heading">
                <br>
                <h3 class="m-0 font-weight-bold text-primary">Laporan Periode Pelanggaran Visitor</h3>
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
                                    <input type="date"
                                        class="form-control <?php echo form_error('tanggalawal') ? 'is-invalid' : '' ?>"
                                        id="tanggalawal" name="tanggalawal" placeholder="tanggal awal">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('tanggalawal') ?>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <br>
                                    <input type="date"
                                        class="form-control <?php echo form_error('tanggalakhir') ? 'is-invalid' : '' ?>"
                                        id="tanggalakhir" name="tanggalakhir" placeholder="tanggal akhir">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('tanggalakhir') ?>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <br />
                                <button type="submit" class="btn btn-primary btn-icon-split float-right"
                                    style="margin-right: 5px;"><span class="icon text-white-5">
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
                <h5>Data laporan pelanggaran dari <b><?= date('d F Y', strtotime($tanggalawal)); ?></b> sampai
                    <b><?= date('d F Y', strtotime($tanggalakhir)); ?><b></b>
                </h5>
            </div>
            <br>
            <div class="panel-body">
                <a href="<?php echo base_url('cetak_lapvis/mypdf/') . $tanggalawal . "/" . $tanggalakhir ?>"
                    class="btn btn-warning btn-icon-split btn-sm" target="_BLANK" style="margin-bottom: 5px;">
                    <span class="icon text-white-10"><i class="fa fa-file-pdf"></i>
                    </span>
                    <span class="font-weight-bold text">PDF</span></a>
                <br>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="3">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">ID VISITOR</th>
                                    <th class="text-center">Nama Lengkap</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center">Perusahaan</th>
                                    <th class="text-center">Kriteria Pelanggaran</th>
                                    <th class="text-center">Kronologis Pelanggaran</th>
                                    <th class="text-center">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($datafilter as $visit) : ?>
                                <tr>
                                    <td class="text-center"><?php echo $no++ ?></td>
                                    <td class="text-center"><?php echo $visit->id_visitor ?></td>
                                    <td class="text-center"><?php echo $visit->nama_visitor ?></td>
                                    <td class="text-center"><?php echo $visit->alamat ?></td>
                                    <td class="text-center"><?php echo $visit->nama_perusahaan ?></td>
                                    <td class="text-center"><?php echo $visit->kategori ?></td>
                                    <td class="text-center"><?php echo $visit->keterangan ?></td>
                                    <td class="text-center"><?= date('d-m-Y', strtotime($visit->waktu)); ?></td>
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