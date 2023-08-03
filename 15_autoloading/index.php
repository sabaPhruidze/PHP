<?php
// დავუშვათ გვაქვს ecomerrce ტიპის აპლიკაციაა რომელიც რაღაც ეტაპზე აგზავნის მეილზე
//ჩვენ დაგვჭირდება მეილის გაგზავნის package შემოვიტანოთ ჩვენს აპლიკაციაში რომელიც third part package aris anu viRaci s mier dawerili
//მაგრამ ვერ შემოვიტანთ თუ კლასები ერთმანეთს დაემთხვევა და collision წარმოიქმნება
// ამიტომ ჩვენ შეგვიძლია app name space ის ქვეშ გავაერთიანოთ ამიტომ ერთქმევა სიტყვააზე არა email არამედ app/Email, app\Person , app\Order
//autoloading არის ეგ რაც ზევით ვთქვი ანუ კლასების collision ის თავიდან ასარიდებლად გამოიყენება ეს
//ორი სახისაა ერთი ჩვენით შევქმნათ და მეორე composer ის გამოყენებით
//კომპოუზერი არის package managing tool php ის თვის დაწერილი და ამის საშუალებით შეგვიძლია დავაყენოთ autoloader და ნებისმიერ სხვა third party package
//https://getcomposer.org/
//git შიც შემიძლია composer ის უბრალო ჩაწერითა და არსად შესვლით ვნახო ყველა ინფორმაცია მასზე

// შესაძლოა ძალიან ბევრ ადგილას დაგვჭირდეს ამ require_once ის  შემოტანა და აგრეთვე განვიხილავთ როგორ უნდა გავაკეთოთ nameSpace ები
//ამისთვის საჭიროა composer.json ის შექმნა რომელსაც ვაკეთებთ    composer init ს ჩაწერით terminal ში
// command ში რასაც ამოგვიგდებს უბრალოდ ენთერს დავაჭირო და ამით ჩაიტვირთება composer.json

//composer.json არის ｐｈｐ project configuration ფაილი რომელშიც  შეგვიძლია განვსაზღვროთ auto-loading ის ფოლდერი
//აგრეთვე შეგვიძლია განვსაზღვროთ რა package ჯებზე არის ჩვენი package დამოკიდებული
//როდესაც ახალ package ებს დავაყენებთ auto loading გი ამ package ებზეც მოხდება 
// require_once 'Person.php'; ამის წერა აღარ მოგვიწევს არამედ ავტომატურად შემოვიტანთ
// require_once 'Email.php'; 

//ტერმინალში ჩავწერო composer update

// შეიქმნება vendor ფოლდერი რომლის შიგნით იქნება autoload php. 
//სწორედ ეს უკანასკნელი არის ფასუხისმგებელი ყველანაირი კლასის შემოტანაზე app namespace ს ქვეშ

// საბოლოოდ აქ შემოვიტანთ სწორედ ამ autoload ს ნაცვლად ცალცალკე კლასებისა
require_once "./vendor/autoload.php"; // რამდენი კლასიც არუნდა შევქმნათ ავტომატურად შემოიტანს
// აუცილებელია თითოეულ კლასს განვუსაზღვრო namespace

//თუ მინდა რომ ათჯერ ვე არ დავწერო app\email მაშინ ჩავწერო რომ გამოიყენოს ეს ფორმა

use app\Email;

$email = new Email(); // instance  ამის შემდეგ app/ დასჭირდება ორივეს რომ მივაწერო
$email = new Email();
$email = new Email(); // ასე app ის წერა აღარ მომიწევს
$person = new app\Person(); //instance ამის შემდეგ app/ დასჭირდება ორივეს რომ მივაწერო
//თუ sub name ები გვექნება მაშინ use უფრო გამოსადეგია
//$person = new app\re\Person();

// https://packagist.org/ არის PHP ის მთავარი composer repository
//https://packagist.org/packages/guzzlehttp/guzzle ამას ვიწერთ
//composer require guzzlehttp/guzzle terminal ში ამას ვწერ
// ეს package გვეხმარება curl ის request ების წერა არამედ სტანდარტულად რაც native php ზე მოგვიწევდა იმ curl
// საბოლოო ჯამში curl თან მუშაობას გვიმარტივებს

$client = new \GuzzleHttp\Client(); // კლიენტის ინსტანცია შევქმენი
$response = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle'); // მივიღე ინფორმაცია

// მიღებულიდან რაც მინდა რომ ამოვიღო
echo $response->getStatusCode(); // 200
echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'