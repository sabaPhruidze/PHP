<?php
//პროდუქტების ამოღება GET
//ბაზასთან მუშაობის ორი გზაა Msqli და PDO . ეს უკანასკნელი უფრო დახვეწილია და ობჯეტ ორიენთედ მიდგომა აქვს და მუშაობს არამარტო msql თან არამედ სხვა მონაცემთა ბაზებთანააც
//პირველ რიგში რომელ ბაზასთან :mysql;შემდეგ რა არის ბაზის მისამართი host=localhost; შემდეგ უნდა მივუთითოთ პორტი და სტანდარტულად ეს არის 3306 ;და უნდა მივუთითოთ ბაზა რომელ ბაზას დაუკავშირდეს db=products_crud, ესეეგი რაც უშუალოდ phpmyadmin ში შევქმენი
//string ის მერე მეორე და მესამე არგუმენტი არის username და password რომელიც არის სტანდარტულად 'root', ''
// ამით რეალურად ხდება ბაზასთან დაკავშირება 

require_once '../../functions.php';
$pdo = require_once '../../database.php';

//search ისთვის 
$keyword = $_GET['search'] ?? null;

if ($keyword) {
    $statement = $pdo->prepare('SELECT * FROM products WHERE title like :keyword ORDER BY create_date DESC');
    $statement->bindValue(":keyword", "%$keyword%"); // შუაში მყოფი ტექტის მოსაძებნად
} else {
    $statement = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC'); // ამით მოვამზადეთ რა უნდა ამოიღოს.მოვნიშნეთ

}
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC); // ამით ვეუბნები მონიშნული ყველაფერი წამოიღოს . ისე ამოიღოს როგორც ასოციაციური მასივი
//search ისთვის 


// echo '<pre>';
// var_dump($products); // ეს არის ის რაც ბაზაში ავტვირთეთ
// echo '</pre>';



?>
<?php require_once '../../views/partials/header.php'; ?>

<style>
img {
    width: 80px;
    height: 50px;
    object-fit: contain;
}
</style>
<h1>Products CRUD</h1>
<a href="/products/create.php" type="button" class="btn btn-success btn-sm">Add Product</a>


<!-- search ის გაკეთება -->
<!-- http://localhost:8080/products/index.php?search=ihpone ანუ რასაც ჩავწერთ search ში 
იმას დააწერს ლინკადაც როდესაც get გვაქვს და ინფუთს უწერია search -->
<form action="" method="get" style="margin:10px 0">
    <div class="input-group mb-3">
        <input type="text" class="form-control" name="search" placeholder="Search" value="<?php echo $keyword ?>">
        <div class="input-group-append">
            <button class="btn btn-success" type="submit">Search</button>
        </div>
    </div>
</form>



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
                <img src="/products/<?php echo $product['image'] ?>" alt="<?php echo $product['title'] ?>"
                    class="productde">
                <?php endif; ?>
            </td>
            <td><?php echo $product['title'] ?></td>
            <td><?php echo $product['price'] ?></td>
            <td><?php echo $product['create_date'] ?></td>
            <td>
                <a href="/products/update.php?id=<?php echo $product['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                <form method="post" action="/products/delete.php" style="display:inline-block">
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