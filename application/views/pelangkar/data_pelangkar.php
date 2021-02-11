  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary ">DATA PELANGGARAN KARYAWAN</h6>
          <?php if ($this->session->userdata('level') == "Admin") {
            ?>
              <div class="card-header">
                  <a href="<?php echo base_url('pelangkar/add') ?>" class="btn btn-primary btn-icon-split btn-sm" style="margin-bottom: 5px;">
                      <span class="icon text-white-10">
                          <i class="fas fa-plus"></i>
                      </span>
                      <span class="font-weight-bold text">Tambah</span></a>
              </div>
          <?php } else {;
            ?>
              <?php if ($this->session->userdata('level') == "Supervisor Security") {
                ?>
                  <div class="card-header">
                      <a href="<?php echo base_url('pelangkar/add') ?>" class="btn btn-primary btn-icon-split btn-sm" style="margin-bottom: 5px;">
                          <span class="icon text-white-10">
                              <i class="fas fa-plus"></i>
                          </span>
                          <span class="font-weight-bold text">Tambah</span></a>
                  </div>

              <?php } ?>
          <?php } ?>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="tabel" width="100%" cellspacing="3">
                  <thead>
                      <tr>
                          <th class="text-center">No</th>
                          <th class="text-center">NIK</th>
                          <th class="text-center">Nama Karyawan</th>
                          <th class="text-center">Departemen</th>

                          <th class="text-center">Ketegori</th>
                          <th class="text-center">Tanggal</th>
                          <th class="text-center">Status</th>
                          <th class="text-center">Bukti</th>
                          <th class="text-center">Aksi</th>
                      </tr>

                  </thead>
                  <tbody>
                      <?php
                        $no = 1;
                        foreach ($pelangkar as $kar) { ?>

                          <tr>
                              <td class="text-center"><?php echo $no++ ?></td>
                              <td class="text-center"><?php echo $kar->nik_karyawan ?></td>
                              <td><?php echo $kar->nama_lengkap ?></td>
                              <td class="text-center"><?php echo $kar->departemen ?></td>

                              <td class="text-center"><?= $kar->kategori ?></td>
                              <td class="text-center"><?= date('d/m/Y, H:i:s', strtotime($kar->waktu)); ?></td>
                              <td class="text-center" width="100px">
                                  <?php if ($kar->status == 'open') {
                                        echo '<p class="badge badge-primary">Open</p>';
                                    } ?>
                                  <?php if ($kar->status == 'close') {
                                        echo '<p class="badge badge-success">Close</p>';
                                    } ?>
                              </td>
                              <td class="text-center" width="100px">
                                  <a class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#modal-detail<?= $kar->id_pelangkar ?>"><span>
                                          <i class="fas fa-eye"></i>
                                      </span>
                                      <span class="font-weight-bold">Lihat</span></a>
                                  <!-- Modal Image -->
                                  <div class="modal fade" id="modal-detail<?= $kar->id_pelangkar ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                          <div class="modal-content">
                                              <div class="modal-body">
                                                  <img src="<?php echo base_url() . './assets/bukti/' . $kar->bukti ?>" class="img-thumbnail">
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </td>
                              <td class="text-center">
                                  <a class="text-center"><?php echo anchor('pelangkar/detail/' . $kar->id_pelanggaran, '<span class="btn btn-warning btn-sm" style="margin-bottom: 5px;"><i class="fas fa-search-plus"></i></div>') ?></a>

                                  <?php if ($this->session->userdata('level') == "Admin") { ?>
                                      <a class="text-center"><?php echo anchor('pelangkar/edit/' . $kar->id_pelanggaran, '<div class="btn btn-success btn-sm" style="margin-bottom: 5px;"><i class="fas fa-edit"></i></div>') ?></a>
                                      <a onclick="deleteConfirm('<?= base_url('pelangkar/delete/' . $kar->id_pelanggaran) ?>')" href="#!" style="margin-bottom: 5px;" class="btn btn-danger btn-sm btn-icon-split" data-toggle="tooltip" data-placement="top" title="Delete">
                                          <span class="icon text-white-5">
                                              <i class="fas fa-trash"></i>
                                          </span></a>
                                  <?php } else { ?>
                                      <?php if ($this->session->userdata('level') == "Supervisor Security") { ?>
                                          <a class="text-center"><?php echo anchor('pelangkar/edit/' . $kar->id_pelanggaran, '<div class="btn btn-success btn-sm" style="margin-bottom: 5px;"><i class="fas fa-edit"></i></div>') ?></a>
                                          <a onclick="deleteConfirm('<?= base_url('pelangkar/delete/' . $kar->id_pelanggaran) ?>')" href="#!" style="margin-bottom: 5px;" class="btn btn-danger btn-sm btn-icon-split" data-toggle="tooltip" data-placement="top" title="Delete">
                                              <span class="icon text-white-5">
                                                  <i class="fas fa-trash"></i>
                                              </span></a>
                                      <?php } ?>
                                  <?php } ?>
                              </td>
                          </tr>
                      <?php } ?>
                  </tbody>
              </table>
          </div>
      </div>
  </div>
  </div>
  </div>

  <!-- /.container-fluid -->