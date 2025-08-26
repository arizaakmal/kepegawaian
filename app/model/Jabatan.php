<?php
require_once 'Model.php';

class Jabatan extends Model
{

    public function __construct($conn)
    {
        parent::__construct($conn);
    }


    public function getAll()
    {
        $sql = "SELECT * FROM jabatan ORDER BY nama_jabatan";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function getById($id)
    {
        $sql = "SELECT * FROM jabatan WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }


    public function create($nama_jabatan, $gaji)
    {
        $sql = "INSERT INTO jabatan (nama_jabatan, gaji) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $nama_jabatan, $gaji);
        return $stmt->execute();
    }

    public function update($id, $nama_jabatan, $gaji)
    {
        $sql = "UPDATE jabatan SET nama_jabatan = ?, gaji = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sii", $nama_jabatan, $gaji, $id);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM jabatan WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
