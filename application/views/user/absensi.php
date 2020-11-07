        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
            <?php
              if($user ['role_id'] == '2'){
            ?>
              <h1 class="h3 mb-4 text-gray-800"><?= $title ." : ". $user ['name']; ?> 
            <?php
              }else{
            ?>
              <h1 class="h3 mb-4 text-gray-800"><?= $title ?> 
            <?php
              }
            ?>
          
          <div class="row">
              <div class="col-lg">
              <a class=h5><?= form_error('menu','<div class="alert alert-danger" role="alert">','</div>'); ?> </a>

              <?= $this->session->flashdata('message'); ?>
              
              <form action="<?= base_url('user/absensi'); ?>" method="post">
                <div hidden class="modal-body">
                    <div class="form-group">
                      <input type="text" class="form-control" id="nama" name="nama" value="<?= $user ['name'];?>">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?=date("Y-m-d")?>">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="jam" name="jam" 
                        value="
                          <?php 
                            date_default_timezone_set("Asia/Bangkok"); 
                            echo "" . date("h:i:sa");
                          ?>
                      ">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="user_id" name="user_id" value="<?= $user ['id'];?>" >
                    </div>
                </div>
                 <?php
                      if($user ['role_id'] == '2'){
                    ?>
                      <button type="submit" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newPgwModal">Absen</button>
                    <?php
                      }
                    ?>
  
              </form>
                <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="h5" scope="col">#</th>
                    <th class="h5" scope="col">Nama</th>
                     <?php
                      if($user ['role_id'] == '2'){
                    ?>
                      <th class="h5" scope="col">tanggal</th>
                      <th class="h5" scope="col">Jam</th>
                    <?php
                      }
                    ?>
                    <?php
                      if($user ['role_id'] == '1'){
                    ?>
                      <th class="h5" scope="col">Aksi</th>
                    <?php
                      }
                    ?>
                </thead>
                <tbody>
                <?php $i = 1;?>
                <?php foreach ($absen as $abs ):?>
                  <tr>
                    <th class="h5" scope="row"><?= $i;?></th>
                    <td class="h5"><?= $abs['nama']; ?> </td>
                    <?php
                      if($user ['role_id'] == '2'){
                    ?>
                      <td class="h5"><?= $abs['tanggal']; ?> </td>
                      <td class="h5"><?= $abs['jam']; ?> </td>
                    <?php
                      }
                    ?>
                    <?php
                      if($user ['role_id'] == '1'){
                    ?>
                    <td class="h5">
                      <a href="<?= base_url('user/detailAbsen/'.$abs['user_id']); ?>" class="badge badge-pill badge-primary">detail</a>
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

  <!-- <script type="text/javascript">
    document.getElementById('tanggal').value = Date();
  </script> -->
