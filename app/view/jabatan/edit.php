<!DOCTYPE html>
<html>

<head>
    <title>Edit Jabatan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Edit Jabatan</h4>
                    </div>
                    <div class="card-body">
                        <form action="jabatan.php?action=update&id=<?= $data['id'] ?>" method="POST">
                            <div class="mb-3">
                                <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
                                <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan"
                                    value="<?= htmlspecialchars($data['nama_jabatan']) ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="gaji" class="form-label">Gaji</label>
                                <input type="number" class="form-control" id="gaji" name="gaji"
                                    value="<?= $data['gaji'] ?>" required>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="jabatan.php" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>