<div class="container mt-4">
    <div class="row">
        <div class="col-6">
            <h3>Daftar Mahasiswa</h3>
            <!-- 2. tampilkan di viewnya
                dengan menggunakan foreach 
            -->
            <?php foreach($data['mhs'] as $mhs) : ?>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <?= $mhs['nama']; ?>
                        <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge rounded-pill bg-primary">detail</a>
                    </li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>