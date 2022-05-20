<?php

//snake class
//method to play
//case where you have a snake
//case where you have a ladder
//case where you bounce of the final step
//case where you win
//case where you try to play but the game is already over
//play(die1, die2) is a method that takes 2 arguments: the die cast
//method to cast a die: return a value between 1 and 6 included

//the return value of the method play should be a string that countains the player number and the square
//when is the situation selection gonna be tested ?
// pay attention to the php version
class SnakesLadders
{



    function __construct(int $player = 1, int $square = 0)
    {
    }

    public function play($die1, $die2)
    {
        // the square of the current play is equal to itself + the dice
        $this->move($die1, $die2);
        $res = sprintf('Player % is on square %', $this->player, $this->square);
        $this->switchPlayer();
        return $res;
    }

    private function move($die1, $die2)
    {
        $this->square += ($die1 + $die2);
    }

    private function isdouble($die1, $die2): bool
    {
        $replay = false;
        if ($die1 == $die2) {
            $replay = true;
        }
        return $replay;
    }

    private function isSnake($square)
    {
        $snakes = [16, 46, 49, 62, 64, 74, 89, 92, 95, 99];
        if (in_array($square, $snakes)) {
            $thatisasnake = true;
        } else {
            $thatisasnake = false;
        }
        return $thatisasnake;
    }

    private function isLadder($square)
    {
        $ladders = [2, 7, 8, 15, 21, 28, 36, 51, 71, 78, 87];
        if (in_array($square, $ladders)) {
            $thatisaladder = true;
        } else {
            $thatisaladder = false;
        }
        return $thatisaladder;
    }

    private function ending($square): bool
    {
        $isendgame = false;
        if (100 - $square <= 6) {
            $isendgame = true;
        }
        return $isendgame;
    }

    private function useSnake($square): int
    {
        $snakes = [16, 46, 49, 62, 64, 74, 89, 92, 95, 99];
        $thisSnake = array_search($square, $snakes);
        $snakeDestination = [6, 25, 11, 19, 60, 53, 68, 88, 75, 80];
        return $snakeDestination[$thisSnake];
    }

    private function useLadder($square): int
    {
        $ladders = [2, 7, 8, 15, 21, 28, 36, 51, 71, 78, 87];
        $thisLadder = array_search($square, $ladders);
        $ladderDestination = [38, 14, 31, 26, 42, 84, 44, 67, 91, 98, 94];
        return $ladderDestination[$thisLadder];
    }

    private function switchPlayer()
    {
        if ($this->player == 1) {
            $this->player = 2;
        } elseif ($this->player == 2) {
            $this->player = 1;
        }
    }
}

$alex = new SnakesLadders();
var_dump($alex);
$toto =  get_class_methods('SnakesLadders');
var_dump($toto);
