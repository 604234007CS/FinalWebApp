<?php
require 'db.php';
$BookID = $_GET['id'];
$sql = 'DELETE FROM books WHERE BookID=?';
$statement = $connection->prepare($sql);
if ($statement->execute([$BookID])) {
  header("Location:/BookList.php");
}