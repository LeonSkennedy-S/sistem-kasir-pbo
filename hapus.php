<?php
include 'database.php';
$db = new Database();

if(isset($_GET['id'])){
    $db->hapus_data($_GET['id']);
    header("location:index.php");
}
?>