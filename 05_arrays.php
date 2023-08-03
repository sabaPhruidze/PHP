<?php
// Create array
$fruits = ["Banana", "Apple", "orange"];
$fruits = array("banana", "apple", "orange");
// Print the whole array
var_dump($fruits);
echo '<pre>';
var_dump($fruits);
echo '</pre>';
echo print_r($fruits) . '<br>';
// Get element by index
//კონკრეტული ელემენტის ამოღება მასივიდან
echo $fruits[0] . '<br>';
// Set element by index
$fruits[1] = 'Peach'; //ასე შემიძლია შევუცვალო მნიშვნელობა
echo print_r($fruits) . '<br>';
// Check if array has element at index 2
echo var_dump(isset($fruits[2])) . '<br>';
// Append element
// მასივში ელემენტების ჩამატება
$fruits[] = 'Mango';
array_push($fruits, "push"); // adding twice
echo '<pre>';
echo var_dump($fruits);
echo '</pre>'; // 4 ელემენტიანი გახდა ეს მასივი
// Print the length of the array
// მასივის სიგრძის დადგენა ანუ რამდენი ელემეტისგან შედგება :
echo count($fruits) . '<br>';
// Add element at the end of the array
echo array_push($fruits, 'wathaaaaa') . '<br>';
// Remove element from the end of the array
echo array_pop($fruits); //ჩაწერს ბოლო ელემენტს და ამოიღებს ამ ელემენტს arrayდან.
define("nani", array_pop($fruits));

echo '<pre>';
var_dump(nani);
echo '</pre>';
echo '<br>';

echo '<pre>';
var_dump($fruits);
echo '</pre>';
// Add element at the beginning of the array
echo '<br>';
array_unshift($fruits, 'spear');
echo '<pre>';
print_r($fruits);
echo '</pre>';

echo '<br>';
echo var_dump($fruits[0]);
echo '<br>';
// Remove element from the beginning of the array
echo array_shift($fruits);
echo '<pre>';
print_r($fruits);
echo '</pre>';
// Split the string into an array
//თუ მაქვს სტრინგი და მინდა რომ გადავიყვანო მასივში

$string = "Banana apple mango";
$convertStringIntoArray = explode(' ', $string);
echo '<pre>';
var_dump($convertStringIntoArray);
echo '</pre>';
// Combine array elements into string
$convertArrayIntoString = implode('&', $convertStringIntoArray);
echo "<pre>";
var_dump($convertArrayIntoString);
echo "</pre>";
// Check if element exist in the array
var_dump(in_array('apple', $convertStringIntoArray));
// Search element index in the array
echo array_search('mango', $convertStringIntoArray); // index მიბრუნებს

//ისე
echo '<pre>';
var_dump($fruits, $convertStringIntoArray);
echo '</pre>';
echo '<br>';
//ისე
// Merge two arrays
$mergedArray = array_merge($fruits, $convertStringIntoArray);
$mergedArray1 = [...$fruits, ...$convertStringIntoArray];
echo '<pre>';
print_r($mergedArray);
print_r($mergedArray1);
echo '</pre>';
// Sorting of array (Reverse order also)
echo '<pre>';
var_dump($fruits);
echo '</pre>';
echo '<pre>';
sort($fruits); // დაასორტირა
echo var_dump($fruits);
rsort($fruits); //პირიქით დაასორტირებს
echo var_dump($fruits);
echo '</pre>';

// filter , map , reduce of arry
$numbers = [1, 2, 3, 4, 5, 6, 7, 8];
$evens = array_filter($numbers, function ($number) {
    return $number % 2 === 0; //2,4,6,8
}); // პირველს გადავცემთ თუ საიდან გვინდა რომ ამოიღოს,მეორე ფუნქცია თუ რომელი ამოიღოს
var_dump($evens);
// იგივე რამ შეიძლება arrow function ით ჩაიწეროს
$evens1 = array_filter($numbers, fn ($n) => $n % 2 === 0);
var_dump($evens1);
echo '<br>';
//array map იდან ამ შემთხვევაში ვიყენებთ იმისათვის რომ ერთით გავზარდოთ თითოეული ელემენტი
$plusONe = array_map(fn ($number) => $number + 1, $numbers); //ჯერ callback ანუ ფუნქცია მერე ელემენტი
echo '<pre>';
echo var_dump($plusONe);
echo '</pre>';
echo '<br>';
//reduce// გამოსადეგია რადგან $numbers ში შემიძლია გამოვთვალო ელემენტების ჯამი
//carry არის აკუმულატორი რომელიც გადაეცემა ერთი იტერაციიდან მეორე იტერაციას
// მეორე არის მიმდინარე ელემენტი
$sum = array_reduce($numbers, fn ($carry, $n) => $carry + $n); // პირველ იტერაციაზე $carry არის პირველი ანუ 1 ამ შემთხვევაში ხოლო $n 2; შემდეგ მათი ჯამი ბრუნდება $carry ს სახით ანუ გახდა 3 და n კი ხდება შემდეგი ციფრი ანუ სამი
var_dump($sum);


// https://www.php.net/manual/en/ref.array.php

// ============================================
// Associative arrays
// ============================================

// Create an associative array
$person = [
    'name' => 'alb',
    'surname' => 'yama',
    'age' => 28,
    'hobbies' => ['tennis']
]; 
echo '<pre>';
var_dump($person);
echo '</pre>';


// Get element by key
echo $person['name'] . '<br>';
echo $person['surname'] . '<br>';
echo $person['age'] . '<br>';
echo $person['hobbies'][0] . '<br>'; 
// Set element by key
$person['name'] = 'ryu';
$person['username'] = 'keru';
$person['age'] = 18;
$person['hobbies'] = ['box'];
echo '<pre>';
var_dump($person);
echo '</pre>';
// Null coalescing assignment operator. Since PHP 7.4

// Check if array has specific key
echo '<pre>';
var_dump(isset($person['age']));
var_dump(isset($person['hobbies']));
echo '</pre>';
// Print the keys of the array
echo '<pre>';
var_dump(array_keys($person)); // მარცხნივ რაც არის იმას ჩაწერს.
echo '</pre>';
// Print the values of the array
echo '<pre>';
var_dump(array_values($person));
echo '</pre>';
// Sorting associative arrays by values, by keys  
//ეს ნიშნავს თანმიმდევრობით დალაგებს
ksort($person);
echo '<pre>';
var_dump($person);
echo '</pre>';

// Two dimensional arrays
$todos = [
    ['title' => 'Todo 1', 'completed' => true],
    ['title' => 'Todo 2', 'completed' => false],
];
echo '<pre>';
var_dump($todos);
echo $todos[0]['title']; //todo 1
echo '</pre>';