<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

// Read the GET variable 
$country = $_GET['country'] ?? "";

// Build SQL query
if (!empty($country)) {
    // Partial search allowed
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
} else {
    // No country given → return all
    $stmt = $conn->query("SELECT * FROM countries");
}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>
