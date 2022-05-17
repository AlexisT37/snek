<?php
class Product
{


    function __construct(private string $name, private string $description, private float $price)
    {
    }
}

$product1 = new Product("iPhone 12", "a nice phone but not my type", 1200.88);

var_dump($product1);

echo '<br>';
