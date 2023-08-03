<?php
// protected არის public და private მსგავსი იმ განსხვავებით რომ შეგვიძლია გამოვიყენოთ არამარტო კონკრეტულ კლასში არამედ მის შვილობით კლასებშიც თუმცა ამ კლასებს გარეთ არა
class Person
{
    // შემიძ₾ია მივუთითო ტიპები
    public string $name; // property
    public string $surname; // property 
    protected int $age; // property null ს ვერ მივუთითებთ
    public function __construct($name, $surname) // რაც მეორდება ავტომატურად გამოიძახე როდესაც ახალი ინსტანცია იმნება
    // ახალი ინსტანცია იქმნება როცა ცვლადს ვანიჭებთ new Person()
    {
        $this->name = $name; // $ ერთ შემთხვევაში უნდა მეორეში არა
        $this->surname = $surname;
    }
    public function hello() // მეთოდი
    {
        return 'Hello I am ' . $this->name . ' ' . $this->surname;
    }
    public function setAge($age) // რადგან გარედან წვდომა არ გვაქვს ვიყენებთ ამ get და set ფუნქციებს
    {
        if ($age > 0) {
            $this->age = $age;
        } else {
            throw new Exception('შეცდომაა'); // ესე იწერება error რომ გამომიგზავნოს
        }
    }
    public function getAge() // რადგან გარედან წვდომა არ გვაქვს ვიყენებთ ამ get და set ფუნქციებს
    {
        return $this->age;
    }
};
