<!-- DataTales Example -->
<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">DATA USER</h6>
        <a href="<?php echo base_url('user/add') ?>" class="btn btn-primary btn-icon-split">
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
                        <th class="text-center">NIK</th>
                        <th class="text-center">Nama Lengkap</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Level</th>

                        <th class="text-center" colspan='2'>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
          $no = 1;
          foreach ($user as $usr) { ?>
                    <tr>
                        <td class="text-center"><?php echo $no++ ?></td>
                        <td class="text-center"><?php echo $usr->nik ?></td>
                        <td class="text-center"><?php echo $usr->nama_lengkap ?></td>
                        <td class="text-center"><?php echo $usr->username ?></td>
                        <td class="text-center"><?php echo $usr->level ?></td>

                        <td class="text-center">
                            <?php echo anchor('user/edit/' . $usr->id_user, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>') ?>
                        </td>
                        <td class="text-center"><a
                                onclick="deleteConfirm('<?= base_url('user/delete/'  . $usr->id_user) ?>')" href="#!"
                                style="margin-bottom: 5px;" class="btn btn-danger btn-sm btn-icon-split"
                                data-toggle="tooltip" data-placement="top" title="Delete">
                                <span class="icon text-white-5">
                                    <i class="fas fa-trash"></i>
                                </span></a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->