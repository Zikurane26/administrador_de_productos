<?php
require_once __DIR__ . '/../core/Database.php';

class Asistencia {
    private $collection;

    public function __construct() {
        $this->collection = (new Database())->getConnection()->asistencias;
    }

    public function guardarCodigo($data) {
        // Primero eliminamos códigos anteriores del mismo profesor (opcional)
        $this->collection->deleteMany(['profesor_id' => $data['profesor_id']]);

        // Insertamos el nuevo
        $this->collection->insertOne($data);
    }

    public function obtenerCodigoPorProfesor($profesor_id) {
        return $this->collection->findOne(['profesor_id' => $profesor_id]);
    }
}
