<?php

class Database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "DB_PBO_TRPL1A_NAELLA";

    protected $koneksi;

    public function __construct()
    {
        $this->koneksi = new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->database
        );

        if ($this->koneksi->connect_error) {
            die("Koneksi gagal: " . $this->koneksi->connect_error);
        }
    }

    public function getKoneksi()
    {
        return $this->koneksi;
    }
}
?>