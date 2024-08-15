<?php 
require_once 'db_connection.php';

$pdo = getPDO();
$id = isset($_GET['id']) ? $_GET["id"] : "";

$sql = "DELETE FROM books WHERE book_id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $id, PDO::PARAM_INT);

if($stmt->execute()){
    header("Location: list_book.php");
}else{
    echo "Xóa sách thất bại";
}