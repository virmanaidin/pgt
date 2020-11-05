<div class="container">

    <div class="row">
        <div class="col-6">

            <h3>Penilaian Kinerja</h3>
            <?php foreach ($data ['knrj'] as $knrj ) : ?> 
            <ul>
               <li><?= $knrj['nama']; ?></li>
               <li><?= $knrj['alamat']; ?></li>
               <li><?= $knrj['email']; ?></li>
            </ul>
            <?php endforeach; ?>
        </div>
    
    </div>

</div>