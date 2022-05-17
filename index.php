<?php

declare(strict_types=1);

class Mesmer
{
    public function __construct(public string $specialization, public string $weapon)
    {
    }
}

class Specialization
{
    public function __construct(public string $profession, protected Mesmer $mesmer)
    {
    }

    public function __clone()
    {
        $this->mesmer = clone $this->mesmer;
    }

    public function __toString()
    {
        return sprintf('Cette specialisation vient de la profession %d, avec l\'arme %d', $this->mesmer->specialization, $this->mesmer->weapon);
    }
}
$virtuoso = new Specialization("purple", new Mesmer("Virtuoso", "sword"));
var_dump($virtuoso);
$mirage = clone $virtuoso;
var_dump($mirage);
echo '<br>';

echo $virtuoso;
