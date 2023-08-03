<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', ''); // შევქმენი PDO კლასის ინსტანცია
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // თუ $PDO არ დაკავშირდა ბაზასთან error ამოაგდეთქო

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