<?php

declare(strict_types=1);
const RESULT_WINNER = 1;
const RESULT_LOSER = -1;
const RESULT_DRAW = 0;
const RESULT_POSSIBILITIES = [RESULT_WINNER, RESULT_LOSER, RESULT_DRAW];

class Encounter
{

    // creates a method that is public, which means it can be used outside the class
    //the function is called probability against, it takes 2 integers, the level of the 1st player
    // and the level of the second player. The level of player 1 is subtracted from player 2
    //it will return a float because what we return is the odds of the 1st player winning against the 2nd player in %
    public function probabilityAgainst(int $levelPlayerOne, int $againstLevelPlayerTwo): float
    {
        // we return the result of the formula of odds of winning
        return 1 / (1 + (10 ** (($againstLevelPlayerTwo - $levelPlayerOne) / 400)));
    }

    //creates a public method called setNewLevel that takes 1 int by reference, returns nothing, takes the second level of player 1, and the result of player 1
    //that means that according the result of player one, and the level of player 1 and 2, it will change the level of player 1
    //if player 1 won, his score will increase, and vice versa
    //we don't return anything we just change the variable $levelPlayerOne directly
    public function setNewLevel(int &$levelPlayerOne, int $againstLevelPlayerTwo, int $playerOneResult)
    {
        //we check whether the result that we set is a proper value in the array result possibilities
        //that means that we check if the result parameter is 1, 0 or -1
        if (!in_array($playerOneResult, RESULT_POSSIBILITIES)) {
            // if it isn't the case, then we show an error with the various possibilities
            trigger_error(sprintf('Invalidresult. Expected %s', implode(' or ', RESULT_POSSIBILITIES)));
        }
        // WE increase $levelPlayerOne by an int from 32 multiplyed by the probability of the encounter, given the levels or player 1 and 2
        $levelPlayerOne += (int) (32 * $playerOneResult - $this->probabilityAgainst($levelPlayerOne, $againstLevelPlayerTwo));
    }
}

// make two example of variable, 2 players
$greg = 400;
$jade = 800;

//instianciate a new encounter
$encounter = new Encounter;

//prints the result of the encounter given our 2 variables, with a text
echo sprintf(
    'Greg a %.2f%% chance de gagner face a Jade',
    $encounter->probabilityAgainst($greg, $jade) * 100
);

echo '<br>';


// we set the new level of greg and jade given greg won
// we set the level of greg first, then the level of jade
// since we exchange the view, that is why we need to switch the variable order and the result
$encounter->setNewLevel($greg, $jade, RESULT_WINNER);
$encounter->setNewLevel($jade, $greg, RESULT_LOSER);


//we print the new levels of the 2 players
echo sprintf(
    'les niveaux des jjoueurs ont evolue vers %s pour Greg et %s pou jade',
    $greg,
    $jade
);

exit(0);
