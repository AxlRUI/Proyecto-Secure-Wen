<?php
//require("phpsqlajax_dbinfo.php");
$username="root";
$password="usbw";
$database="secure_data";
function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

// Opens a connection to a MySQL server
$connection=mysql_connect ('localhost', $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Set the active MySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

// Select all the rows in the publicaciones table
$query = "SELECT * FROM publicaciones WHERE 1";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo "<?xml version='1.0' ?>";
echo '<markers>';
$ind=0;
// Iterate through the rows, printing XML nodes for each
while ($row = @mysql_fetch_assoc($result)){
  // Add to XML document node
  echo '<marker ';
  echo 'id="' . $row['id_publicacion'] . '" ';
  echo 'publicacion="' . $row['publicacion'] . '" ';
  echo 'fecha="' . $row['fecha_inc'] . '" ';
  echo 'lat="' . $row['coor_lat'] . '" ';
  echo 'lng="' . $row['coor_lon'] . '" ';
  echo 'type="' . $row['categoria'] . '" ';//se tuvo que cambiar base de datos y quitar la tílde de la palabra categoría
  echo '/>';//recupera los valores de la base de datos y los imprime en un XML
  $ind = $ind + 1;
}

// End XML file
echo '</markers>';

?>