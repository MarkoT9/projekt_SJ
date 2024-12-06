<?php
class Db_connection {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "dashboard";
    private $conn;

    public function connect() {
        try {
            $dsn = "mysql:host=" . $this->servername . ";dbname=" . $this->dbname;
            $this->conn = new PDO($dsn, $this->username, $this->password);

            // Nastavenie režimu chyby PDO na výnimku
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->conn;
        } catch (PDOException $e) {
            die("Pripojenie zlyhalo: " . $e->getMessage());
        }
    }

    public function close() {
        $this->conn = null; // Zatvorenie pripojenia
    }
}
?>