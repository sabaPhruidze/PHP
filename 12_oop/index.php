<?php
//object oriented პროგრამირება OOP არის პროგრამირების მეთოდოლოგია ,პარადიგმი რომელსაც
//როდესაც დაშენებული არის ყველაფერი ობიექტების გარშემო
// What is class and instance (0ცვლადი)
//კლასი არის template ხოლო ობიექტი არის ამ templates სგან შექმნილი ცვლადი
//კლასი არის მაგალითად მანქანის ნახაზი ხოლო ობიექტი ამ ნახაზისგან შექმნილი მანქანა
//კლასი არის მაგალითად ტორტის გამოსაცხობი ფორმა ხოლო ობიექტი ის რაც გამოვაცხვეთ ამით
//მემკვიდრეობისას შემოდის 
//არსებობს public private და protected
//მიღებულია რომ კლასი იწერება ცალკე ფოლდერში
//require-once სით შევიტან შემოვიტანო რომ არ მოხდეს ორჯერ ჩაწერა
require_once './Person.php';
require_once './Student.php';
//instance
// $person = new Person(); // შეიქმნა ცვლადი რომელიც ატარებს ყველა იმ თვისებას რაც Person კლასს გააჩნია
// $person->name = 'Zoro'; // -> აღნიშნავს $person ში nameს
// $person->surname = 'Zolares'; // $ ამას ეს არ ეწერება
// echo $person->hello(); // ჩაწერს 'Hello I am Zoro' ს რადგან this შეესაბამება personს name კი Zoros
// აქ public არის რომელზე წვდომაც შესაძლებელია კლასის გარეთაც
//property არის ამ კლასთან ასოცირებული ცვლადი
//მეთოდები არის ამ კლასთან ასოცირებული ფუნქციები

// Age ს აქ ვერ დავუსეტავ რადგან private არის და მისი გამოყენება მხოლოდ Person ში შეიძლება
// $person1 = new Person(); // მეორე პერსონის ჩასაწერად ახალი ცვლადი უნდა შევმნა
// $person1->name = 'zazuzo'; // აქ რეალურად ეს ნაწილები მეორდება და ამისთვის არსებობს კონსტრუქტორი
// $person1->surname = 'leyweln';
// echo '<br>';
// echo $person1->hello();
// უფრო მარტივად ასე ჩაიწერება
$person = new Person('Zoro', 'zolaress'); // construct ს გადაეცემა ეს არგუმენტები

$person1 = new Person('arthur', 'leywin');
echo '<pre>';
var_dump($person, $person1);
echo '</pre>';
$person->setAge(28); // ვანიჭებ 
echo $person->getAge() . '<br>'; // ვიღებ მნიშვნელობას
$person1->setAge(38); // არ ჩაწერს რადგან 0 ზე ნაკლებია fatal errors ამოაგდებს
echo $person1->getAge() . '<br>';



$student = new Student('stundet name', 'student surname', '23324832');
var_dump($student);
echo '<br>';
echo $student->studentId . '<br>';
echo $student->hello();
/*
რაში დამჭირდება : ძალიან ხშირად getterები და setter ები გამოიყენება ლოგიკის გასატარებლად
როდესაც მინდა მაგალითად ასაკის დასეტვა .
public როცა არის ასაკის შეზღუდვა რთულია 
private ით კი შემიძლია ლოგიკა ჩავწერო setAge
*/
// Create Person class in Person.php

// Create instance of Person

// Using setter and getter

// მემკვიდრეობა