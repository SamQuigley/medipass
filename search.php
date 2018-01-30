<?php
include 'phpFunctions/config.php';

 
echo "<h2>Search Results:</h2><p>";

//If they did not enter a search term we give them an error
if ($find == "")
{
echo "<p>You forgot to enter a search term!!!";
exit;
}

// Otherwise we connect to our Database
mysql_connect("localhost", "root", "{MyPassword}") or die(mysql_error());
mysql_select_db("databasename") or die(mysql_error());

// We perform a bit of filtering
$find = strtoupper($find);
$find = strip_tags($find);
$find = trim ($find);

//Now we search for our search term, in the field the user specified
$data = mysql_query("SELECT * FROM patient WHERE upper($field) LIKE'%$find%'");

//And we display the results
while($result = mysql_fetch_array( $data ))
{
echo $result['patientName'];
echo " ";
echo $result['patientSurname'];
echo "<br>";
echo $result['idnumber'];
echo "<br>";
echo "<br>";
}

//This counts the number or results - and if there wasn't any it gives them a little message explaining that
$anymatches=mysql_num_rows($data);
if ($anymatches == 0)
{
echo "Sorry, but we can not find an entry to match your query...<br><br>";
}

//And we remind them what they searched for
echo "<b>Searched For:</b> " .$find;
//}
	?>
