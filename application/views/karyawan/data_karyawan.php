<!-- DataTales Example -->
<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">DATA KARYAWAN</h6>
        <a href="<?php echo base_url('karyawan/add') ?>" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah</span></a>
    </div>


    <div class="card-body">
        <div class="table table-responsive">
            <table class="table table-bordered" id="tabel" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">NIK Karyawan</th>
                        <th class="text-center">Nama Karyawan</th>
                        <th class="text-center">Departemen</th>
                        <th class="text-center">Level</th>
                        <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Telepon</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($karyawan as $kar) { ?>

                        <tr>
                            <td class="text-center"><?php echo $no++ ?></td>
                            <td class="text-center"><?php echo $kar->nik_karyawan ?></td>
                            <td class="text-center"><?php echo $kar->nama_lengkap ?></td>
                            <td class="text-center"><?php echo $kar->departemen ?></td>
                            <td class="text-center"><?php echo $kar->level ?></td>
                            <td class="text-center"><?php echo $kar->j_kelamin ?></td>
                            <td class="text-center"><?php echo $kar->email ?></td>
                            <td class="text-center"><?php echo $kar->telp ?></td>
                            <td class="text-center">
                                <a class="text-center"><?php echo anchor('karyawan/edit/' . $kar->nik_karyawan, '<div class="btn btn-success btn-sm" style="margin-bottom: 5px;"><i class="fas fa-edit"></i></div>') ?></a>
                                <a onclick="deleteConfirm('<?= base_url('karyawan/delete/'  .  $kar->nik_karyawan) ?>')" href="#!" style="margin-bottom: 5px;" class="btn btn-danger btn-sm btn-icon-split" data-toggle="tooltip" data-placement="top" title="Delete">
                                    <span class="icon text-white-5">
                                        <i class="fas fa-trash"></i>
                                    </span></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->