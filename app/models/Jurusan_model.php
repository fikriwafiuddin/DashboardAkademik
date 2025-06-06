<?php

class Jurusan_model extends Database {
    private $table = 'jurusan';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllJurusan($search)
    {
        $this->db->query("SELECT
                            jurusan.jurid, nama_jurusan, count(dosen.nidn) AS jumlah_dosen
                          FROM 
                            $this->table, dosen
                          WHERE
                            jurusan.jurid = dosen.jurid AND
                            nama_jurusan LIKE '%$search%' OR jurusan.jurid LIKE '%$search%'
                          GROUP BY
                            jurusan.jurid
                          ORDER BY
                            jurusan.jurid ASC");
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