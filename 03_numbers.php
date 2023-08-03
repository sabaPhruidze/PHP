<?php

// Declaring numbers
$a = 5;
$b = 4;
$c = 1.2;
define("d", 25);
// Arithmetic operations
echo $a + $b . '<br>';
echo $a - $b . '<br>';
echo $a / $b . '<br>';
echo $a * $b . '<br>';
echo $a % $b . '<br>'; // ნაშთი
echo d + $a . '<br>';

// Assignment with math operators
$a = $a + $b;
echo $a . '<br>';
$c += $b;
echo $c . '<br>';
// Increment operator
$a++;
echo $a . '<br>';
$x = 4 + ++$a;
echo $x . '<br>';
// Decrement operator
echo $a-- . '<br>'; // რეალურად შემცირდა ერთით მარა არ გამოჩნდება
echo --$a; //  ერთი რომელიც არ ჩანდა გამოაკლდება და გამოჩნდება რომ ჯამში ორი გამოაკლდა
// Number checking functions
var_dump(is_int(1.25)); // false
echo '<br>';
var_dump(is_double(1.25)); // true
echo '<br>';
var_dump(is_float(1.25)); // true
echo '<br>';
var_dump(is_numeric('3.45')); //true is numeric აანალიზებს სტრინგში თუ წერია რიცხვი
echo '<br>';
var_dump(is_float('3.45')); // false
echo '<br>';
var_dump(is_numeric('3.45e2')); // 3.45 * 10^2 true 
echo '<br>';
// Conversion
$strNumber = '12.34';

//first way
$floatnumber = floatval($strNumber); // 12.34 ციფრად დააბრუნებს
$intNumber = intval($strNumber); // 12  ციფრად დააბრუნებს
$bool = boolval($strNumber);

var_dump($floatnumber);
echo '<br>';
var_dump($intNumber);
echo '<br>';
var_dump($bool); // true დ აქცეს რადგან 
echo '<br>';
//second way დაკასტვა
$dakastva = (float)$strNumber;
echo $dakastva; //12.34
echo '<br>';

// Number functions
echo abs(-15); // აბსოლუტურ მნიშვნელობას იღებს ანუ გახდება  დადებითი 15
echo '<br>';
echo abs(-5);
echo '<br>';
echo pow(2, 3);  // 2 აჰყავს მესამე ხარისხში
echo '<br>';
echo sqrt(16); // ფესვი ამოჰყავს რომელიც არის 4
echo '<br>';
echo max(2, 3, 4); // მაქსიმალურს წერს ანუ ამ შემთხვევაში 3
echo '<br>';
echo min(2, 3, 1, 0); // მინიმუმს წერს 2 ამ შემთხვევაში
echo '<br>';
echo round(2.5); // ამრგვალებს. თუ 0.4 ია მაშინ 0, ხოლო თუ 0.5 მაშინ 1
echo '<br>';
echo floor(2.7); // ყოველთვის დაბალ რიცხვამდე ამრგვალებს ამ შემთხვევაში 2
echo '<br>';
echo ceil(2.4); // ყოველთვის ზევით ამრგვალებს ამ შემთხვევაში 3
echo '<br>';



// Formatting numbers
$number12345 = 325534543645645.3242342354;
echo number_format($number12345, 2, '.', ' ');
echo '<br>';
echo number_format($number12345, 1, '.', '-');
/*// https://www.php.net/manual/en/ref.math.php */