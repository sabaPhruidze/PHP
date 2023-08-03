<?php
//შვილობილი class
//require-once სით შევიტან შემოვიტანო რომ არ მოხდეს ორჯერ ჩაწერა
require_once 'Person.php';
class Student extends Person // ეს ნიშნავს რომ class students აქვს Person_ის ყველა property ზე და ყველა method ზე წვდომა
//წვდომა აქვს class students ყველაფერზე რაც public არის
{
    //შეგვიძლია გავაკეთოთ constructor overright გულისმობს იგივე სახელით მეთოდის გამოცხადებას
    // რომელსაც შეიძლება სხვა არგუმენტებიც ჰქონდეს გარდა იმისა რაც მშობელს აქვს
    public $studentId;
    public function __construct($name, $surname, $studentId)
    {
        //აქ age ს ვერ გამოვიყენებ რადგან private არის
        $this->studentId = $studentId;
        parent::__construct($name, $surname); // parent_ის კონსტრუქტორს გაჰყვება ის რაც ჰქონდა
    }
    public function hello()
    {
        $hello = parent::hello(); // ეს არის რაც parent იდან ბრუნდება
        return $hello . 'My student number is: ' . $this->studentId;
    }
}
