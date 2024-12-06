<?php
include_once 'Db_connection.php';

class Product {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    // Vytvorenie produktu
    public function create($productName, $category, $description, $inStock, $unitsSold, $expireDate) {
        $sql = "INSERT INTO products (product_name, category, description, in_stock, units_sold, expire_date) 
                VALUES (:product_name, :category, :description, :in_stock, :units_sold, :expire_date)";
        $stmt = $this->conn->prepare($sql);

        // Priradenie parametrov
        return $stmt->execute([
            ':product_name' => $productName,
            ':category' => $category,
            ':description' => $description,
            ':in_stock' => $inStock,
            ':units_sold' => $unitsSold,
            ':expire_date' => $expireDate
        ]);
    }

    // Získať všetky produkty
    public function readAll() {
        $sql = "SELECT * FROM products";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Získať jeden produkt podľa ID
    public function readOne($id) {
        $sql = "SELECT id, product_name, category, description, units_sold, in_stock, expire_date 
                FROM products 
                WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Aktualizovať produkt
    public function update($id, $productName, $category, $description, $inStock, $unitsSold, $expireDate) {
        $sql = "UPDATE products 
                SET product_name = :product_name, 
                    category = :category, 
                    description = :description, 
                    in_stock = :in_stock, 
                    units_sold = :units_sold, 
                    expire_date = :expire_date 
                WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':product_name' => $productName,
            ':category' => $category,
            ':description' => $description,
            ':in_stock' => $inStock,
            ':units_sold' => $unitsSold,
            ':expire_date' => $expireDate,
            ':id' => $id
        ]);
    }

    // Zmazať produkt
    public function delete($id) {
        $sql = "DELETE FROM products WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    // Získať najlepšie produkty
    public function readTopProducts($limit) {
        $sql = "SELECT product_name, units_sold 
                FROM products 
                ORDER BY units_sold DESC 
                LIMIT :limit";
        $stmt = $this->conn->prepare($sql);

        // Priradiť limit ako celé číslo (PDO::PARAM_INT zabezpečuje, že bude spracované ako číslo)
        $stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>