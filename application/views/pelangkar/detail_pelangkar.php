<div class="container-fluid">
    <div class="card">
        <h5 class="card-header">Detail Pelanggaran Karyawan</h5>
        <div class="card-body">

            <?php
            ?>
            <div class="row">
                <div class="col-md-5">
                    <img src="<?php echo base_url() . './assets/bukti/' . $pelangkar->bukti ?>" class="img-thumbnail">
                </div>
                <div class="col-md-7">
                    <table class="table table-bordered" id="tabel" width="100%" cellspacing="1">
                        <tr>
                            <td> NIK Karyawan </td>
                            <td><strong><?php echo $pelangkar->nik_karyawan ?></strong></td>
                        </tr>
                        <tr>
                            <td> Nama Karyawan </td>
                            <td><strong><?php echo $pelangkar->nama_lengkap ?></strong></td>
                        </tr>
                        <tr>
                            <td> Departemen </td>
                            <td><?php echo $pelangkar->departemen ?></td>
                        </tr>
                        <tr>
                            <td> Kategori Pelanggaran </td>
                            <td><?php echo $pelangkar->kategori ?></td>
                        </tr>
                        <tr>
                            <td> Keterangan Pelanggaran </td>
                            <td><?php echo $pelangkar->keterangan ?></td>
                        </tr>
                        <tr>
                            <td> Tanggal </td>
                            <td><?= $pelangkar->waktu; ?></td>
                        </tr>
                        <tr>
                            <td> Status </td>
                            <td><?php if ($pelangkar->status == 'open') {
                                    echo '<a href="" class="badge badge-primary">Open</a>';
                                } ?>
                                <?php if ($pelangkar->status == 'close') {
                                    echo '<a href="" class="badge badge-success">Close</a>';
                                } ?></td>
                        </tr>
                    </table>
                    <div>
                        <a href="<?php echo base_url('pelangkar') ?>"
                            class="btn btn-primary btn-icon-split btn-sm float-right" style="margin-bottom: 5px;"><span
                                class="icon text-white-10">
                                <i class="fas fa-arrow-circle-left"></i></span>
                            <span class="font-weight-bold text">Kembali</span></a>
                        <?php if ($this->session->userdata('level') == "DH IRGA") : ?>
                        <?php if ($pelangkar->status != 'close') : ?>
                        <a href="<?php echo base_url('pelangkar/status_close/' . $pelangkar->id_pelanggaran) ?>"
                            class="btn btn-success btn-icon-split btn-sm float-right" style="margin-right: 5px;"><span
                                class="icon text-white-5">
                                <i class="fas fa-check-double"></i></span>
                            <span class="font-weight-bold text">Review</span></a>
                        <?php endif ?>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <?php ?>
        </div>
    </div>
</div>