<?php 
echo __FILE__; 
echo __DIR__; // დირექტორიას გვაჩვენებს ანუ მისამართს სადაც არის ეს ფაილი master\11_fs\index.phpC:\xampp\htdocs\php-crash-course-2020-master\11_fs
echo __LINE__; 

// Create directory
if (mkdir('test')) {
    echo 'created'; // შეგიძლია დატესტო თუ შეიქმნა
    //მეორედ შექმნისას error ზე გავა
    //mkdir('test') ეს საკმარისია შექმნიშთვის . შიგნით test არის დირექტორიის დასახელება
}
// Rename directory
if (rename('test', 'test1')) { {
        echo 'Renamed';
    }
}
// Delete directory
if (rmdir('test1')) {
    echo 'removed';
}
// Read files and folders inside directory
//ls სივითაა scandir
// . შეესაბამება მიმდინარე დირექტორიას
// .. შეესაბამება მშობელ დირექტორიას 
define('files', scandir('./'));
define('files1', scandir('../'));
echo '<pre>';
var_dump(files, files1);
echo '</pre>';
// file_get_contents, file_put_contents 
//აქ იგულისხმება მაგ lorem.txt ის წაკითხვა
echo file_get_contents('lorem.txt'); // მასში რაც წერია იმას მოგვცემს

echo file_put_contents('sample.txt', file_get_contents('lorem.txt')); // გადაწერა და შექმნა sample.txt ზე lorem.txt
echo file_put_contents('lorem.txt', '12334543'); // წაშლის lorem.txt ში ყველაფერს და რაც მარჯვნივ დავწერე მაგას ჩაწერს
// file_get_contents from URL
// JSON გადმოტანა
$content = file_get_contents('https://jsonplaceholder.typicode.com/users'); // ასე შემიძლია მივიღო . ანუ ისააა რასაც axios აკეთებს
//ხშირ შემთხვევაში url ზეც მუშაობს თუმცა კონფიგურაციიდან შეიძლება დაბლოკილი იყოს
file_put_contents('users.json', $content);// users.json ში იქნება
// https://www.php.net/manual/en/book.filesystem.php
// file_exists გადაცემული ფაილი არსებბს თუ არა 
// is_dir აბრუნებს true ან false არის თუ არა გადაცემული ფაილი დირექტორია
// filemtime
// filesize ფაილის ზომა  აბრუნებს
// disk_free_space
// file