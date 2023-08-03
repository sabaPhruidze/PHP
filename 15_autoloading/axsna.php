<!-- //composer.json არის ｐｈｐ project configuration ფაილი რომელშიც  შეგვიძლია განვსაზღვროთ auto-loading ის ფოლდერი
//აგრეთვე შეგვიძლია განვსაზღვროთ რა package ჯებზე არის ჩვენი package დამოკიდებული
//როდესაც ახალ package ებს დავაყენებთ auto loading გი ამ package ებზეც მოხდება  -->
<!-- {
    "name": "home/15_autoloading", package name არის ეს
    "autoload": {
        "psr-4": {
            "Home\\15Autoloading\\": "src/"
        }
    },
    "authors": [ ავტორი ვარ მე
        {
            "name": "Saba",
            "email": "phruidzesaba@gmail.com"
        }
    ],
    "require": {},
    "autoload": { //აამას ვწერ და ზევით მძიმე არ დამავიწყდეს
        "psr-4": { autoloading სტანდარტს
        "app\\":"./"  namespace დასახელებას და ფოლდერის დასახელებას ვწერ აქ. რომელ namespace რომელი ფოლდერი შეესაბამება
        შესაბამისად email და person ან ნებისმიერი class უნდა განვათავსო app namespace_ის  ში 
        //ანუ ერთ ფოლდერში განვათავსე და აქაც შესაბამისად დავუწერ"app\\":"./app"
        
        }
    }
}
 -->