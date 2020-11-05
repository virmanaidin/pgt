        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ; ?>
          

          <div class="row">
              <div class="col-lg-6">

              <?= $this->session->flashdata('message'); ?>

            <h5>Role : <?= $role['role'];?> </h5>


                <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="h5" scope="col">#</th>
                    <th class="h5" scope="col">Menu</th>
                    <th class="h5" scope="col">Access</th>
                  </tr>
                </thead>
                <tbody>
                <?php $i = 1;?>
                <?php foreach ($menu as $m ):?>
                  <tr>
                    <th class="h5" scope="row"><?= $i;?></th>
                    <td class="h5"><?= $m['menu']; ?> </td>
                    <td>
                         <div class="form-check">
                             <input class="form-check-input" type="checkbox" 
                             <?= check_access($role ['id'], $m['id']); ?>
                             data-role="<? $role['id']; ?>" data-menu="<?= $m['id'];?>">
                         </div>
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
