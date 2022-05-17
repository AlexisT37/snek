<?php

declare(strict_types=1);

class User
//class of User
{
    public const STATUS_ACTIVE = 'active';
    // constant of status
    public const STATUS_INACTIVE = 'inactive';
    //constant of status inactive

    public static $nbrOfInitalizedUsers = 0;
    //static variable of number of users initialized

    public function __construct(public string $username, public string $status = self::STATUS_ACTIVE)
    //constructor of users that takesusername and status as parameters with status active
    {
    }
}

class Admin extends User
//class that takes from the User class
{
    public static $nbrofInitalizedAdmins = 0;
    //initialize the number of initialized admins

    public static function newInitalization()
    //function that initializes the number of admins
    {
        self::$nbrofInitalizedAdmins++;
        //self increments the number of admins
        parent::$nbrOfInitalizedUsers++;
        //looks at the parent class and increments the number of users because it is a child class
    }
}

Admin::newInitalization();
//runst the function that initializes the number of admins
var_dump(Admin::$nbrofInitalizedAdmins, Admin::$nbrOfInitalizedUsers, User::$nbrOfInitalizedUsers);
//displays the number of admins, users, and admins
