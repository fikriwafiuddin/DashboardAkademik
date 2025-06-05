<?php

class Jurusan_model extends Database {
    private $table = 'jurusan';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllJurusan()
    {
        $this->db->query("SELECT * FROM $this->table");
        return $this->db->resultSet();
    }

    public function addJurusan($data)
    {
        $query = "INSERT INTO $this->table (nama_jurusan) VALUES (?)";
        $this->db->query($query);
        $this->db->bind("s", $data['nama_jurusan']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getJurusanById($id)
    {
        $query = "SELECT * FROM $this->table WHERE jurid = ?";
        $this->db->query($query);
        $this->db->bind("i", $id);
        $this->db->execute();
        return $this->db->single();
    }

    public function updateJurusan($data)
    {
        $query = "UPDATE $this->table SET nama_jurusan = ? WHERE jurid = ?";
        $this->db->query($query);
        $this->db->bind("si", $data['nama_jurusan'], $data['jurid']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getCountJurusan()
    {
        $query = "SELECT count(jurid) FROM $this->table";
        $this->db->query($query);
        $row = $this->db->singleValue();
        return $row[0] ?? null;
    }
}