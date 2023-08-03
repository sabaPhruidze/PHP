<?php
// ფუნქცია ეს არის ხელახლა გამოყენებადი კოდის ფრაგმენტი რომელიც შეგვიძლია გამოვიყენოთ რამდენიმე ადგილას
// Function which prints "Hello I am Zura"
function hello() // javascript ს ჰგავს თუმცა ესე იწერება ხოლმე
{
    echo "Hello my name is saba";
}
hello();
echo '<br>';
// Function with argument
function name($name)
{
    echo "Hello I am $name";
}
name('rame');
echo '<br>';
name('DVARfew');
echo '<br>';
// Create sum of two functions
function sum($a, $b)
{
    return $a + $b;
}
echo sum(5, 6); // როცა შეკრება გამოკლება... ეხება აუცილებლად წინ echo ეწერება ისე არა
// Create function to sum all numbers using ...$nums
function massive(...$numbers) // ჩაწერს ამას. ხოლო თუ დაჯამება მომინდება reduce ფუნქციას გამოვიყენებ
{
    echo '<pre>';
    var_dump(4, 5);
    echo '</pre>';
}
echo massive(4, 5, 6, 7, 7);
// Arrow functions
$a = fn ($number) => $number + 1;
echo $a(4);
