<?php
//this is a program that allows us to filter through an array of strings according to a letter
declare(strict_types=1);
class StartWith
{
    public function __construct(private string $startWith)
    {
        //construct allows us to quickly build the instance without having to declare the variables
    }

    public function __invoke(string $chaine)
    {
        return str_starts_with($chaine, $this->startWith);
        //invoke allows us to use the object as a function
        //returns the result of the method where it starts with the chain
    }
}

var_dump(array_filter(["Scourge", "Firebrand", "Virtuoso", "Mechanist", "Mesmer", "Mage", "Meridian"], new StartWith("M")));
