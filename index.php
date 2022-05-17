<?php

declare(strict_types=1);


// we have 2 classes: Lobby and Player
class Lobby
{
    /* @var array<QueuingPlayer> */
    public array $queuingPlayers = [];
    // array for the number of queuing players

    public function findOponents(QueuingPlayer $player): array
    // function that finds oponent and  takes the object queing player as an argument, returns an array of oponents
    {
        $minLevel = round($player->getRatio() / 100);
        // round the ratio of the player to the nearest integer
        $maxLevel = $minLevel + $player->getRange();
        // add the range of the player to the min level to get the max level

        return array_filter($this->queuingPlayers, static function (QueuingPlayer $potentialOponent) use ($minLevel, $maxLevel, $player) {
            // filter the queuing players array to find potential oponents
            $playerLevel = round($potentialOponent->getRatio() / 100);
            // round the ratio of the potential oponent to the nearest integer to get the level of the player

            return $player !== $potentialOponent && ($minLevel <= $playerLevel) && ($playerLevel <= $maxLevel);
            // returns player if the player is not the potential oponent and the player level is between the min and max level
        });
    }

    public function addPlayer(Player $player): void
    // function to add a player
    {
        $this->queuingPlayers[] = new QueuingPlayer($player);
        // add the player to the queuing players array
    }

    public function addPlayers(Player ...$players): void
    // function to add multiple players
    {
        foreach ($players as $player) {
            // foreach player in the players array
            $this->addPlayer($player);
            // add the player to the queuing players array
        }
    }
}

class Player
{
    public function __construct(protected string $name, protected float $ratio = 400.0)
    // constructor for the player class that uses the name and ratio as arguments
    {
    }

    public function getName(): string
    {
        return $this->name;
        // returns the name of the player
    }

    private function probabilityAgainst(self $player): float
    {
        return 1 / (1 + (10 ** (($player->getRatio() - $this->getRatio()) / 400)));
        // returns the probability of the player against the player
        // the formula is 1 / (1 + (10 ^ ((player ratio - player ratio) / 400)))
    }

    public function updateRatioAgainst(self $player, int $result): void
    //functon to uptade the ration again a player with the result of the match
    {
        $this->ratio += 32 * ($result - $this->probabilityAgainst($player));
        // add 32 to the ratio of the player depending on the result of the match
        // the formula is 32 * (result - probability against the player)
        // the result is 1 if the player won, 0 if the player lost and -1 if the player drew
    }

    public function getRatio(): float
    //getter for the ration of the player
    {
        return $this->ratio;
        // returns the ratio of the player
    }
}

//this class qeueuing player is a child of the player class
class QueuingPlayer extends Player
//class to extend the player class
{
    public function __construct(Player $player, protected int $range = 1)
    //constructor using the parent class player, and the range protected 1
    {
        parent::__construct($player->getName(), $player->getRatio());
        // use the parent class player to get the name and ratio of the player
    }

    public function getRange(): int
    // functon to get the range of the player
    {
        return $this->range;
        //return the range of the queuing player
    }

    public function upgradeRange(): void
    // function to change the range, no return value
    {
        $this->range = min($this->range + 1, 40);
        // change the range of the queuing player to the min of the range + 1 and 40
        // if the range is greater than 40, change it to 40
        // if the range is less than 1, change it to 1
        // if the range is between 1 and 40, change it to the range + 1
    }
}

$greg = new Player('greg', 400);
// create a new player with the name greg and the ratio 400
$jade = new Player('jade', 476);
// create a new player with the name jade and the ratio 476

$lobby = new Lobby();
// create a new lobby
$lobby->addPlayers($greg, $jade);
// add the players greg and jade to the lobby

var_dump($lobby->findOponents($lobby->queuingPlayers[0]));
// find the oponents of the first player in the lobby

exit(0);
