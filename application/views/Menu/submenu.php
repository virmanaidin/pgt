        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ; ?>
          

          <div class="row">
              <div class="col-lg">
              <?php if (validation_errors()) : ?>
              <h6 class="alert alert-danger" role="alert">
              <?= validation_errors(); ?>
              </h6>
              <?php endif;?>
              <a class=h5><?= form_error('menu','<div class="alert alert-danger" role="alert">','</div>'); ?> </a>

              <?= $this->session->flashdata('message'); ?>


              <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Add New Submenu</a>


                <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="h5" scope="col">#</th>
                    <th class="h5" scope="col">Title</th>
                    <th class="h5" scope="col">Menu</th>
                    <th class="h5" scope="col">Url</th>
                    <th class="h5" scope="col">Icon</th>
                    <th class="h5" scope="col">Active</th>
                    <th class="h5" scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $i = 1;?>
                <?php foreach ($subMenu as $sm ):?>
                  <tr>
                    <th class="h5" scope="row"><?= $i;?></th>
                    <td class="h5"><?= $sm['menu']; ?> </td>
                    <td class="h5"><?= $sm['menu']; ?> </td>
                    <td class="h5"><?= $sm['url']; ?> </td>
                    <td class="h5"><?= $sm['icon']; ?> </td>
                    <td class="h5"><?= $sm['is_active']; ?> </td>

                    <td class="h5">
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
      <div class="modal fade" id="newSubMenuModal" tabindex="-1" aria-labelledby="newSubMenuModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="newSubMenuModal">Add New Sub Menu</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
            <div class="modal-body">
                <div class="form-group">
                  <input type="text" class="form-control" id="title" name="title" placeholder="Submenu Title">
                </div>
                <div class="form group">
                    <select name="menu_id" id="menu_id" class="form-control">
                        <option value="">Select Menu</option>
                        <?php foreach ($menu as $m) : ?>
                        <option value="<?= $m['id']; ?>"><?= $m['menu'];?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                <div class="form-group">
                  <input type="text" class="form-control" id="title" name="url" placeholder="Submenu url">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="title" name="icon" placeholder="Submenu icon">
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                        <label class="form-check-label" for="is_active">
                        Active?
                        </label>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add</button>
            </form>
            </div>
          </div>
        </div>
      </div>
