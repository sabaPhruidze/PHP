<?php

$age = 41;
$salary = 300000;
$age1 = null;
// Sample if

// Without circle braces

// Sample if-else

// if AND

// if OR
if ($age < 25 && $salary === 300000) {
    echo "not more than 25";
} elseif ($age > 30 || $salary > 350000) {
    echo 'More than 30';
} else {
    echo "more than 25 but not more than 30";
}
echo '<br>';
// Difference between == and ===
// == დროს ადგენს თუნდაც "სტრინგი იყოს" === იდენტური უნდა იყოს
if ($age == '41') {
    echo 'hey';
}
echo '<br>';
if ($age === '41') {
    echo 'good';
} else {
    echo 'worse';
}
// Ternary if  მოკლედ if ის ჩაწერა
echo '<br>';
echo $age < 22 ? 'Young' : 'old';
echo '<br>';
// echo $age < 22 ? ($age < 16 ? 'gergre' : 'fer') : 'old';
// Short ternary
echo $age ?: 18; //ეს ნიშნავს რომ თუ $age არსებობს ,ანუ რაიმე მნიშვნელობა აქვს მაგას ჩაწერს თუ არადა 18ს . ამ შემთხვევაში ჩაწერს 41ს;
echo '<br>';
echo $age1 ?: 18;
// Null coalescing operator
$var = isset($name) ? $name : 'John'; // 
//ეს იგივეა რაც
$varDifferent = $name ?? 'John';
echo '<pre>';
var_dump($var);
echo '</pre>';

echo '<pre>';
var_dump($varDifferent);
echo '</pre>';


$person = [
    // 'name' => 'John'
];
if (!isset($person['name'])) {
    $person['name'] = 'unknown';
}

var_dump($person['name']);
//ეს იგივეა რაც 
$person['name'] ??= 'unkown';
// switch
$userRole = 'editor'; //editor user
switch ($userRole) {
    case 'admin':
        echo 'you can change anyting';
        break;
    case 'editor':
        echo 'you can edit';
        break;
    case 'user':
        echo 'just simple changes';
        break;
    default:
        echo 'Invalid';
        break;
}
