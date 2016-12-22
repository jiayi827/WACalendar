<!DOCTYPE html>
<html lang="en">
<head>
<title>WA Public Meeting Calendar</title>
<meta charset="utf-8">
<style>
body {font-family:Verdana, Arial, sans-serif;
      background-color: #00005D;
}
#wrapper { background-color: #b3c7e6; 
           color: #000066;
           width: 60%;
		       margin: auto;
           min-width:850px;
} 
header { background-color: #869dc7;
        color: #00005D; 
        font-size: 100%; 
        padding: 0px;
        height: 100px;
}
h1 {
    padding: 15px 15px 20px 15px;
  }

h2 { color: #869dc7; 
     font-family: arial, sans-serif;
     font-size: 95%;
}

h3 { color: #00005D;
    font-family: arial, sans-serif;
    font-size:90%;

}

p { font-size: 75%;}

main { padding: 20px 20px 0 20px; 
       background-color:#ffffff;
	   color: #000000;
	   display: block; 
} 
main img { margin: 10px;
             float: right;
}
footer {font-size:70%;
         text-align: center;
		 clear: right;
         padding-bottom:20px;
}

form {font-family: Arial, sans-serif; }
fieldset { width: 500px;
         border: 2px ridge #ff0000;
         padding: 10px;}
legend { font-family: Georgia, "Times New Roman", serif;
        font-weight: bold; }
label { padding-left: 10px; }	

</style> 
</head>

<body>
<div id="wrapper">
  <header>
    <h1>Public Meeting Calendar<img src="ischool.png" align="right" width="90px" height="90px" alt="iSchool Logo"></h1>
  </header>

  <main> 
	<h2>Search for Public Meetings</h2>

  <head>
<script language="javascript" src="calendar.js"></script>
</head>

<form action="somewhere.php" method="post">
<?php
//get class into the page
require_once('classes/tc_calendar.php');
 
?>
</form>
<h3>Search By Date</h3>

<form action="datepick.php" method="post">
<?php
  echo "From:&nbsp;";
  require_once('classes/tc_calendar.php');

    $myCalendar = new tc_calendar("date1", true);
    $myCalendar->setIcon("calendar/images/iconCalendar.gif");
    $myCalendar->setPath("calendar/");
    $myCalendar->setYearInterval(2016, 2018);
    $myCalendar->dateAllow('2016-01-01', '2018-12-31');
    $myCalendar->setAlignment('left', 'bottom');
    $myCalendar->setDatePair('date1', 'date2');
    $myCalendar->writeScript();

  echo "&nbsp;&nbsp; To:&nbsp;"; 
    $myCalendar = new tc_calendar("date2", true);
    $myCalendar->setIcon("calendar/images/iconCalendar.gif");
    $myCalendar->setPath("calendar/");
    $myCalendar->setYearInterval(2016, 2018);
    $myCalendar->dateAllow('2016-01-01', '2018-12-31');
    $myCalendar->setAlignment('left', 'bottom');
    $myCalendar->setDatePair('date1', 'date2');
    $myCalendar->writeScript();
    ?>
<br>
<input type="submit">

</form>


<h3>Search by Zip Code</h3>

<form action="zipcode.php" method="post">
Enter Zip Code (e.g WA 98115): <input type="text" name="zip"><br>
<input type="submit">
</form>

</form>
<br>
<br>
<h2>All Incoming Public Meetings List</h2>

<?php
$username ="root";
$password = "560127910504";
$host = "127.0.0.1";
$table = "DQD_TEST";
$con = new mysqli($host, $username, $password, $table);

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

date_default_timezone_set('America/Los_Angeles');
$current_Date = $date = date('Y-m-d');

$query = "SELECT * FROM Meetings WHERE eventDate >= '$current_Date'";
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

</main>
<footer>Copyright &copy; University of Washington Information School 2017
  </footer>
</div>
</body>
</html>