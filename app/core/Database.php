<?php

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;
    
    private $conn;
    private $stmt;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db_name);

        if($this->conn->connect_error)
        {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function query($query)
    {
        $this->stmt = $this->conn->prepare($query);
        if(!$this->stmt)
        {
            die("Query preparation failed:" . $this->conn->error);
        }
    }

    public function bind($types, ...$params)
    {
        if(!empty($params))
        {
            $this->stmt->bind_param($types, ...$params);
        }
    }

    public function execute()
    {
        return $this->stmt->execute();
    }

    public function resultSet()
    {
        $this->execute();
        $result = $this->stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function single()
    {
        $this->execute();
        $result = $this->stmt->get_result();
        return $result->fetch_assoc();
    }

    public function singleValue()
    {
        $this->execute();
        $result = $this->stmt->get_result();
        return $result->fetch_row();
    }

    public function rowCount()
    {
        return $this->stmt->affected_rows;
    }

    public function close()
    {
        $this->conn->close();
        $this->stmt->close();
    }
}