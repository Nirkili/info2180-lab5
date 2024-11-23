<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

if (isset($_GET['country'])) {
  $query = strip_tags($_GET['country']);
} 
else {
  $query = '';
}

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if($query == ''){
  $stmt = $conn->query("SELECT * FROM countries");
}
else{
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$query%'");
}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<table>
  <th>Name</th>
  <th>Continent</th>
  <th>Independence</th>
  <th>Head of State</th>
<?php 
  
  foreach ($results as $row): ?>
    <tr>
    <td><?= $row['name'] ?></td>
    <td><?= $row['continent'] ?></td>
    <td><?= $row['independence_year'] ?></td>
    <td><?= $row['head_of_state'] ?></td>
    </tr>
<?php endforeach; ?>
</table>
