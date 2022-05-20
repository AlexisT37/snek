<?php

//snake class
//method to play
//case where you bounce of the final step
//case where you win
//case where you try to play but the game is already over


class SnakesLadders
{
    function __construct(public $currentPlayer = 1, public $square1 = 0, public $square2 = 0, public $currentSquare = 0)
    {
    }
    //general function play
    public function play($die1, $die2)
    {
        // the square of the current play is equal to itself + the dice
        if ($this->isSnake($this->currentSquare)) {
            $this->useSnake($this->currentSquare);
        } elseif ($this->isLadder($this->currentSquare)) {
            $this->useLadder($this->currentSquare);
        }

        if ($this->isending($this->currentSquare)) {
            echo $this->ending($die1, $die2, $this->currentSquare);
        }

        $this->move($die1, $die2);
        $res = sprintf('Player %s is on square %s', $this->currentPlayer, $this->currentSquare);
        if (!$this->isdouble($die1, $die2)) {
            $this->switchPlayer();
        }
        return $res;
    }
    //checks if the roll is double
    private function isdouble($die1, $die2)
    {
        $replay = false;
        if ($die1 == $die2) {
            $replay = true;
        }
        return $replay;
    }

    //increase the square by the amount of die cast
    private function move($die1, $die2)
    {
        $this->currentSquare += ($die1 + $die2);
    }

    //checks if the square where we landed after the die cast is a snake
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

    //checks if the square where we landed after the die cast is a ladder
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

    //tests whether we are in the range of the ending
    private function isending($square): bool
    {
        $isendgame = false;
        if (100 - $square <= 12) {
            $isendgame = true;
        }
        return $isendgame;
    }

    private function ending($die1, $die2, $case)
    {
        $play = $die1 + $die2 + $case;
        $endmode = 100 - $play;
        if ($endmode < 0) {
            $theend = "bounce";
        } elseif ($endmode == 0) {
            $theend = "You win !";
        } else {
            $theend = "not yet";
        }
        return $theend;
    }

    private function win($player)
    {
        return sprintf("Player % Wins!", $player);
    }

    private function bounce($offset)
    {
        $this->case = 100 + $offset;
    }

    private function alreadyOver()
    {
        return "Game over!";
    }


    //get to the snake tail
    private function useSnake($square): int
    {
        $snakes = [16, 46, 49, 62, 64, 74, 89, 92, 95, 99];
        $thisSnake = array_search($square, $snakes);
        $snakeDestination = [6, 25, 11, 19, 60, 53, 68, 88, 75, 80];
        return $snakeDestination[$thisSnake];
    }

    //get to the ladder top
    private function useLadder($square): int
    {
        $ladders = [2, 7, 8, 15, 21, 28, 36, 51, 71, 78, 87];
        $thisLadder = array_search($square, $ladders);
        $ladderDestination = [38, 14, 31, 26, 42, 84, 44, 67, 91, 98, 94];
        return $ladderDestination[$thisLadder];
    }

    //switch the player
    private function switchPlayer()
    {
        if ($this->currentPlayer == 1) {
            $this->currentPlayer = 2;
            $this->currentSquare = $this->square2;
        } elseif ($this->currentPlayer == 2) {
            $this->currentPlayer = 1;
            $this->currentSquare = $this->square1;
        }
    }

    // public function getvars()
}

$alex = new SnakesLadders();
var_dump($alex);
echo ($alex->play(1, 3));
echo ($alex->play(4, 3));
