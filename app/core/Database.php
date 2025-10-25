<?php
require_once __DIR__ . '/../../config/config.php';

class Database {
    private static $instance = null;
    private $client;
    private $db;

    private function __construct() {
        try {
            $this->client = new MongoDB\Client(MONGO_URI);
            $this->db = $this->client->selectDatabase(MONGO_DB);
        } catch (Exception $e) {
            die("Error al conectar con MongoDB: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getDB() {
        return $this->db;
    }
}
