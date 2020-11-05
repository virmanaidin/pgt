        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ; ?>
          

          <div class="row">
              <div class="col-lg">
                <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="h5" scope="col">#</th>
                    <th class="h5" scope="col">Periode</th>
                    <th class="h5" scope="col">Kriteria</th>
                    <th class="h5" scope="col">Penilaian</th>
                    <th class="h5" scope="col">Keterangan</th>
                    
                  </tr>
                </thead>
                <tbody>
                <?php $i = 1;?>
                <?php foreach ($Periode as $p ):?>
                  <tr>
                    <th class="h5" scope="row"><?= $i;?></th>
                    <td class="h5"><?= $p['Periode']; ?> </td>
                    <td class="h5"><?= $p['kriteria']; ?> </td>
                    <td class="h5"><?= $p['penilaian']; ?> </td>
                    <td class="h5"><?= $p['keterangan']; ?> </td>
                    
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
