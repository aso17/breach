<!-- DataTales Example -->
<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Kunjungan</h6>
        <a href="<?php echo base_url('kunjungan/add') ?>" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah</span></a>
    </div>


    <div class="card-body">
        <div class="table-responsive">

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
                        <th class="text-center">Jam Masuk</th>
                        <th class="text-center">Jam Keluar</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($kunjungan as $kun) : ?>
                    <tr>
                        <td class="text-center"><?php echo $i++ ?></td>
                        <td class="text-center"><?php echo $kun->no_ktp ?></td>
                        <td class="text-center"><?php echo $kun->nama_visitor ?></td>
                        <td class="text-center"><?php echo $kun->alamat ?></td>
                        <td class="text-center"><?php echo $kun->nama_perusahaan ?></td>
                        <td class="text-center"><?php echo $kun->no_kendaraan ?></td>
                        <td class="text-center"><?php echo $kun->bertemu ?></td>
                        <td class="text-center"><?php echo $kun->jam_masuk ?></td>
                        <?php if ($kun->jam_keluar == true) { ?>
                        <td class="text-center"><?php echo $kun->jam_keluar ?></td>
                        <?php } else { ?>
                        <td class="text-center"> <button id="exitmodal" data-toggle="modal" data-target="#modal-exit"
                                data-idkun="<?= $kun->id_kunjungan ?>" class=" btn btn-light btn-sm btn-sm "><i
                                    class=" fas fa-sign-out-alt text-danger"></i>
                                kunjungan
                                exit</button>
                        </td>
                        <?php } ?>
                        <td class=" text-center">
                            <a
                                class="text-center"><?php echo anchor('kunjungan/edit/' . $kun->id_kunjungan, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>') ?></a>
                            <a onclick="deleteConfirm('<?= base_url('kunjungan/delete/'  . $kun->id_kunjungan) ?>')"
                                href="#!" style="margin-bottom: 5px;" class="btn btn-danger btn-sm btn-icon-split"
                                data-toggle="tooltip" data-placement="top" title="Delete">
                                <span class="icon text-white-5">
                                    <i class="fas fa-trash"></i>
                                </span></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
<div class="modal fade" id="modal-exit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-light">
                <h5 class="modal-title" id="exampleModalLabel">Kunjungan Exit</h5>
                <button type="button " class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('kunjungan/out') ?>">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_kunjungan" name="id_kunjungan">
                        <label for="recipient-name" class="col-form-label">Tanggal dan waktu</label>
                        <input type="Datetime-local" class="form-control" id="jam_keluar" name="jam_keluar" required>
                    </div>

                    <div class="modal-footer">

                        <button name="submit" type="submit" class="btn btn-dark">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $(document).on('click', '#exitmodal', function() {
        const id = $(this).data('idkun');
        $('#id_kunjungan').val(id);

    })
})
</script>