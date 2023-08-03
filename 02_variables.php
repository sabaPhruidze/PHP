<?php

// What is a variable

// Variable types

// Declare variables
$name = 'saba'; // string
$rame = 'saba';
$isMale = true; // boolean
$age = 28; // integer
$height = 1.85; //float
$salary = null; //null
// Print the variables. Explain what is concatenation
echo $name . '<br>';
echo $age . '<br>';
echo $isMale . '<br>';
echo $height . '<br>';
echo $salary . '<br>';
echo $rame . '<br>';
// Print types of the variables
echo gettype($name) . '<br>';
echo gettype($age) . '<br>';
echo gettype($isMale) . '<br>';
echo gettype($height) . '<br>';
echo gettype($salary) . '<br>';
// Print the whole variable
echo var_dump($name, $age, $isMale, $height, $salary) . '<br>';
// Change the value of the variable
$name = 28;
// Print type of the variable
echo gettype($name) . '<br>';
echo var_dump($name) . '<br>';
// Variable checking functions
is_string($name); // false რადგან ტიპი შეიცვალა
is_int($age); //true
is_bool($isMale); // true
is_double($height); // true
// Check if variable is defined
var_dump(is_string($name));
echo '<br>';
var_dump(isset($name2));
// Constants
define('PI', 3.14);
echo '<br>';
echo PI . '<br>';
var_dump(defined('PI'));
echo '<br>';
// Using PHP built-in constants
echo SORT_ASC . '<br>';
echo SORT_DESC . '<br>';
echo PHP_INT_MAX . '<br>';
