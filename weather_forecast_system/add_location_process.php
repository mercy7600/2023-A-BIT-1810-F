<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    try {
        $stmt = $pdo->prepare("INSERT INTO Locations (name, latitude, longitude) VALUES (?, ?, ?)");
        $stmt->execute([$name, $latitude, $longitude]);
        header("Location: index.php");
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
