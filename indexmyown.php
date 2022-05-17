<?php

declare(strict_types=1);
class Guardian
{
    public float $virtue;
    public float $resolvecharges;

    public function thisIsMyRaid(): float
    {
        return $this->virtue * $this->resolvecharges;
    }
}

$willbender = new Guardian;
$willbender->virtue = 4.9;
$willbender->resolvecharges = 8.7;
echo "raid";

$raid = $willbender->thisIsMyRaid();
var_dump($raid);
echo "raid";
