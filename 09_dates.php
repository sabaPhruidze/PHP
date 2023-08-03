<?php
//print current timestap არის ორი ფორმატის მილიწამების და წამების.აქ წამებითაა
echo time() . '<br>'; // 1970 წლიდან ითვლის

// Print current date
echo date('y-m-d H:i:s'); // დაფორმატებას მივუთითებთ ინდივიდუალურს
echo '<br>';
//y-year,m-month,d-date, H-hours,i-minutes,s-seconds
// Print yesterday
echo date('y-m-d H:i:s', time() - 60 * 60 * 24) . '<br>';
// Different format: https://www.php.net/manual/en/function.date.php //აქ არის მითითება სადაც შემიძლია რომ ვნახო ფორმატები გამზადებული
echo date('F j Y, H:i:s') . '<br>';
// Print current timestamp
echo strtotime('now') . '<br>';
echo strtotime('+1 day') . '<br>';
echo strtotime('+1 week') . '<br>';
// Parse date: https://www.php.net/manual/en/function.date-parse.php
$dateString = '2020-10-10 16:00:00';
$parsedDate = date_parse($dateString);
echo '<pre>';
var_dump($parsedDate);
echo '</pre>';
// Parse date from format: https://www.php.net/manual/en/function.date-parse-from-format.php
$dateString1 = 'February 4 2020 12:45:35'; //განსხვავებული ფორმატისას
$parsedDate1 = date_parse_from_format('F j Y H:i:s', $dateString1); //j is number from 0-31
echo '<br>';
echo '<pre>';
var_dump($parsedDate1);
echo '</pre>';
