<?php
require("Connect.php");

// $servername = "mysql.hostinger.in.th";
// $username = "u111028414_root";
// $password = "123456";
// $dbname = "u111028414_icare";


function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

// // Opens a connection to a MySQL server
// $connection=mysql_connect ($servername, $username, $password);
// if (!$connection) {
//   die('Not connected : ' . mysql_error());
// }

// // Set the active MySQL database
// $db_selected = mysql_select_db($dbname, $connection);
// if (!$db_selected) {
//   die ('Can\'t use db : ' . mysql_error());
// }

// Select all the rows in the markers table
$query = "select warnings.*,members.* from warnings LEFT JOIN members ON warnings.members_member_id = members.member_id";
mysqli_query($conn,  "SET NAMES UTF8" );
$result = mysqli_query($conn, $query);
if (!$result) {
  die('Invalid query: ' . mysqli_error());
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
  // Add to XML document node
  echo '<marker ';
  echo 'subject="' . parseToXML($row['warn_subject_type']) . '" ';
  echo 'detail="' . parseToXML($row['warn_detail']) . '" ';
  echo 'lat="' . $row['warn_latitude'] . '" ';
  echo 'lng="' . $row['warn_longtitude'] . '" ';
  echo 'type="' . $row['warn_subject_type'] . '" ';
  echo 'flname="' . $row['member_firstname'] . ' ' . $row['member_lastname'] . '" ';
  echo 'tel="' . $row['member_tel'] . '" ';
  echo 'img="' . $row['warn_photo'] . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';

?>