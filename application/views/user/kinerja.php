        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ; ?>
          

          <div class="row">
              <div class="col-lg">
              <a class=h5><?= form_error('menu','<div class="alert alert-danger" role="alert">','</div>'); ?> </a>

              <?= $this->session->flashdata('message'); ?>

              <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newPgwModal">Add New Data Pegawai</a>

                <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="h5" scope="col">#</th>
                    <th class="h5" scope="col">Periode</th>
                    <th class="h5" scope="col">Aksi</th>
                </thead>
                <tbody>
                <?php $i = 1;?>
                <?php foreach ($Periode as $p ):?>
                  <tr>
                    <th class="h5" scope="row"><?= $i;?></th>
                    <td class="h5"><?= $p['Periode']; ?> </td>

                    <td class="h5">
                       <a href="<?= base_url('user/detail/'); ?> <?= $p['id']; ?>" class="badge badge-pill badge-primary">detail</a>
                      <a href="" class="badge badge-pill badge-success">edit</a>
                      <a href="" class="badge badge-pill badge-danger">delete</a>
                    
                    </td>
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
