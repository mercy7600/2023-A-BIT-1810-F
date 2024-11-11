<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>View Forecast</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Forecasts</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Location</th>
                    <th>Forecast Date</th>
                    <th>Expected Temperature</th>
                    <th>Expected Humidity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("SELECT l.name, f.forecast_date, f.expected_temperature, f.expected_humidity 
                                      FROM Forecasts f 
                                      JOIN Locations l ON f.location_id = l.id");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                            <td>{$row['name']}</td>
                            <td>{$row['forecast_date']}</td>
                            <td>{$row['expected_temperature']} °C</td>
                            <td>{$row['expected_humidity']} %</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-primary">Back</a>
    </div>
</body>
</html>
