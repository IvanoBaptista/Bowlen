<?php
require 'ScoreBoard.php';
class BowlingGame
{
    private $scoreboard;
    private $players = [];
    private $round = 1;
    public function __construct() 
    {
        $aantal = readline("Voer het aantal spelers in: ");
        for ($x = 0; $x < $aantal; $x++) {
            $name = readline("Voer je naam in: ");
            $this->addPlayer($name);
        }
        $this->ScoreBoard = new ScoreBoard($this->players);
    }
    private function addPlayer($name) 
    {
        $playername = new Player($name);
        $this->players[] = $playername;
    }
    private function playRound() 
    {
        foreach ($this->players as $player) {
            $firstTry = readline("Poging 1 van {$player->getName()}:");
            $secondTry = readline("Poging 2 van {$player->getName()}:");
            $total = $firstTry + $secondTry;
            $player->throwPins($firstTry, $secondTry); 
        }
        $this->round = $this->round + 1;
    }
    private function playLastRound() 
    {
        foreach ($this->players as $player) {
            $lastTry = readline("Laatste poging van {$player->getName()}:");
        }
    }
    public function play() 
    {
        for ($v = 0; $v < 10; $v++) {
            $this->playRound();
            $this->ScoreBoard->displayScores();
            echo "round $this->round" . PHP_EOL;
        }
        $this->playLastRound();
        $this->ScoreBoard->displayScores();
        $this->ScoreBoard->displayWinner();
    }
}