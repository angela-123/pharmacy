<?php
$term = $_REQUEST["term"];
$term = utf8_decode ($term);
$bd = mysql_connect ('localhost', 'staff', 'angela');
$ret = mysql_select_db ("pharmacy", $bd);
$query = sprintf (
"SELECT * FROM customers WHERE customername  LIKE '%%%s%%' And customername != ''",
mysql_real_escape_string($term));
$result = mysql_query($query);
if ($result)
{
// Use the result (sent to the browser)
while ($row = mysql_fetch_assoc($result))
{
echo ("<li>" . utf8_encode ($row["customername"]) . "</li>");
//echo ("<li>"  . utf8_encode($row["genericname"]). "</li>");
}
mysql_free_result($result);
}
mysql_close ($bd);
?>