<!DOCTYPE html>
<html>

<head>
    <title>Data Pegawai</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <a href="../public/index.php" class="btn me-3">
                    <i class="fas fa-arrow-left"></i> Home
                </a>
                <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                    <div class="d-flex align-items-center">
                        <h2 class="mb-0">Data Pegawai</h2>
                    </div>
                    <a href="pegawai.php?action=create" class="btn btn-primary">Tambah Pegawai</a>
                </div>

                <?php if (isset($_GET['success'])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php
                        switch ($_GET['success']) {
                            case 1:
                                echo "Data berhasil ditambahkan!";
                                break;
                            case 2:
                                echo "Data berhasil diupdate!";
                                break;
                            case 3:
                                echo "Data berhasil dihapus!";
                                break;
                        }
                        ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php
                        switch ($_GET['error']) {
                            case 4:
                                echo "Tidak dapat menghapus pegawai yang memiliki kontrak aktif!";
                                break;
                            default:
                                echo "Terjadi kesalahan saat memproses data!";
                                break;
                        }
                        ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Tgl Lahir</th>
                                        <th>Jabatan</th>
                                        <th>Gaji</th>
                                        <th>Kontrak</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($data)): ?>
                                        <tr>
                                            <td colspan="8" class="text-center">Tidak ada data pegawai</td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach ($data as $index => $pegawai): ?>
                                            <tr>
                                                <td><?= $index + 1 ?></td>
                                                <td><?= htmlspecialchars($pegawai['nama']) ?></td>
                                                <td><?= htmlspecialchars($pegawai['alamat']) ?></td>
                                                <td><?= date('d/m/Y', strtotime($pegawai['tgl_lahir'])) ?></td>
                                                <td><?= htmlspecialchars($pegawai['nama_jabatan']) ?></td>
                                                <td>Rp <?= number_format($pegawai['gaji'], 0, ',', '.') ?></td>
                                                <td>
                                                    <?php if ($pegawai['tipe_kontrak']): ?>
                                                        <?php
                                                        $badgeClass = '';
                                                        switch ($pegawai['tipe_kontrak']) {
                                                            case 'Tetap':
                                                                $badgeClass = 'bg-primary';
                                                                break;
                                                            case 'Kontrak':
                                                                $badgeClass = 'bg-info';
                                                                break;
                                                            case 'Magang':
                                                                $badgeClass = 'bg-warning';
                                                                break;
                                                            case 'Freelance':
                                                                $badgeClass = 'bg-secondary';
                                                                break;
                                                        }
                                                        ?>
                                                        <span class="badge <?= $badgeClass ?>"><?= $pegawai['tipe_kontrak'] ?></span>
                                                    <?php else: ?>
                                                        <span class="badge bg-light text-dark">Tidak Ada</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <a href="pegawai.php?action=edit&id=<?= $pegawai['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                                    <a href="pegawai.php?action=delete&id=<?= $pegawai['id'] ?>"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>