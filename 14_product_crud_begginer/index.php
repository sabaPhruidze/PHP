<?php
//პროდუქტების ამოღება GET
//ბაზასთან მუშაობის ორი გზაა Msqli და PDO . ეს უკანასკნელი უფრო დახვეწილია და ობჯეტ ორიენთედ მიდგომა აქვს და მუშაობს არამარტო msql თან არამედ სხვა მონაცემთა ბაზებთანააც
//პირველ რიგში რომელ ბაზასთან :mysql;შემდეგ რა არის ბაზის მისამართი host=localhost; შემდეგ უნდა მივუთითოთ პორტი და სტანდარტულად ეს არის 3306 ;და უნდა მივუთითოთ ბაზა რომელ ბაზას დაუკავშირდეს db=products_crud, ესეეგი რაც უშუალოდ phpmyadmin ში შევქმენი
//string ის მერე მეორე და მესამე არგუმენტი არის username და password რომელიც არის სტანდარტულად 'root', ''
// ამით რეალურად ხდება ბაზასთან დაკავშირება 
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', ''); // შევქმენი PDO კლასის ინსტანცია
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // თუ $PDO არ დაკავშირდა ბაზასთან error ამოაგდეთქო

$statement = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC'); // ამით მოვამზადეთ რა უნდა ამოიღოს.მოვნიშნეთ
// order by create_date DESK  გულისხმობს რომ უფრო ახალ პროდუქტს უფრო თავში ჩაწერს
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC); // ამით ვეუბნები მონიშნული ყველაფერი წამოიღოს . ისე ამოიღოს როგორც ასოციაციური მასივი

// echo '<pre>';
// var_dump($products); // ეს არის ის რაც ბაზაში ავტვირთეთ
// echo '</pre>';

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
    <style>
    img {
        width: 80px;
        height: 50px;
        object-fit: contain;
    }
    </style>
    <h1>Products CRUD</h1>
    <a href="create.php" type="button" class="btn btn-success btn-sm">Add Product</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Create Date</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $i => $product) { ?>
            <tr>
                <th scope="row"><?php echo $i + 1 ?></th>
                <td>
                    <?php if ($product['image']) : ?>
                    <img src="<?php echo $product['image'] ?>" alt="<?php echo $product['title'] ?>" class="productde">
                    <?php endif; ?>
                </td>
                <td><?php echo $product['title'] ?></td>
                <td><?php echo $product['price'] ?></td>
                <td><?php echo $product['create_date'] ?></td>
                <td>
                    <a href="update.php?id=<?php echo $product['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                    <form method="post" action="delete.php" style="display:inline-block">
                        <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                    <!-- post -->
                    <!-- get -->
                    <!-- <a href="delete.php?id=<?php // $product['id'] 
                                                    ?>" type="button" class="btn btn-sm btn-danger">Delete</a> -->
                    <!-- php ის პროდუქტის აიდის ვატან რომელსაც ვაჭერ და ეს შეგვიძლია მივიღოთ get ით. -->
                </td>
            </tr>
            <?php } ?>


        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>