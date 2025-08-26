<?php
require_once '../config/database.php';
require_once '../app/model/Kontrak.php';

class KontrakController
{
    private $kontrak;

    public function __construct()
    {
        global $conn;
        $this->kontrak = new Kontrak($conn);
    }

    public function index()
    {
        $data = $this->kontrak->getAll();
        include '../app/view/kontrak/index.php';
    }

    public function create()
    {
        $pegawai = $this->kontrak->getAllPegawai();
        include '../app/view/kontrak/create.php';
    }

    public function store()
    {
        if ($_POST) {
            $id_pegawai = $_POST['id_pegawai'];
            $tgl_mulai = $_POST['tgl_mulai'];
            $tgl_selesai = $_POST['tgl_selesai'];
            $tipe_kontrak = $_POST['tipe_kontrak'];
            $status = $_POST['status'];

            if ($this->kontrak->create($id_pegawai, $tgl_mulai, $tgl_selesai, $tipe_kontrak, $status)) {
                header('Location: kontrak.php?success=1');
                exit();
            } else {
                header('Location: kontrak.php?error=1');
                exit();
            }
        }
    }

    public function edit($id)
    {
        $data = $this->kontrak->getById($id);
        $pegawai = $this->kontrak->getAllPegawaiForEdit();
        include '../app/view/kontrak/edit.php';
    }

    public function update($id)
    {
        if ($_POST) {
            $id_pegawai = $_POST['id_pegawai'];
            $tgl_mulai = $_POST['tgl_mulai'];
            $tgl_selesai = $_POST['tgl_selesai'];
            $tipe_kontrak = $_POST['tipe_kontrak'];
            $status = $_POST['status'];

            if ($this->kontrak->update($id, $id_pegawai, $tgl_mulai, $tgl_selesai, $tipe_kontrak, $status)) {
                header('Location: kontrak.php?success=2');
                exit();
            } else {
                header('Location: kontrak.php?error=2');
                exit();
            }
        }
    }

    public function delete($id)
    {
        if ($this->kontrak->delete($id)) {
            header('Location: kontrak.php?success=3');
            exit();
        } else {
            header('Location: kontrak.php?error=3');
            exit();
        }
    }
}
