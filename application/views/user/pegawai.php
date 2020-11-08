        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ; ?>
          

          <div class="row">
              <div class="col-lg">
              <a class=h5><?= form_error('menu','<div class="alert alert-danger" role="alert">','</div>'); ?> </a>

              <?= $this->session->flashdata('message'); ?>
              <?php
              if($user ['role_id'] == '1'){
              ?>
              <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newPgwModal">Add New Data Pegawai</a>
              <?php
                }
              ?>   
                <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="h5" scope="col">#</th>
                    <th class="h5" scope="col">Nama</th>
                    <th class="h5" scope="col">Status</th>
                    <th class="h5" scope="col">Pangkat</th>
                    <th class="h5" scope="col">Pendidikan</th>
                    <th class="h5" scope="col">Tanggal Lahir</th>
                    <th class="h5" scope="col">Masa Kerja</th>
                  </tr>
                </thead>
                <tbody>
                <?php $i = 1;?>
                <?php foreach ($nama as $n ):?>
                  <tr>
                    <th class="h5" scope="row"><?= $i;?></th>
                    <td class="h5"><?= $n['nama']; ?> </td>
                    <td class="h5"><?= $n['status']; ?> </td>
                    <td class="h5"><?= $n['pangkat']; ?> </td>
                    <td class="h5"><?= $n['pendidikan']; ?> </td>
                    <td class="h5"><?= $n['tgl_lahir']; ?> </td>
                    <td class="h5"><?= $n['masa_kerja']; ?> </td>

                    <?php
                    if($user ['role_id'] == '1'){
                    ?>
                    <td class="h5">
                      <a href="" class="badge badge-pill badge-success">edit</a>
                      <a href="<?= base_url('user/hapuspgw/'.$n['id']); ?>" class="badge badge-pill badge-danger">delete</a>
                    </td>
                    <?php
                    }
                    ?>  
                  </tr>

                <?php $i++;?>
                <?php endforeach;?>
                </tbody>
              </table>
              </div>
          </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

      <!-- Modal -->
      <!-- Modal -->
      <div class="modal fade" id="newPgwModal" tabindex="-1" aria-labelledby="newPgwModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="newPgwModalLabel">Add New Data Pegawai</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?= base_url('user/pegawai'); ?>" method="post">
            <div class="modal-body">
                <div class="form-group">
                  <input type="text" class="form-control" id="menu" name="nama" placeholder="Nama">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="menu" name="status" placeholder="Status">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="menu" name="pangkat" placeholder="Pangkat">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="menu" name="pendidikan" placeholder="Pendidikan">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="menu" name="tgl_lahir" placeholder="Tanggal Lahir">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="menu" name="masa_kerja" placeholder="Masa Kerja">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add</button>
            </form>
            </div>
          </div>
        </div>
      </div>
