<?php
include_once 'Db_connection.php';

class Menu
{
    private $menuData = [
        ['name' => 'Dashboard', 'url' => 'index.php'],
        ['name' => 'Products', 'url' => 'products.php'],
        ['name' => 'Accounts', 'url' => 'accounts.php']
    ]; // Pole na uloženie dát menu
    private $dbConnection; // Inštancia pripojenia k databáze

    public function __construct()
    {
        $this->dbConnection = new Db_connection(); // Vytvorenie inštancie pripojenia k databáze
        $this->loadData(); // Načítanie dát menu
    }

    // Načítanie dát menu z databázy alebo záložných možností
    public function loadData()
    {
        $conn = $this->dbConnection->connect(); // Založenie pripojenia k databáze

        try {
            if ($conn) {
                $sql = "SELECT name, url FROM menu"; // SQL dotaz pre položky menu
                $stmt = $conn->prepare($sql);
                $stmt->execute(); // Spustenie dotazu

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Načítanie výsledkov ako asociatívneho poľa

                if (!empty($result)) {
                    $this->menuData = []; // Inicializácia poľa dát menu
                    foreach ($result as $row) {
                        if (isset($row['name'], $row['url'])) {
                            $this->menuData[] = [
                                'name' => $row['name'],
                                'url' => $row['url']
                            ];
                        }
                    }
                }
            }

            // Ak sú dáta menu prázdne (či už z databázy alebo zlyhanie pripojenia), načítaj zo súboru
            if (empty($this->menuData)) {
                $this->loadDataFromFile(); // Načítanie dát zo súboru JSON ako záloha
            }

            $this->saveDataToFile(); // Uloženie dát do súboru JSON

        } catch (PDOException $e) {
            error_log("Chyba databázy v loadData(): " . $e->getMessage());
            $this->loadDataFromFile(); // Záloha zo súboru JSON v prípade chyby
        }
    }

    // Načítanie dát menu zo súboru JSON ako zálohy
    private function loadDataFromFile()
    {
        if (file_exists("menu.json")) {
            $jsonData = file_get_contents("menu.json");
            $data = json_decode($jsonData, true);

            if (is_array($data)) {
                $this->menuData = $data; // Nastavenie dát menu zo súboru JSON
            } else {
                error_log("Chyba pri analýze súboru JSON: menu.json");
            }
        } else {
            error_log("Súbor JSON nebol nájdený: menu.json");
        }
    }

    // Uloženie dát menu do súboru JSON
    public function saveDataToFile()
    {
        $jsonData = json_encode($this->menuData, JSON_PRETTY_PRINT);
        if (file_put_contents("menu.json", $jsonData) === false) {
            error_log("Chyba pri ukladaní súboru JSON: menu.json");
        }
    }

    // Získanie dát menu na zobrazenie
    public function getMenuData()
    {
        return $this->menuData;
    }
}
?>