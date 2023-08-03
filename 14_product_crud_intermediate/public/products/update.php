<?php
require_once '../../functions.php';
$pdo = require_once '../../database.php';
$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php');
}
$errors = [];


$statement = $pdo->prepare('SELECT * FROM products WHERE id = :id');
$statement->bindValue(':id', $id);

$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC); // ერთი ობიექტი უნდა ამოიღოს

// echo '<pre>';
// var_dump($product);
// echo '</pre>';

$title = $product['title']; // ამის გარეთ დაწერის დანიშნულებაა რომ ტექსტი რაც წერია ეწეროს input შია
$description = $product['description']; // ამის გარეთ დაწერის დანიშნულებაა რომ ტექსტი რაც წერია ეწეროს 
$price = $product['price']; // ამის გარეთ დაწერის დანიშნულებაა რომ ტექსტი რაც წერია ეწეროს 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once "../../validate_product.php";

    if (empty($errors)) { // empty ფუნქცია ამოწმებს ცარიელია თუ არა  თუ ცარიელია ესეეგი price და title ორივე მითითებულია
        // $pdo->exec("INSERT INTO products (title, image, description, price, create_date) 
        // VALUES ('$title','', '$description', '$price', '" . date('Y-m-d H:i:s') . "')");
        // თუმცა ესე არ ვარგა რადგან მარტივად მოსაპარი და გასაფუჭებელია
        //exec ით შეიძლება მაგრამ ჯობს არ ვქნა
        //ამის ალტერნატივა
        //ვინც ეცდება კოდის გატეხვას mysql injection ის საშუალებით ვერ იზავს ასე ჩაწერისას:
        $statement = $pdo->prepare("UPDATE products SET title = :title, 
        image= :image, 
        description = :description, 
        price= :price WHERE id = :id 
"); // values აღარ უნდა
        $statement->bindValue(':title', $title); // ორი სახისაა : bind Param_ის დროს ცვლადი გადაეცემა reference ით ხოლო values დროს რეალურად გადაეცემა value
        $statement->bindValue(':image', $imagePath);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':id', $id);
        // !!!!!!!!!!!!!!!შეიძლება არ გაუშვას იმიტომ რომ ინფორმაცია არ მაქვს შეყვანილი და შევიყვანო აუცილებლად ფორმაში!!!!!!!!!!!!!!!!!!!!
        $statement->execute(); //ამ ყველაფერს გადაიტანს ბაზაში
        // იმისათვის რომ სხვა გვერდზე გავგზავნო მას შემდეგ რაც წარმატებით აიტვირთება მაშინ ესე ჩავწერო
        header('location: index.php'); // ამით გადავა მთავარ გვერდზე
    }
    function randomString($n)
    {
        $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $str = '';
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1); //random
            $str .= $characters[$index];
        }
        return $str;
    }
}
?>

<?php require_once '../../views/partials/header.php' ?>

<!-- <body style="width:100vw; height:100vh"> -->
<p>
    <a href="index.php" class="btn btn-secondary">Back to products</a>
</p>
<style>
img {
    width: 150px;
    height: 80px;
    object-fit: contain;
}
</style>

<h1>Update product : <b><?php echo $product['title'] ?></b></h1>

<?php require_once '../../views/products/form.php' ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>
</body>

</html>