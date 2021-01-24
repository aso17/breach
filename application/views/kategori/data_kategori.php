<!-- DataTales Example -->
<div class="card shadow mb-4">
  <!-- Card Header - Dropdown -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">KATEGORI PELANGGARAN</h6>
    <a href="<?php echo base_url('kategori/add') ?>" class="btn btn-primary btn-icon-split">
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
            <th class="text-center">Kategori Pelanggaran</th>
            <th class="text-center" colspan='3'>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($kategori as $kat) { ?>
            <tr>
              <td class="text-center"><?php echo $no++ ?></td>
              <td class="text-center"><?php echo $kat->kategori ?></td>

              <td class="text-center">
                <a class="text-center"><?php echo anchor('kategori/edit/' . $kat->id_kategori, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>') ?></a>
              </td>
              <td class="text-center"><a onclick="deleteConfirm('<?= base_url('kategori/delete/'  . $kat->id_kategori) ?>')" href="#!" style="margin-bottom: 5px;" class="btn btn-danger btn-sm btn-icon-split" data-toggle="tooltip" data-placement="top" title="Delete">
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