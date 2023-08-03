<?php
//curl არის საუკეთესო საშაუალება როგორც ინფორმაციის მოტანისთვის აგრეთვე ინფორმაციის გადაგზავნისთვის
$url = 'https://jsonplaceholder.typicode.com/users'; //2
// Sample example to get data. // ინფოს მოტანა
//filegetcontent თითაც შემიძლია მოვიტანო ამდენი ინფოს წერის გარეშე
//თუმცა როცა ინფოს მოტანა კიარა არამედ ინფოს უკან ჩაწერა გვინდა მაშინ filegetcontent აღარ გამოდგება
$resource = curl_init($url); // ინიციალიზაციას ახდენს 1 // $url ს აქ თუ არ გადავცემ მაშინ ქვედა უნდა ეწეროს თუ გადავცემ ქვედა აღარაა საჭირო
// curl_setopt($resource, CURLOPT_URL, $url); // set options //1,2
curl_setopt($resource, CURLOPT_RETURNTRANSFER, true); //მე მინდა უკან ინფორმაციის მიღება

$result = curl_exec($resource); // ამას გაუშვებს და გვიბრუნებს შედეგს
// curl_close($resource);
echo $result;
// Get response status code
$responseCode = curl_getinfo($resource, CURLINFO_HTTP_CODE); // დიდი ასოებით რაც მიწერია არის კონსტანტა
//იმისათვის რომ ინფო გამოვიძახო curl_close არ უნდა იქნას გაშვებული
echo '<br>';
echo $responseCode;
// set_opt_array

// Post request
echo '<br>';
$user = [
    'name' => 'inhvwa',
    'surname' => 'fgreg',
    'email' => 'inhvwa@example.com'
];
//echo json_encode($user, JSON_PRETTY_PRINT); // ლამაზად ჩაწერა
//exit; // ეს ნიშნავს რომ JSON_ENCODE ქვევით აღარ გავცელდება და აქ წყვეტს მუშაობას
$resource1 = curl_init($url);
curl_setopt_array($resource1, [
    CURLOPT_POST => true, // ანუ POST მეთოდით ვაგზავნით request_ს
    CURLOPT_POSTFIELDS => json_encode($user), //ინფორმაციის გატანება //
    CURLOPT_RETURNTRANSFER => true, //მე მინდა უკან ინფორმაციის მიღება
    CURLOPT_HTTPHEADER => ['content-type: application/json'],
]);
$result1 = curl_exec($resource1); // ამას გაუშვებს და გვიბრუნებს შედეგს
echo $result1;
//JSON_ENCODE ფუნქცია იღებს array ს და გადაყავს JSON ში