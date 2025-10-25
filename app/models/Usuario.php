<?php
require_once __DIR__ . '/../core/Database.php';

class Usuario {
    private $db;
    private $collection;

    public function __construct() {
        // obtener la instancia singleton y la DB
        $this->db = Database::getInstance()->getDB();

        // usar la propiedad $this->db (NO $db)
        var_dump($this->db);
        die();
        $this->collection = $this->db->selectCollection('usuarios');
    }

    public function findByUsername($usuario) {
        return $this->collection->findOne(['usuario' => $usuario]);
    }

    public function verifyLogin($usuario, $contrasena) {
        $user = $this->findByUsername($usuario);
        if ($user && password_verify($contrasena, $user['contrasena'])) {
            return $user;
        }
        return null;
    }

    public function buscarPorUsuario($usuario) {
        return $this->collection->findOne(['usuario' => $usuario]);
    }

    public function registrarUsuario($usuario, $contrasena) {
        $hash = password_hash($contrasena, PASSWORD_DEFAULT);
        return $this->collection->insertOne([
            'usuario' => $usuario,
            'contrasena' => $hash
        ]);
    }
    public function crearUsuario($usuario, $contrasena, $rol = 'estudiante') {
    try {
        $hash = password_hash($contrasena, PASSWORD_DEFAULT);
        $this->collection->insertOne([
            'usuario' => $usuario,
            'contrasena' => $hash,
            'rol' => $rol,
            'fecha_registro' => new MongoDB\BSON\UTCDateTime()
        ]);
        return true;
    } catch (Exception $e) {
        return false;
    }
}

}
