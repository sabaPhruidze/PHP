<?php
//პროდუქტების ამოღება GET
//ბაზასთან მუშაობის ორი გზაა Msqli და PDO . ეს უკანასკნელი უფრო დახვეწილია და ობჯეტ ორიენთედ მიდგომა აქვს და მუშაობს არამარტო msql თან არამედ სხვა მონაცემთა ბაზებთანააც
//პირველ რიგში რომელ ბაზასთან :mysql;შემდეგ რა არის ბაზის მისამართი host=localhost; შემდეგ უნდა მივუთითოთ პორტი და სტანდარტულად ეს არის 3306 ;და უნდა მივუთითოთ ბაზა რომელ ბაზას დაუკავშირდეს db=products_crud, ესეეგი რაც უშუალოდ phpmyadmin ში შევქმენი
//string ის მერე მეორე და მესამე არგუმენტი არის username და password რომელიც არის სტანდარტულად 'root', ''
// ამით რეალურად ხდება ბაზასთან დაკავშირება 
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', ''); // შევქმენი PDO კლასის ინსტანცია
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // თუ $PDO არ დაკავშირდა ბაზასთან error ამოაგდეთქო

// echo '<pre>';
// var_dump($_GET); // თუ submit ში რამე ინფოს შევიყვანთ submit ის მერე გამოჩნდება აქ
// // თუ ბაზაში რაიმეს შენახვა მინდა ან რაიმეს წაშლა რეკომენდირებული არააა GET არამედ POST. ორივე არის სუპერ გლობალი
// echo '</pre>';
// echo '<pre>';
// var_dump($_POST); // method post უნდა მივუთითო ფორმაში
// echo '</pre>';

// // ინფორმაციას რომელსაც ჩავწერ აქ უნდა გადავგზავნო მონაცემთა ბაზაში რომ იქ ჩაიწეროს::::
// $title = $_POST['title']; // ასოციაციური მასივია $_Post
// $description = $_POST['description'];
// $price = $_POST['price']; // ასოციაციური მასივია $_Post

// echo '<pre>';
// var_dump($title, $price);
// echo '</pre>';
// // ამით ამზადებს და ეუბნება რომ რაღაც უნდა განთავდეს products ში
// //რომელ columns ში უნდა განათავსოს მაგას ვუთითებთ
// //რა value უნდა განათავსოს მაგასაც ვუთითებთ

// $pdo->exec("INSERT INTO products (title, image, description, price, create_date) 
// VALUES ('$title','', '$description', '$price'," . date('Y-m-d H:i:s') . ")"); // ''"" დავაკვირდე
// ?>
<!-- აქ რასაც ადტვირთავენ უნდა აიტვირთოს ბაზაში -->
<!-- form submition ის ორი ფორმა არსებობს  GET და POST. სტანდარტული არის get. 
submit ის თვის საჭიროა რომ ყველა input ს ჰქონდეს name
-->
<!-- ლინკის სახით localhost ის php2020 კურსში ამ 14_product_crud ში ?image=&title=&description=&price= ესე ეწერება ესეეგი 
ცარიელებია დასასაბმითებელი ველები 
-->
<!-- <!DOCTYPE html>
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
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Product image</label><br>
            <input type="file" name='image'>
        </div>
        <div class="mb-3">
            <label class="form-label">Prodcut title</label>
            <input type="text" class="form-control" name='title'>
        </div>
        <div class="mb-3">
            <label class="form-label">Prodcut description</label>
            <textarea class="form-control" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Prodcut Price</label>
            <input type="number" class="form-control" name="price">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html> -->