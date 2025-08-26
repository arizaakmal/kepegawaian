<?php
require_once 'Model.php';

class Pegawai extends Model
{

    public function __construct($conn)
    {
        parent::__construct($conn);
    }

    public function getAll()
    {
        $sql = "SELECT p.*, 
                       j.nama_jabatan, j.gaji,
                       k.tipe_kontrak, k.status as status_kontrak,
                       k.tgl_mulai, k.tgl_selesai
                FROM pegawai p 
                LEFT JOIN jabatan j ON p.id_jabatan = j.id 
                LEFT JOIN kontrak k ON p.id = k.id_pegawai AND k.status = 'Aktif'
                ORDER BY p.nama";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT p.*, 
                       j.nama_jabatan, j.gaji,
                       k.tipe_kontrak, k.status as status_kontrak,
                       k.tgl_mulai, k.tgl_selesai
                FROM pegawai p 
                LEFT JOIN jabatan j ON p.id_jabatan = j.id 
                LEFT JOIN kontrak k ON p.id = k.id_pegawai AND k.status = 'Aktif'
                WHERE p.id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getAllJabatan()
    {
        $sql = "SELECT id, nama_jabatan, gaji FROM jabatan ORDER BY nama_jabatan";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function create($nama, $alamat, $tgl_lahir, $id_jabatan)
    {
        $sql = "INSERT INTO pegawai (nama, alamat, tgl_lahir, id_jabatan) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssi", $nama, $alamat, $tgl_lahir, $id_jabatan);
        return $stmt->execute();
    }

    public function update($id, $nama, $alamat, $tgl_lahir, $id_jabatan)
    {
        $sql = "UPDATE pegawai SET nama = ?, alamat = ?, tgl_lahir = ?, id_jabatan = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssii", $nama, $alamat, $tgl_lahir, $id_jabatan, $id);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $checkSql = "SELECT COUNT(*) as count FROM kontrak WHERE id_pegawai = ? AND status = 'Aktif'";
        $checkStmt = $this->conn->prepare($checkSql);
        $checkStmt->bind_param("i", $id);
        $checkStmt->execute();
        $result = $checkStmt->get_result();
        $row = $result->fetch_assoc();

        if ($row['count'] > 0) {
            return false;
        }

        $sql = "DELETE FROM pegawai WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
