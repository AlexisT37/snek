<?php

function ending($die1, $die2, $case)
{
    $play = $die1 + $die2 + $case;
    echo '<br>';
    echo "play: " . $play;
    echo '<br>';
    $endmode = 100 - $play;
    echo "this is endmode: " . $endmode;
    if ($endmode < 0) {
        $theend = "bounce";
    } elseif ($endmode == 0) {
        $theend = "You win !";
    } else {
        $theend = "not yet";
    }
    return $theend;
}
$hello = ending(6, 5, 90);
echo '<br>';
echo $hello;
