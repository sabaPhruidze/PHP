<?php
require_once '../../functions.php';
$pdo = require_once '../../database.php';
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
$imagePath = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once '../../validate_product.php';
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

<?php require_once '../../views/partials/header.php' ?>
<h1>Create new product</h1>

<?php
$product = [
    'image' => ''
]
?>
<?php require_once '../../views/products/form.php' ?>
<!-- ეს ამოაგდებს ერორს რადგან აქ არ მაქვს პროდუქტისთვის image შექმილი , ის რაც update ში არის ამიტომ აქაც შევქმნა -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>
</body>

</html>