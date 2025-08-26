<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center">
                <h1 class="display-4 mb-5 text-dark">Selamat datang di aplikasi kepegawaian!</h1>
                <p class="lead mb-5 text-muted">Sistem manajemen data kepegawaian yang mudah dan efisien</p>

                <div class="row g-4 mt-4">
                    <div class="col-md-4">
                        <div class="card bg-primary text-white h-100">
                            <div class="card-body d-flex flex-column">
                                <i class="fas fa-briefcase fa-3x mb-3"></i>
                                <h5 class="card-title">Data Jabatan</h5>
                                <p class="card-text flex-grow-1">Kelola data jabatan dan gaji pokok karyawan</p>
                                <a href="jabatan.php" class="btn btn-light btn-lg mt-auto">Kelola Jabatan</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card bg-success text-white h-100">
                            <div class="card-body d-flex flex-column">
                                <i class="fas fa-users fa-3x mb-3"></i>
                                <h5 class="card-title">Data Pegawai</h5>
                                <p class="card-text flex-grow-1">Kelola informasi dan biodata pegawai</p>
                                <a href="pegawai.php" class="btn btn-light btn-lg mt-auto">Kelola Pegawai</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card bg-warning text-white h-100">
                            <div class="card-body d-flex flex-column">
                                <i class="fas fa-file-contract fa-3x mb-3"></i>
                                <h5 class="card-title">Data Kontrak</h5>
                                <p class="card-text flex-grow-1">Kelola kontrak kerja dan status pegawai</p>
                                <a href="kontrak.php" class="btn btn-light btn-lg mt-auto">Kelola Kontrak</a>
                            </div>
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