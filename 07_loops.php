<?php

// while
//  while (true) { // გაუჩერებელი ციკლია რომლიც მუდმივად ივლის 

//  }
// Loop with $counter
$counter = 0;
while ($counter < 10) {
    echo "printing counter $counter" . '<br>';
    $counter++;
} // ანუ იზრდება 1 თით ყოველ ჯერზე counter ი 
// do - while
$counterDo = 0;
echo '<br>';
do {
    echo "printing counter $counterDo" . '<br>';
    $counterDo++;
} while ($counterDo < 10);
// განსხვავება dowhile სა და while შორის ისაა რომ doWhile ის დროს რომ დავწერო $counter < 0 ერთხელ მაინც ჩაწერს. while არ ჩაწერს
// for
echo '<br>';
for ($i = 0; $i < 10; $i++) {
    echo "Printing counter : $i" . '<br>';
}
echo '<br>';
// foreach
$fruits = ['Banana', 'Apple', 'Orange'];
foreach ($fruits as $i => $fruit) { //$i არის ინდექსი  რომელსაც 
    echo $i . ' ' . $fruit . '<br>'; // $fruit 
};
// Iterate Over associative array.// ასოციაციური მასივი
$person = [
    'name' => 'for',
    'surname' => 'new',
];
foreach ($person as $key => $value) {
    echo "$key $value " . '<br>'; //ჩაწერს მარცხნივ რაც წერია მარჯვნივ რაც წერია იმასთან ერთად
    // თუ მინდა როომ მაგალითად name როდესაც ჩაიწერება მაგის მერე აღარ გააგრძელოს ჩაწერა
    if ($key === 'name') {
        break; // ჩაწერს მხოლოდ 'name' => 'for',
    }
}
