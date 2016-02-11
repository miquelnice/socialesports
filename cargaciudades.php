<?php  
// Start XML file, create parent node
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node); 
// Opens a connection to a MySQL server
$connection=mysql_connect ("localhost", "root","");
if (!$connection) {  die('Not connected : ' . mysql_error());} 
// Set the active MySQL database
$db_selected = mysql_select_db("eventracker", $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
} 
// Select all the rows in the markers table
$ciudad = $_GET['ciudad'];
$deporte = $_GET['deporte'];

$query = "SELECT * FROM pabellon WHERE ciudad='$ciudad' AND sport='$deporte'";
$result = mysql_query($query);
if (!$result) {  
  die('Invalid query: ' . mysql_error());
} 

header("Content-type: text/xml"); 

// Iterate through the rows, adding XML nodes for each

while ($row = @mysql_fetch_assoc($result)){  
  // ADD TO XML DOCUMENT NODE  
  $node = $dom->createElement("marker");  
  $newnode = $parnode->appendChild($node);  
  $newnode->setAttribute("id",utf8_encode($row['id'])); 
  $newnode->setAttribute("nombre",utf8_encode($row['nombre']));
  $newnode->setAttribute("calle", utf8_encode($row['calle']));  
  $newnode->setAttribute("lat", utf8_encode($row['lat']));  
  $newnode->setAttribute("lng", utf8_encode($row['lng']));  
  $newnode->setAttribute("ciudad", utf8_encode($row['ciudad']));
  $newnode->setAttribute("pais", utf8_encode($row['pais']));
  $newnode->setAttribute("sport", utf8_encode($row['sport']));
} 
echo $dom->saveXML();
?>