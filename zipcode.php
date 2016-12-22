<html>
<body>
<h2> Public Meetings for You</h2>

<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$zip = test_input($_POST["zip"]);
date_default_timezone_set('America/Los_Angeles');
$current_Date = $date = date('Y-m-d');

$username ="root";
$password = "560127910504";
$host = "127.0.0.1";
$table = "DQD_TEST";
$con = new mysqli($host, $username, $password, $table);

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


$query = "SELECT * FROM Meetings WHERE Zipcode = '$zip' && eventDate >= '$current_Date' ORDER BY eventDate";
$result = mysqli_query($con, $query);

echo "<table border='1'>
<tr>
  <th>Agent</th>
  <th>Title</th>
  <th>Canceled</th>
  <th>Date</th>
  <th>Time</th>
  <th>Location</th>
</tr>";

while($row = mysqli_fetch_assoc($result))
  {
  echo "<tr>";
  echo "<td>" . $row['Agent'] . "</td>";
  echo "<td>" . $row['Title'] . "</td>";
  echo "<td>" . $row['Canceled'] . "</td>";
  echo "<td>" . $row['eventDate'] . "</td>";
  echo "<td>" . $row['eventTime'] . "</td>";
  echo "<td>" . $row['Location'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysqli_close($con);

?>

</body>
</html>