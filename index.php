<?php
$deck = array();
$deckValues = array();
$deckSuits = array();
$suitArray = array("clubs", "diamonds", "hearts", "spades");
$cardTypes = array('A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J','Q','K');
$playerNames = array("Matthew", "Ruth", "Ester", "Jude");
$players = array();

// Randomize the player order
for($i = 0; $i < 3; $i++)
{
    $r = rand(0, 3 - $i);
    $players[] = $playerNames[$r];
    array_splice($playerNames, $r, 1);
}
$players[] = $playerNames[0];

$playerScores = array(0,0,0,0);
// Initialize deck
for ($i = 0; $i < 52; $i++){
    //true means this card is in the deck
    //we will set these to false when we grab a random card
    $deck[] = true;
}

//print_r($deck);
// Initalize deckValues and deckSuits
for ($i = 0; $i < 4; $i++)
{
    for ($j=1; $j<14; $j++){
        $deckValues[] = $j;
        $deckSuits[] = $suitArray[$i];
    }
}

// Get the index of a random card that is still in the deck
function popRandCard()
{
    global $deck;
    $r = rand(0, 51);
    while(!$deck[$r])
    {
        $r = rand(0,51);
    }
    $deck[$r] = false;
    return $r;
}
// Displays a card image based on its index in the deck
function displayCardImage($i){
    global $deckSuits;
    global $deckValues;
    echo '<img class="card" src="img/cards/';
    echo $deckSuits[$i];
    echo '/';
    echo $deckValues[$i];
    echo '.png"/>';
}
// Gets a set of cards drawn by the player
function getHand()
{
    global $deckValues;
    $hand = array();
    $sum = 0;
    while ($sum < 37)
    {
        $c = popRandCard();
        $sum += $deckValues[$c];
        $hand[] = $c;
    }
    return $hand;
}
// Displays a set of cards in a row
function displayHand($hand)
{
    foreach($hand as $c)
    {
        displayCardImage($c);
    }
}
// Displays the winner of the game, if there is a tie, display all the winners
function displayWinners()
{
    global $playerScores;
    global $players;
    $highScore = 0;
    for($i = 0; $i < 4; $i++)
    {
        if($playerScores[$i] > $highScore && $playerScores[$i] < 43)
        {
            $highScore = $playerScores[$i];
        }
    }
    
    //echo 'high score: ';
    //echo $highScore;
    $winnerCount = 0;
    $winners = [];
    for($i = 0; $i < 4; $i++)
    {
        if($playerScores[$i] == $highScore)
        {
            $winners[] = $players[$i];
            $winnerCount++;
        }
    }
    if($winnerCount == 1)
    {
        echo $winners[0];
        echo ' wins, with a score of: ';
    }
    else {
        for($i = 0; $i < $winnerCount; $i++)
        {
            if($i == $winnerCount - 1)
            {
                echo 'and ';
                echo $winners[$i];
                echo ' are tied for winner, with a score of: ';
            }
            else
            {
                echo $winners[$i];
                echo ', ';
            }
        }
    }
    
    $totalScore = 0;
    for($i = 0; $i < 4; $i++) $totalScore += $playerScores[$i];
    echo $totalScore;
}
// This method should display the profile picture and info for a the player: $players[$i]
function displayPlayerInfo($d)
{
    global $players;
    //ADDED PLAYER PICS
    echo '<img class="player" src = "img/players/';
    echo $players[$d];
    echo '.png">';
    //TODO: finish this method
    echo $players[$d];
    
}
// This method should display a score based on $score
function displayScore($score)
{
    //TODO: finish this method
    echo $score;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Silverjack Game </title>
        <style>
            @import url("css/style.css");
        </style>
    </head>
    <body>
        <?php
        // Now, for the four players, assign them each a hand and display it
        global $playerScores;
        global $deckValues;
        for($i = 0; $i < 4; $i++)
        {
            //start by getting a hand
            $hand = getHand();
            
            // add the values of the cards in the hand to create a score
            $score = 0;
            foreach($hand as $c) $score += $deckValues[$c];
            
            
            // Save the score
            $playerScores[$i] = $score;
            
            // display the player info for this player
            displayPlayerInfo($i);
            // followed by their hand
            displayHand($hand);
            // followed by their score
            displayScore($score);
            echo '<hr>';
        }
        displayWinners();
        ?>
    </body>
</html>
