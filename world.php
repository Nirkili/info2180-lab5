<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$query = strip_tags($_GET['country']);
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if($query == ''){
  $stmt = $conn->query("SELECT * FROM countries");
}
else{
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$query%'");
}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>
