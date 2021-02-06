<div class="container-fluid">
    <div class="card">
        <h5 class="card-header">Detail Pelanggaran Visitor</h5>
        <div class="card-body">

            <?php

            ?>
            <div class="row">
                <div class="col-md-5">
                    <img src="<?php echo base_url() . './assets/bukti/' . $pelangvis->bukti ?>" class="img-thumbnail">
                </div>
                <div class="col-md-7">
                    <table class="table table-bordered" width="100%" cellspacing="1">
                        <tr>
                            <td> NIK KTP </td>
                            <td><strong> <?php echo $pelangvis->no_ktp ?></strong></td>
                        </tr>
                        <tr>
                            <td> Nama Visitor </td>
                            <td><strong> <?php echo $pelangvis->nama_visitor ?></strong></td>
                        </tr>
                        <tr>
                            <td> id visitor </td>
                            <td><?php echo $pelangvis->id_visitor ?></td>
                        </tr>
                        <tr>
                            <td> Alamat </td>
                            <td><?php echo $pelangvis->alamat ?></td>
                        </tr>
                        <tr>
                            <td> Kategori Pelanggaran </td>
                            <td><?php echo $pelangvis->kategori ?></td>
                        </tr>
                        <tr>
                            <td> Keterangan Pelanggaran </td>
                            <td><?php echo $pelangvis->keterangan ?></td>
                        </tr>
                        <tr>
                            <td> Tanggal </td>
                            <td><?= date('d F Y', strtotime($pelangvis->waktu)); ?></td>
                        </tr>
                        <tr>
                            <td> Status </td>
                            <td><?php if ($pelangvis->status == 'open') {
                                    echo '<a href="" class="badge badge-primary">Open</a>';
                                } ?>
                                <?php if ($pelangvis->status == 'close') {
                                    echo '<a href="" class="badge badge-success">Close</a>';
                                } ?></td>
                        </tr>
                    </table>
                    <div>
                        <a href="<?php echo base_url('pelangvis') ?>"
                            class="btn btn-primary btn-icon-split btn-sm float-right" style="margin-bottom: 5px;"><span
                                class="icon text-white-10">
                                <i class="fas fa-arrow-circle-left"></i></span>
                            <span class="font-weight-bold text">Kembali</span></a>

                        <?php if ($this->session->userdata('level') == "DH IRGA") : ?>
                        <?php if ($pelangvis->status != 'close') : ?>
                        <a href="<?php echo base_url('pelangvis/status_close/' . $pelangvis->id_pelanggaran) ?>"
                            class="btn btn-success btn-icon-split btn-sm float-right" style="margin-right: 5px;"><span
                                class="icon text-white-5">
                                <i class="fas fa-check-double"></i></span>
                            <span class="font-weight-bold text">Review</span></a>
                        <?php endif ?>
                        <?php endif ?>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
</div>
</div>