<?php

require_once '../../functions.php';
$pdo = require_once '../../database.php';
$id = $_POST['id'] ?? null; // აქ get ის ნაცვლად post ისდან ამოვიღებ
if (!$id) {
    header('Location:index.php');
}

$statement = $pdo->prepare('DELETE FROM products WHERE id =:id'); // ამით მოვამზადეთ რა უნდა ამოიღოს.მოვნიშნეთ
$statement->bindValue(':id', $id);
// order by create_date DESK  გულისხმობს რომ უფრო ახალ პროდუქტს უფრო თავში ჩაწერს 
//:id არის named paramether რომელიც არის საუკეთესო პრაქტიკა
$statement->execute();
header('Location:index.php');
// echo '<pre>';
// var_dump($_GET); // აქ აჩენს მიღებულ ინდექს თუმცა უმჯობესია გაკეთდეს POSTით
// echo '</pre>';