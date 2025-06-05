<?php

class Admin_model extends Database {
    private $table = "admin";
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAdminByUsername($username)
    {
        $query = "SELECT * FROM $this->table WHERE username = ?";
        $this->db->query($query);
        $this->db->bind('s', $username);
        return $this->db->single();
    }
}