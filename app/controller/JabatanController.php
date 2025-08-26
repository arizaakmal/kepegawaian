<?php
require_once '../config/database.php';
require_once '../app/model/Jabatan.php';

class JabatanController
{
    private $jabatan;

    public function __construct()
    {
        global $conn;
        $this->jabatan = new Jabatan($conn);
    }


    public function index()
    {
        $data = $this->jabatan->getAll();
        include '../app/view/jabatan/index.php';
    }


    public function create()
    {
        include '../app/view/jabatan/create.php';
    }


    public function store()
    {
        if ($_POST) {
            $nama_jabatan = $_POST['nama_jabatan'];
            $gaji = $_POST['gaji'];

            if ($this->jabatan->create($nama_jabatan, $gaji)) {
                header('Location: jabatan.php?success=1');
                exit();
            } else {
                header('Location: jabatan.php?error=1');
                exit();
            }
        }
    }


    public function edit($id)
    {
        $data = $this->jabatan->getById($id);
        include '../app/view/jabatan/edit.php';
    }


    public function update($id)
    {
        if ($_POST) {
            $nama_jabatan = $_POST['nama_jabatan'];
            $gaji = $_POST['gaji'];

            if ($this->jabatan->update($id, $nama_jabatan, $gaji)) {
                header('Location: jabatan.php?success=2');
                exit();
            } else {
                header('Location: jabatan.php?error=2');
                exit();
            }
        }
    }


    public function delete($id)
    {
        if ($this->jabatan->delete($id)) {
            header('Location: jabatan.php?success=3');
            exit();
        } else {
            header('Location: jabatan.php?error=3');
            exit();
        }
    }
}
