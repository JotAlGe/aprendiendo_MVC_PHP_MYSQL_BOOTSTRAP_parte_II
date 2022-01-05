<?php
class Connection
{
    protected $host;
    protected $db;
    protected $user;
    protected $pass;

    function __construct()
    {
        $this->host = 'localhost';
        $this->db = 'b_soc_net';
        $this->user = 'root';
        $this->pass = '1234';
    }

    protected function connect()
    {
        try {
            $conn = new PDO("mysql:host={$this->host};dbname={$this->db};charset=utf8mb4", $this->user, $this->pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        } catch (PDOException $e) {
            die('Error ' . $e->getMessage());
        } finally {
            $conn = null;
        }
    }
}
