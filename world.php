<?php
header('Access-Control-Allow-Origin: *');
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$country=$_GET['country'];

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);


if ($_GET['context'] == "cities"){
  $stmt = $conn->query("SELECT cities.name, cities.district, cities.population FROM `cities` JOIN `countries` ON cities.country_code=countries.code WHERE countries.name LIKE '%$country%'");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);?>
  <table>
  <tr>
    <th id="name">Name</th>
    <th id="district">District</th>
    <th id="population">Population</th>
</tr>
<?php foreach ($results as $row): ?>
    <tr>
      <td><?= $row['name']; ?> </td>
      <td><?= $row['district']; ?> </td>
      <td><?= $row['population']; ?> </td>
</tr> 
<?php endforeach; ?>
</table>
<?php } ?>
<?php
if ($_GET['context'] == "countries") {$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'"); 
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);?>
  

<table>
  <tr>
    <th id="name">Name</th>
    <th id="continent">Continent</th>
    <th id="independence">Independence</th>
    <th id="headofstate">Head of State</th>
</tr>
<?php foreach ($results as $row): ?>
    <tr>
      <td><?= $row['name']; ?> </td>
      <td><?= $row['continent']; ?> </td>
      <td><?= $row['independence_year']; ?> </td>
      <td><?= $row['head_of_state']; ?> </td>
</tr>
<?php endforeach; ?>
</table>
<?php }?>