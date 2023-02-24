<?php
require 'Player.php';
class ScoreBoard
{
    private $scores = [];
    private $players = [];
    public function __construct($players) 
    {
        $this->players = $players;
    }
    private function calculatePlayerScore($player)
    {
        $total = 0;
        foreach ($player->getPinsThrown() as $round) {
            $x = $round[0] = $round[1];
            $total = $x + $total;
        }
        echo $player->getName()," heeft $total punten" . PHP_EOL;
    }
    private function calculateAllScores()
    {
        foreach ($this->players as $player) {
            $this-> calculatePlayerScore($player);  
        }
    }
    public function displayScores()
    {
        $this-> calculateAllScores();
    }
    public function displayWinner()
    {
        return $this-> displayScores();
    }  
}
?>