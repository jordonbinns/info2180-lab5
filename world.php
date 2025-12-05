<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

// Read GET params
$country = $_GET['country'] ?? "";
$lookup = $_GET['lookup'] ?? "";   


if ($lookup === "cities") {
    $sql = "
        SELECT cities.name, cities.district, cities.population
        FROM cities
        JOIN countries ON countries.code = cities.country_code
        WHERE countries.name LIKE '%$country%';
    ";

    $stmt = $conn->query($sql);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Output city table
    echo "<table border='1'>
            <thead>
                <tr>
                    <th>City</th>
                    <th>District</th>
                    <th>Population</th>
                </tr>
            </thead>
            <tbody>";

    foreach ($results as $row) {
        echo "<tr>
                <td>{$row['name']}</td>
                <td>{$row['district']}</td>
                <td>{$row['population']}</td>
              </tr>";
    }

    echo "</tbody></table>";
    exit();
}


if (!empty($country)) {
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
} else {
    $stmt = $conn->query("SELECT * FROM countries");
}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Output country table
echo "<table border='1'>
        <thead>
            <tr>
                <th>Country Name</th>
                <th>Continent</th>
                <th>Independence Year</th>
                <th>Head of State</th>
            </tr>
        </thead>
        <tbody>";

foreach ($results as $row) {
    echo "<tr>
            <td>{$row['name']}</td>
            <td>{$row['continent']}</td>
            <td>{$row['independence_year']}</td>
            <td>{$row['head_of_state']}</td>
          </tr>";
}

echo "</tbody></table>";
