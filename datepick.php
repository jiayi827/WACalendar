<html>
<body>
<h2> Public Meetings for You</h2>

<?php

$fromDate = isset($_REQUEST["date1"]) ? $_REQUEST["date1"] : "";
$toDate = isset($_REQUEST["date2"]) ? $_REQUEST["date2"] : "";


$username ="root";
$password = "560127910504";
$host = "127.0.0.1";
$table = "DQD_TEST";
$con = new mysqli($host, $username, $password, $table);

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


$query = "SELECT * FROM Meetings WHERE eventDate >= '$fromDate' && eventDate <= '$toDate' ORDER BY eventDate";
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