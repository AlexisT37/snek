<?php

declare(strict_types=1);

const RESULT_WINNER = 1;
const RESULT_LOSER = -1;
const RESULT_DRAW = 0;
const RESULT_POSSIBILITIES = [RESULT_WINNER, RESULT_LOSER, RESULT_DRAW];

class Encounter
{
    private string $cat = "nina";
    private function probability(int $player1, int $player2): float
    {
        return 1 / (1 + (10 ** (($player2 - $player1) / 400)));
    }

    public function updatelevel(int &$player1, int $player2, int $result)
    {
        if (!in_array($result, RESULT_POSSIBILITIES)) {
            trigger_error(sprintf('Invalidresult. Expected %s', implode(' or ', RESULT_POSSIBILITIES)));
        }
        $player1 += (int) (32 * $result  - $this->probability($player1, $player2));
        // echo $this->cat;
    }

    public function changeCat(string $cat)
    {
        $this->cat = $cat;
    }

    public function seeMyCat()
    {
        echo $this->cat;
    }

    public function getCat()
    {
        return $this->cat;
    }

    public function print($parameter)
    {
        return print_r($parameter);
    }
}

$alex = 777;
$harshika = 999;
$hotstuffbetweenus = new Encounter;
// echo $cat;
// echo $hotstuffbetweenus->cat;
$hotstuffbetweenus->seeMyCat();

echo '<br>';

$hotstuffbetweenus->changeCat("Horace");
$hotstuffbetweenus->seeMyCat();

// echo sprintf(
//     'alex a %.2f%% chance de gagner face a shashou',
//     $hotstuffbetweenus->probability($alex, $harshika) * 100
// );

echo '<br>';

$hotstuffbetweenus->updatelevel($alex, $harshika, RESULT_LOSER);
$hotstuffbetweenus->updatelevel($harshika, $alex, RESULT_WINNER);

echo '<br>';

// echo sprintf(
//     'les niveaux des jjoueurs ont evolue vers %s pour Greg et %s pou jade',
//     $alex,
//     $harshika
// );

print_r(get_class_methods($hotstuffbetweenus));
echo '<br>';

$hotstuffbetweenus->print($hotstuffbetweenus->getCat());
