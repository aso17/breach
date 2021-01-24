<!-- DataTales Example -->
<div class="card shadow mb-4">
  <!-- Card Header - Dropdown -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">DATA PELANGGARAN VISITOR</h6>
    <?php if ($this->session->userdata('level') == 1) : ?>
      <div class="card-header">
        <a href="<?php echo base_url('pelangvis/add') ?>" class="btn btn-primary btn-icon-split btn-sm" style="margin-bottom: 5px;">
          <span class="icon text-white-10">
            <i class="fas fa-plus"></i>
          </span>
          <span class="font-weight-bold text">Tambah</span></a>
      </div>
    <?php endif ?>
  </div>


  <div class="card-body">
    <div class="table">

      <table class="table table-bordered" id="tabel" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">NIK KTP</th>
            <th class="text-center">Nama Visitor</th>
            <th class="text-center">Visitor</th>
            <th class="text-center">Tanggal</th>
            <th class="text-center">Status</th>
            <th class="text-center">Bukti</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($pelangvis as $visit) { ?>
            <tr>
              <td class="text-center"><?php echo $no++ ?></td>
              <td class="text-center"><?php echo $visit->nik_visitor ?></td>
              <td><?php echo $visit->nama_visitor ?></td>
              <td class="text-center"><?php echo $visit->visitor ?></td>
              <td class="text-center"><?= date('d-m-yy', strtotime($visit->waktu)); ?></td>
              <td class="text-center" width="100px">
                <?php if ($visit->status == 'open') {
                  echo '<a href="" class="badge badge-primary">Open</a>';
                } ?>
                <?php if ($visit->status == 'close') {
                  echo '<a href="" class="badge badge-success">Close</a>';
                } ?>
              </td>
              <td class="text-center" width="100px">
                <a class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#modal-detail<?= $visit->id_pelangvis ?>"><span>
                    <i class="fas fa-eye"></i>
                  </span>
                  <span class="font-weight-bold">Lihat</span></a>
                <!-- Modal -->
                <div class="modal fade" id="modal-detail<?= $visit->id_pelangvis ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <div class="modal-body">
                        <img src="<?= base_url() . './assets/bukti/' . $visit->bukti_pelanggaran ?>" alt="" class="img-thumbnail">
                      </div>
                    </div>
                  </div>
                </div>
              </td>

              <td class="text-center">
                <a class="text-center"><?php echo anchor('pelangvis/detail/' . $visit->id_pelangvis, '<div class="btn btn-warning btn-sm" style="margin-bottom: 5px;"><i class="fas fa-search-plus"></i></div>') ?></a>

                <?php if ($this->session->userdata('level') == 1) : ?>
                  <a class="text-center"><?php echo anchor('pelangvis/edit/' . $visit->id_pelangvis, '<div class="btn btn-success btn-sm" style="margin-bottom: 5px;"><i class="fas fa-edit"></i></div>') ?></a>
                  <a onclick="deleteConfirm('<?= base_url('pelangvis/delete/' . $visit->id_pelangvis) ?>')" href="#!" style="margin-bottom: 5px;" class="btn btn-danger btn-sm btn-icon-split" data-toggle="tooltip" data-placement="top" title="Delete">
                    <span class="icon text-white-5">
                      <i class="fas fa-trash"></i>
                    </span></a>
                <?php endif ?>
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