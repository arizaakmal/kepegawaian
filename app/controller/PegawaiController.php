<?php
require_once '../config/database.php';
require_once '../app/model/Pegawai.php';

class PegawaiController
{
    private $pegawai;

    public function __construct()
    {
        global $conn;
        $this->pegawai = new Pegawai($conn);
    }

    public function index()
    {
        $data = $this->pegawai->getAll();
        include '../app/view/pegawai/index.php';
    }

    public function create()
    {
        $jabatan = $this->pegawai->getAllJabatan();
        include '../app/view/pegawai/create.php';
    }

    public function store()
    {
        if ($_POST) {
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $tgl_lahir = $_POST['tgl_lahir'];
            $id_jabatan = $_POST['id_jabatan'];

            if ($this->pegawai->create($nama, $alamat, $tgl_lahir, $id_jabatan)) {
                header('Location: pegawai.php?success=1');
                exit();
            } else {
                header('Location: pegawai.php?error=1');
                exit();
            }
        }
    }

    public function edit($id)
    {
        $data = $this->pegawai->getById($id);
        $jabatan = $this->pegawai->getAllJabatan();
        include '../app/view/pegawai/edit.php';
    }

    public function update($id)
    {
        if ($_POST) {
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $tgl_lahir = $_POST['tgl_lahir'];
            $id_jabatan = $_POST['id_jabatan'];

            if ($this->pegawai->update($id, $nama, $alamat, $tgl_lahir, $id_jabatan)) {
                header('Location: pegawai.php?success=2');
                exit();
            } else {
                header('Location: pegawai.php?error=2');
                exit();
            }
        }
    }

    public function delete($id)
    {
        if ($this->pegawai->delete($id)) {
            header('Location: pegawai.php?success=3');
            exit();
        } else {
            header('Location: pegawai.php?error=4'); // Error: has active contract
            exit();
        }
    }
}
