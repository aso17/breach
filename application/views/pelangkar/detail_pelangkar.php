<div class="container-fluid">
    <div class="card">
        <h5 class="card-header">Detail Pelanggaran Karyawan</h5>
        <div class="card-body">

            <?php
            foreach ($pelangkar as $kar) : ?>
                <div class="row">
                    <div class="col-md-5">
                        <img src="<?php echo base_url() . './assets/bukti/' . $kar->bukti ?>" class="img-thumbnail">
                    </div>
                    <div class="col-md-7">
                        <table class="table table-bordered" id="tabel" width="100%" cellspacing="1">
                            <tr>
                                <td> NIK Karyawan </td>
                                <td><strong><?php echo $kar->nik_karyawan ?></strong></td>
                            </tr>
                            <tr>
                                <td> Nama Karyawan </td>
                                <td><strong><?php echo $kar->nama_karyawan ?></strong></td>
                            </tr>
                            <tr>
                                <td> Departemen </td>
                                <td><?php echo $kar->departemen ?></td>
                            </tr>
                            <tr>
                                <td> Kategori Pelanggaran </td>
                                <td><?php echo $kar->kriteria ?></td>
                            </tr>
                            <tr>
                                <td> Keterangan Pelanggaran </td>
                                <td><?php echo $kar->ket_pelanggaran ?></td>
                            </tr>
                            <tr>
                                <td> Tanggal </td>
                                <td><?= date('d F Y', strtotime($kar->waktu)); ?></td>
                            </tr>
                            <tr>
                                <td> Status </td>
                                <td><?php if ($kar->status == 'open') {
                                        echo '<a href="" class="badge badge-primary">Open</a>';
                                    } ?>
                                    <?php if ($kar->status == 'close') {
                                        echo '<a href="" class="badge badge-success">Close</a>';
                                    } ?></td>
                            </tr>
                        </table>
                        <div>
                            <a href="<?php echo base_url('pelangkar') ?>" class="btn btn-primary btn-icon-split btn-sm float-right" style="margin-bottom: 5px;"><span class="icon text-white-10">
                                    <i class="fas fa-arrow-circle-left"></i></span>
                                <span class="font-weight-bold text">Kembali</span></a>
                            <?php if ($this->session->userdata('level') == 3) : ?>
                                <?php if ($kar->status != 'close') : ?>
                                    <a href="<?php echo base_url('pelangkar/status_close/' . $kar->id_pelangkar) ?>" class="btn btn-success btn-icon-split btn-sm float-right" style="margin-right: 5px;"><span class="icon text-white-5">
                                            <i class="fas fa-check-double"></i></span>
                                        <span class="font-weight-bold text">Review</span></a>
                                <?php endif ?>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>