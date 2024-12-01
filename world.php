<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if (isset($_GET['country'])) {
  $query = strip_tags($_GET['country']);
} 
else {
  $query = '';
}

if (isset($_GET['lookup'])) {
  $query2 = strip_tags($_GET['lookup']);
} 
else {
  $query2 = '';
}

?>
<?php

if($query2 == 'cities'){
  $stmt = $conn->query("SELECT cities.name, cities.district, cities.population FROM cities INNER JOIN countries ON countries.code = cities.country_code WHERE countries.name LIKE '%$query%'");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);?>
  <table>
    <tr>
      <th>Name</th>
      <th>District</th>
      <th>Population</th>
    </tr>
  <?php 
    
    foreach ($results as $row): ?>
      <tr>
      <td><?= $row['name'] ?></td>
      <td><?= $row['district'] ?></td>
      <td><?= $row['population'] ?></td>
      </tr>
  <?php endforeach; ?>
  </table>
  <?php }
else{
  if($query == ''){
    $stmt = $conn->query("SELECT * FROM countries");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);?>    
    <table>
      <tr>
        <th>Name</th>
        <th>Continent</th>
        <th>Independence</th>
        <th>Head of State</th>
      </tr>
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
    <?php }

  else{
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$query%'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);?>

    <table>
      <tr>
        <th>Name</th>
        <th>Continent</th>
        <th>Independence</th>
        <th>Head of State</th>
      </tr>
    <?php 
      
      foreach ($results as $row): ?>
        <tr>
        <td><?= $row['name'] ?></td>
        <td><?= $row['continent'] ?></td>
        <td><?= $row['independence_year'] ?></td>
        <td><?= $row['head_of_state'] ?></td>
        </tr>
    <?php endforeach;}} ?>
    </table>