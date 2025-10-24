Hola mundo desde Docker
<?php
require 'vendor/autoload.php'; // Carga el paquete de MongoDB si usas Composer

use MongoDB\Client;

// Obtiene la URI de conexión desde variable de entorno o define una temporal
$uri = getenv('MONGODB_URI') ?: 'mongodb+srv://Zikurane26:TKzk2LN9YsJxA9x2@cluster0.umwdkel.mongodb.net/?retryWrites=true&w=majority&tls=true';

try {
    // Conectarse a MongoDB
    $client = new Client($uri);
    $database = $client->selectDatabase('test_db');
    $collection = $database->selectCollection('test_collection');

    // Insertar un documento de prueba
    $insertResult = $collection->insertOne([
        'nombre' => 'Producto de prueba',
        'precio' => 100,
        'fecha' => new MongoDB\BSON\UTCDateTime()
    ]);

    // Leer los documentos existentes
    $cursor = $collection->find();

    echo "<h2>✅ Conexión y operación con MongoDB exitosa.</h2>";
    echo "<p>ID insertado: " . $insertResult->getInsertedId() . "</p>";
    echo "<h3>Documentos en la colección:</h3><ul>";

    foreach ($cursor as $documento) {
        echo "<li>" . htmlspecialchars(json_encode($documento)) . "</li>";
    }

    echo "</ul>";

} catch (Exception $e) {
    echo "<h2>❌ Error al conectar o consultar MongoDB:</h2>";
    echo "<pre>" . $e->getMessage() . "</pre>";
}


echo "Hola mundo desde Docker 2<br>";

require __DIR__ . '/vendor/autoload.php'; // Carga las dependencias de Composer


// Obtén la URI de conexión desde variable de entorno
$uri = getenv('MONGODB_URI') ?: 'mongodb+srv://Zikurane26:TKzk2LN9YsJxA9x2@cluster0.umwdkel.mongodb.net/test_db?retryWrites=true&w=majority&tls=true';

try {
    // Conectarse a MongoDB
    $client = new Client($uri);
    $database = $client->selectDatabase('test_db');            // Cambia 'test_db' por tu base real
    $collection = $database->selectCollection('test_collection'); // Cambia 'test_collection' por tu colección

    // Leer todos los documentos
    $cursor = $collection->find();

    echo "<h2>📄 Documentos en la colección:</h2><ul>";

    foreach ($cursor as $documento) {
        // Convierte BSON a JSON y evita que se rompa el HTML
        echo "<li>" . htmlspecialchars(json_encode($documento)) . "</li>";
    }

    echo "</ul>";

} catch (Exception $e) {
    echo "<h2>❌ Error al conectar o consultar MongoDB:</h2>";
    echo "<pre>" . $e->getMessage() . "</pre>";
}
