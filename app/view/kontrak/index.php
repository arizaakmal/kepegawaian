<!DOCTYPE html>
<html>

<head>
    <title>Data Kontrak</title>
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
                        <h2 class="mb-0">Data Kontrak</h2>
                    </div>
                    <a href="kontrak.php?action=create" class="btn btn-primary">Tambah Kontrak</a>
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
                        Terjadi kesalahan saat memproses data!
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
                                        <th>Nama Pegawai</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Tipe Kontrak</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($data)): ?>
                                        <tr>
                                            <td colspan="7" class="text-center">Tidak ada data kontrak</td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach ($data as $index => $kontrak): ?>
                                            <tr>
                                                <td><?= $index + 1 ?></td>
                                                <td><?= htmlspecialchars($kontrak['nama_pegawai']) ?></td>
                                                <td><?= date('d/m/Y', strtotime($kontrak['tgl_mulai'])) ?></td>
                                                <td><?= date('d/m/Y', strtotime($kontrak['tgl_selesai'])) ?></td>
                                                <td>
                                                    <?php
                                                    $badgeClass = '';
                                                    switch ($kontrak['tipe_kontrak']) {
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
                                                        default:
                                                            $badgeClass = 'bg-light text-dark';
                                                            break;
                                                    }
                                                    ?>
                                                    <span class="badge <?= $badgeClass ?>"><?= htmlspecialchars($kontrak['tipe_kontrak']) ?></span>
                                                </td>
                                                <td>
                                                    <?php if ($kontrak['status'] == 'Aktif'): ?>
                                                        <span class="badge bg-success">Aktif</span>
                                                    <?php else: ?>
                                                        <span class="badge bg-danger">Nonaktif</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <a href="kontrak.php?action=edit&id=<?= $kontrak['id_kontrak'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                                    <a href="kontrak.php?action=delete&id=<?= $kontrak['id_kontrak'] ?>"
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