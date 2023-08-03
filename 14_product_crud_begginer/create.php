<?php
require_once 'functions.php';
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// echo randomString(8) . '<br>'; // სხვადასხვა რამეს დაგვიბრუნებს
// echo randomString(8) . '<br>'; // სხვადასხვა რამეს დაგვიბრუნებს
// echo '<pre>';
// var_dump($_SERVER); // ამით გავიგე if ისთვის ინფო
// echo '</pre>'; // თუ ქვევით რაც არის დავაკომენტარებ დროებით 
// მაშინ დავინახავ რომ მეთოდი არის get ხოლო თუ submit ს დავაჭერ ხდება post
// ამიტომ ჩავწერ if წინადადებას
// echo $_SERVER['REQUEST_METHOD'] . '<br>';
// exit; // ამ დროს მის ქვევით კოდი აღარ გაეშვება 
// სერვერის შესახებ ყველა ინფორმაციას გვაძლევს

//აქ წერია request method რომელიც არის get
// echo '<pre>';
// var_dump($_FILES); // მას შემდეგ რაც formში encodingtype_ს ჩავწერ აქ გამოჩნდება რა ავტვირთეთ
// აქედან უნდა ამოვიღოთ სურათის tmp name
// ["tmp_name"]=>
// string(24) "C:\xampp\tmp\phpC9C6.tmp"
// echo '</pre>';
// exit; // მას შემდეგ რაც შევიყვან მონაცემებს სანამ submit ს დავაჭერ მანამდე გავუშვა


// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';
// ამას ვწერთ იმიტომ რომ თუ POST არ არის და როცა თავდაპირველად შევდივარ არის get მაშინ არ გაეშვას რადგან errors აგდებს

//იმისათვის ორი ან მეტი ფაილი რომ შეინახოს და ზემოდან არ გადაეწეროს
// $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";


$errors = [];
// თუ მინდა რომ ცვლადები title,description... გამოჩნდეს როცა submit ს დავაჭერ და არ გაეშვება მაშინ 
//გარეთ ვანიჭებ ცარიელს სტრინგს მნიშვნელობად და შემდეგ ელემენტში value დ ვუთითებ
$title = '';
$description = '';
$price = '';
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
    if ($image && $image['tmp_name']) {
        // ანუ აქ გავაკეთე path რომ მუდმივად სხვადასხვა იყოს რადგან ერთმანეთზე გადაწერა არ მოხდეს
        $imagePath = 'images/' . randomString(8) . '/' . $image['name']; // არ იქნება images folder შექმნილი და უნდა შეიქმნას
        mkdir(dirname($imagePath)); //ეს შექმნის images/61XsDK3-1hL._AC_SL1000_.jpg დირექტორიას
        move_uploaded_file($image['tmp_name'], $imagePath);
        // ავიღოთ ფაილი tmp_name დან და შევინახოთ images/ ში $image['name']სახელით
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
        $statement = $pdo->prepare("INSERT INTO products (title, image, description, price, create_date) 
VALUES (:title, :image, :description, :price, :date)"); // values გადავცემთ named parameters anu :ით რო იწერება
        //values ს რეაალურად მნიშვნელობა არ აქვს ჯერ ამიტომ უნდა გადავაწოდო
        $statement->bindValue(':title', $title); // ორი სახისაა : bind Param_ის დროს ცვლადი გადაეცემა reference ით ხოლო values დროს რეალურად გადაეცემა value
        $statement->bindValue(':image', $imagePath);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':date', date('Y-m-d H:i:s'));
        // !!!!!!!!!!!!!!!შეიძლება არ გაუშვას იმიტომ რომ ინფორმაცია არ მაქვს შეყვანილი და შევიყვანო აუცილებლად ფორმაში!!!!!!!!!!!!!!!!!!!!
        $statement->execute(); //ამ ყველაფერს გადაიტანს ბაზაში
        // იმისათვის რომ სხვა გვერდზე გავგზავნო მას შემდეგ რაც წარმატებით აიტვირთება მაშინ ესე ჩავწერო
        header('location: index.php'); // ამით გადავა მთავარ გვერდზე
    }

    // echo '<pre>';
    // var_dump($title, $price);
    // echo '</pre>';
    // echo '<pre>';
    // var_dump($errors);// აქ გამოაჩენს ან ორივე errors რომ არც title და არც price არაა მითითებული
    // ან ერთ ერთზე ან არცერთზე და თუ ორივე არ იქნება მითითებული errors ამოაგდებს
    // echo '</pre>';
}

//  ამის ჩაწერა არ არის საკმარისი რადგან 
// როდესაც ხელახლა ვცდი add dropuct ზე გადსვლას ყველაფერზე error დამხვდება 
// და იმისათვის რომ ეს მოვაგვაროთ დამჭირდება სერვერის ესეეგი კიდევ ერთი სუპერ გლობალის გამოყენება

// ვალიდაციები
//იმისათვის ორი ან მეტი ფაილი რომ შეინახოს და ზემოდან არ გადაეწეროს

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="./app.css">
</head>

<body>
    <h1>Create new product</h1>
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