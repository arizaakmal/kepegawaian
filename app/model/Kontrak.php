<?php
require_once 'Model.php';

class Kontrak extends Model
{

    public function __construct($conn)
    {
        parent::__construct($conn);
    }

    public function getAll()
    {
        $sql = "SELECT k.*, p.nama as nama_pegawai 
                FROM kontrak k 
                LEFT JOIN pegawai p ON k.id_pegawai = p.id 
                ORDER BY k.tgl_mulai DESC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT k.*, p.nama as nama_pegawai 
                FROM kontrak k 
                LEFT JOIN pegawai p ON k.id_pegawai = p.id 
                WHERE k.id_kontrak = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getAllPegawai()
    {
        $sql = "SELECT p.id as id_pegawai, p.nama 
                FROM pegawai p 
                LEFT JOIN kontrak k ON p.id = k.id_pegawai AND k.status = 'Aktif'
                WHERE k.id_pegawai IS NULL
                ORDER BY p.nama";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllPegawaiForEdit()
    {
        $sql = "SELECT id as id_pegawai, nama FROM pegawai ORDER BY nama";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function create($id_pegawai, $tgl_mulai, $tgl_selesai, $tipe_kontrak, $status)
    {
        $sql = "INSERT INTO kontrak (id_pegawai, tgl_mulai, tgl_selesai, tipe_kontrak, status) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("issss", $id_pegawai, $tgl_mulai, $tgl_selesai, $tipe_kontrak, $status);
        return $stmt->execute();
    }

    public function update($id, $id_pegawai, $tgl_mulai, $tgl_selesai, $tipe_kontrak, $status)
    {
        $sql = "UPDATE kontrak SET id_pegawai = ?, tgl_mulai = ?, tgl_selesai = ?, tipe_kontrak = ?, status = ? WHERE id_kontrak = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("issssi", $id_pegawai, $tgl_mulai, $tgl_selesai, $tipe_kontrak, $status, $id);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM kontrak WHERE id_kontrak = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
