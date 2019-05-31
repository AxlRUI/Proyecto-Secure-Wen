<?php
//require("phpsqlajax_dbinfo.php");
$username="root";
$password="2JcyLX5y/*";
$database="secure_data";
function parseToXML($htmlStr)
{
  $xmlStr=str_replace('<','&lt;',$htmlStr);
  $xmlStr=str_replace('>','&gt;',$xmlStr);
  $xmlStr=str_replace('"','&quot;',$xmlStr);
  $xmlStr=str_replace("'",'&#39;',$xmlStr);
  $xmlStr=str_replace("&",'&amp;',$xmlStr);
  $xmlStr=str_replace("Á",'&#181;',$xmlStr);
  $xmlStr=str_replace("É",'&#144;',$xmlStr);
  $xmlStr=str_replace("Í",'&#214;',$xmlStr);
  $xmlStr=str_replace("Ó",'&#224;',$xmlStr);
  $xmlStr=str_replace("Ú",'&#233;',$xmlStr);
  $xmlStr=str_replace("á",'&#160;',$xmlStr);
  $xmlStr=str_replace("é",'&#130;',$xmlStr);
  $xmlStr=str_replace("í",'&#161;',$xmlStr);
  $xmlStr=str_replace("ó",'&#162;',$xmlStr);
  $xmlStr=str_replace("ú",'&#163;',$xmlStr);
  $xmlStr=str_replace("ñ",'&#164;',$xmlStr);
  $xmlStr=str_replace("Ñ",'&#165;',$xmlStr);
  return $xmlStr;
}
// Opens a connection to a MySQL server
$connection=mysqli_connect ('localhost', $username, $password, $database);
if (!$connection) {
  die('Not connected : ' . mysqli_connect_error());
}

// Select all the rows in the publicaciones table
$query = "SELECT * FROM publicaciones WHERE 1";
$result = mysqli_query($connection, $query);
if (!$result) {
  die('Invalid query: ');
}
header("Content-type: text/xml");
// Start XML file, echo parent node
echo "<?xml version='1.0' ?>";
echo '<markers>';
$ind=0;
// Iterate through the rows, printing XML nodes for each
while ($row = mysqli_fetch_assoc($result)){
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