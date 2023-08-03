<?php

// Create simple string
$string1 = '   hello  world1  ';
$string2 = 'hello world 2';

echo $string1 . '<br>' . $string2;
// String concatenation
echo $string1 . '<br>' . $string2 . ' nanio suruno';
echo "<br>";
echo "Hello Hello $string1 helloppppp $string2";
// " აქ ჩაწერისას პირდაპირ შეგვიძლია ჩავწეროთ ცვლადი და აღიქვავს" 'ეს ვერ აღიქვავს და წერტილის გამოყენება მიწევს'
// String functions
echo "<br>";
echo strlen($string1) . '<br>'; // string ის სიგრძეს თვლის space ების ჩათვლით
echo trim($string1) . '<br>'; // მარცხნიდანაც და მარჯვნიდანაც space ებს აშორებს
echo ltrim($string1) . '<br>'; //მარცხნიდან აძრობს spaceბს
echo rtrim($string1) . '<br>'; // მარჯვნიდან აძრობს spaceებს
echo str_word_count($string1) . '<br>'; // რამდენი სიტყვა არსებობს
echo strrev($string1) . '<br>'; // უკუღმა წერს სტრინგს
echo strtoupper($string1) . '<br>'; // ყველაფერი დიდ ასოებში გადაყავს
echo strtolower($string1) . '<br>'; // ყველაფერი პატარა ასოებში გადაჰყავს
echo ucfirst('hello') . '<br>'; //პირველი ასო გადაჰყავს დიდად. upper case first
echo lcfirst('HELLO') . '<br>'; //პირველ ასოს პატარას ხდის.
echo ucwords('hello worlds') . '<br>'; //ყოველი სიტყვის პირველი ასო გადაჰყავს upper case ში.
echo strpos($string1, 'world') . '<br>'; // აბრუნებს რომელ პოზიციაზეა, ანუ length ს ჩაწერს დასაწყისიდან ამ სიტყვამდე. თუმცა თუ ეს სიტყვა არ არის სიცარიელეს დააბრუნებს
echo stripos($string1, 'word') . '<br>'; // case insensitive არ აკვირდება დიდი ასოთი წერია თუ პატარათი დააბრუნებს იგივეს რაც strpos
str_replace('world1', 'PHP', $string1); //ეძებს world ს და ანაცვლებს phpით.case sensitive
str_ireplace('world1', 'PHP', $string1); //ignore case ამ შემთხვევაში დიდ და პატარა ასოს არ აქცევს ყურადღებას. 
echo substr($string1, 5) . '<br>'; // ანუ დასაწყისიდან სიგრძეს მოჰყვება და დაწერილ რიცხვამდე ყველაფერს იღებს სტრინგიდან მაგ ჩაწერს llo world1 .აკლებს
echo substr($string1, 5, 8) . '<br>'; // 5 დან მომდევნო 8 ს ამოიღებს

$inconvenienceNumber = 100; //0000100
$inconvenienceNumber2 = 123456; // 0123456  ანუ მინდა რომ ერთნაირი სიგრძე ჰქონდეს
echo str_pad($inconvenienceNumber, 8, '0', STR_PAD_LEFT) . '<br>'; // გადაეცემა სტრინგი რისი დაფორმატებაც გვინდა, ჯამური რაოდენობა რამდენი გახდეს, რა მინდა მივამატო, საიდან მინდა მივამატო
echo str_pad($inconvenienceNumber2, 8, '0', STR_PAD_RIGHT) . '<br>'; // რას ,რამდენი,რა,საიდან 12345600
echo str_pad($inconvenienceNumber2, 8, '0', STR_PAD_BOTH) . '<br>'; // რას ,რამდენი,რა,საიდან 01234560
echo str_repeat('naze ', 8) . '<br>'; // 8 ჯერ გაამეორებს ამ სიტყვას
// Multiline text and line breaks
$longText = "
Hello my name is
'saba' I am 22 years old and 
I want to learn everything
";
echo $longText;
echo nl2br($longText);

$longText1 = "
Hello my name <b>is</b>
'saba' I am <b>22 years old</b> and 
I want to learn everything
";
echo nl2br($longText1) . '<br>'; //<b>ებს აღიქვავს
echo htmlentities($longText1) . '<br>'; // <b> ებს წერს
echo nl2br(htmlentities($longText1)) . '<br>'; // <b>ეს დააბრუნებს
echo html_entity_decode(htmlentities($longText1));// გამართულად წერს ისე რომ b ებს აღიქვავს

// Multiline text and reserve html tags;

// https://www.php.net/manual/en/ref.strings.php;