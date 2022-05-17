<?php

declare(strict_types=1);
class Majuscule
{
    public function __invoke(string $chaine)
    {
        return strToUpper($chaine);
    }
}
$enMajuscule = new Majuscule;
echo $enMajuscule("chaine en minuscule");
