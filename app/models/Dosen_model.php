<?php

class Dosen_model extends Database {
    private $table = 'dosen';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllDosen()
    {
        $this->db->query("SELECT
                            dosen.nidn, dosen.nama_dosen, jurusan.nama_jurusan AS jurusan, jabatan.nama_jabatan AS jabatan
                          FROM 
                            $this->table, jurusan, jabatan 
                          WHERE 
                            dosen.jurid = jurusan.jurid AND
                            dosen.jbtid = jabatan.jbtid");
        return $this->db->resultSet();
    }

    public function getDosenById($nidn)
    {
        $this->db->query("SELECT
                            nidn,
                            nama_dosen,
                            alamat,
                            tanggal_lahir,
                            dosen.jbtid,
                            dosen.jurid,
                            jurusan.nama_jurusan AS nama_jurusan,
                            jabatan.nama_jabatan AS nama_jabatan
                          FROM 
                            $this->table, jurusan, jabatan
                          WHERE 
                            nidn = ? AND
                            dosen.jurid = jurusan.jurid AND
                            dosen.jbtid = jabatan.jbtid");
        $this->db->bind('s', $nidn);
        return $this->db->single();
    }

    public function insertDosen($data)
    {
        $query = "INSERT INTO 
                    $this->table (nidn, nama_dosen, tanggal_lahir, alamat, jurid, jbtid)
                  VALUES
                    (?, ?, ?, ?, ?, ?)";
        $this->db->query($query);
        $this->db->bind('ssssii',
                        $data['nidn'],
                        $data['nama_dosen'],
                        $data['tanggal_lahir'],
                        $data['alamat'],
                        $data['jurid'],
                        $data['jbtid']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteDosen($nidn)
    {
        $query = "DELETE FROM $this->table WHERE nidn = ?";
        $this->db->query($query);
        $this->db->bind('s', $nidn);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateDosen($data)
    {
        $query = "UPDATE 
                    $this->table
                  SET
                    nama_dosen = ?,
                    tanggal_lahir = ?,
                    alamat = ?,
                    jurid = ?,
                    jbtid = ?
                   WHERE 
                    nidn = ?";
        $this->db->query($query);
        $this->db->bind('ssssii',
                    $data['nama_dosen'],
                    $data['tanggal_lahir'],
                    $data['alamat'],
                    $data['jurid'],
                    $data['jbtid'],
                    $data['nidn']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getDosenByJurusan($jurid)
    {
        $this->db->query("SELECT
                    dosen.nidn, dosen.nama_dosen, jurusan.nama_jurusan AS jurusan, jabatan.nama_jabatan AS jabatan
                    FROM 
                    $this->table, jurusan, jabatan 
                    WHERE 
                    jurusan.jurid = ? AND
                    dosen.jurid = jurusan.jurid AND
                    dosen.jbtid = jabatan.jbtid");
        $this->db->bind("i", $jurid);
        return $this->db->resultSet();
    }

    public function getCountJurusan()
    {
        $query = "SELECT count(nidn) FROM $this->table";
        $this->db->query($query);
        $row = $this->db->singleValue();
        return $row[0] ?? null;
    }
}