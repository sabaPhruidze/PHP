<?php
require_once 'functions.php';
$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php');
}
$errors = [];
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
    $title = $_POST['title']; // ასოციაციური მასივია $_POST
    $description = $_POST['description'];
    $price = $_POST['price']; // ასოციაციური მასივია $_POST
    $image = $_FILES['image'] ?? null; //შესაძლოა img არ არსებობს თუ მომხმარებელმა არ ატვირთა და error ზე გავა
    $imagePath = '';

    if (!is_dir('images')) {
        mkdir('images');
    }
    // თუ image ცვლადი null არ იყო ესეეგი თუ აიტვირთა სურათი მაშინ
    if ($image) {
        unlink($product['image']); // სურათის წაშლა
        // აქ უნდა გავაკეთოთ ისე რომ წაშალოს ძველი თუ აქვს და ახალი დავამატოთ. ანუ ძველს თუ წავშლით ეს საკმარისია
        $imagePath = 'images/' . randomString(8) . '/' . $image['name'];
        mkdir(dirname($imagePath));
        move_uploaded_file($image['tmp_name'], $imagePath);
    }
    if (!$title) {
        $errors[] = 'Product title is required';
    }
    if (!$price) {
        $errors[] = 'Product price is required';
    }
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update product </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="./app.css">
</head>

<body style="width:100vw; height:100vh">
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
    <?php if (!empty($errors)) : ?>
    <div class='alert alert-danger'>
        <!-- ახალი ტიპის foreach -->
        <?php foreach ($errors as $error) : ?>
        <div><?php echo $error ?></div>
        <?php endforeach; ?>
    </div>
    <?php endif ?>
    <form method="post" enctype="multipart/form-data">
        <!--იმისათვის რომ სურათი აიტვირთოს საჭიროა ჩავწეროთ encoding type-->
        <?php if ($product['image']) : ?>
        <img src="<?php echo $product['image'] ?>" alt="<?php echo $product['title'] ?>">
        <?php endif; ?>
        <div class="mb-3">
            <label class="form-label">Product image</label><br>
            <input type="file" name='image'>
        </div>
        <div class="mb-3">
            <label class="form-label">Prodcut title</label>
            <input type="text" class="form-control" name='title' value="<?php echo $title ?>">
            <!-- value  ან პირდაპირ ჩაწერით სუბმით ს რომ დავაჭერ თუნდაც არ გაეშვას მაინც value შენარჩუნდება-->
        </div>
        <div class="mb-3">
            <label class="form-label">Prodcut description</label>
            <textarea class="form-control" name="description"><?php echo $description ?></textarea>
            <!-- value  ან პირდაპირ ჩაწერით სუბმით ს რომ დავაჭერ თუნდაც არ გაეშვას მაინც value შენარჩუნდება-->
        </div>
        <div class="mb-3">
            <label class="form-label">Prodcut Price</label>
            <input type="number" class="form-control" step='0.01' name="price" value="<?php echo $price ?>">
            <!-- value  ან პირდაპირ ჩაწერით სუბმით ს რომ დავაჭერ თუნდაც არ გაეშვას მაინც value შენარჩუნდება-->
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>