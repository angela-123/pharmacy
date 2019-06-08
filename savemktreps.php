<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$result = $db_handle->executeUpdate("UPDATE dailies set " . $_POST["column"] . " = '".$_POST["editval"]."' WHERE  nrec=".$_POST["id"]);;
?>