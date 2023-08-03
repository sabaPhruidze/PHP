<?php
$title = $_POST['title']; // ასოციაციური მასივია $_POST
$description = $_POST['description'];
$price = $_POST['price']; // ასოციაციური მასივია $_POST
$image = $_FILES['image'] ?? null; //შესაძლოა img არ არსებობს თუ მომხმარებელმა არ ატვირთა და error ზე გავა
$imagePath = '';

if (!is_dir('images')) {
    mkdir('images');
} // ეს შემოწმდება validate products გვერდზე და არა იქ სადაც არის შენახული
// თუ image ცვლადი null არ იყო ესეეგი თუ აიტვირთა სურათი მაშინ
if ($image && $image['tmp_name']) {
    unlink($product['image']); // სურათის წაშლა
    // აქ უნდა გავაკეთოთ ისე რომ წაშალოს ძველი თუ აქვს და ახალი დავამატოთ. ანუ ძველს თუ წავშლით ეს საკმარისია
    $imagePath = 'images/' . randomString(8) . '/' . $image['name'];
    mkdir(dirname($imagePath));
    move_uploaded_file($image['tmp_name'], $imagePath); // სურათებიც არასწორი მისამართით აიტვირთება
}
if (!$title) {
    $errors[] = 'Product title is required';
}
if (!$price) {
    $errors[] = 'Product price is required';
}
