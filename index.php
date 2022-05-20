<?php

class Customer
{
    protected static int $coin = 777;
    public function __construct(protected  $id, protected $name, protected string $email, protected $balance)
    {
    }
}

class Customer2 extends Customer
{
    public static function getCoin()
    {
        echo parent::$coin;
    }
}



$customer = new Customer2(2, "teso", "al@gmail.com", 499);
var_dump($customer);
echo '<br>';

Customer2::getCoin();
