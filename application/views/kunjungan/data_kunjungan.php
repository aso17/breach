<!-- DataTales Example -->
<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">DATA Kunjungan</h6>
        <a href="<?php echo base_url('kunjungan/add') ?>" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah</span></a>
    </div>


    <div class="card-body">
        <div class="table">

            <table class="table table-bordered" id="tabel" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">No KTP</th>
                        <th class="text-center">Nama Visitor</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Nama Perusahaan</th>
                        <th class="text-center">No Kendaraan</th>
                        <th class="text-center">Bertemu</th>
                        <th class="text-center">Kepentingan</th>
                        <th class="text-center">Jam Masuk</th>
                        <th class="text-center">Jam Keluar</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($kunjungan as $kun) {
                    ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center"><?= $kun->no_ktp  ?></td>
                        <td class="text-center"><?= $kun->nama_visitor ?></td>
                        <td class="text-center"><?= $kun->alamat  ?></td>
                        <td class="text-center"><?= $kun->nama_perusahaan  ?></td>
                        <td class="text-center"><?= $kun->no_kendaraan  ?></td>
                        <td class="text-center"><?= $kun->bertemu ?></td>
                        <td class="text-center"><?= $kun->kepentingan  ?></td>
                        <td class="text-center"><?= $kun->jam_masuk  ?></td>
                        <td class="text-center"><?php if ($kun->jam_keluar == null) { ?>
                            <a href="<?= base_url('kunjungan/out/') . $kun->id_kunjungan ?>">
                                <button class="btn btn-light btn-sm border-primary"><i
                                        class="fas fa-sign-out-alt text-danger"></i>
                                    kunjungan exit</button>
                            </a>
                            <?php } else {
                                                        echo $kun->jam_keluar;
                                                    } ?>
                        </td>

                        <td class="text-center">
                            <a class="text-center">
                                <div class="btn btn-success btn-sm" style="margin-bottom: 5px;"><i
                                        class="fas fa-edit"></i></div>
                            </a>
                            <a onclick="deleteConfirm('<?= base_url('kunjungan/delete/') ?>" href="#!"
                                style="margin-bottom: 5px;" class="btn btn-danger btn-sm btn-icon-split"
                                data-toggle="tooltip" data-placement="top" title="Delete">
                                <span class="icon text-white-5">
                                    <i class="fas fa-trash"></i>
                                </span></a>
                        </td>
                    </tr>
                    <?php }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->