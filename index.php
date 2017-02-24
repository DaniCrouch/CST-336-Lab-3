<?php
$deck = array();
$deckValues = array();
$deckSuits = array();
$suitArray = array("clubs", "diamonds", "hearts", "spades");
$cardTypes = array('A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J','Q','K');
$playerNames = array("Matthew", "Ruth", "Ester", "Jude");

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

//randomizes player order
function RanPlayer()
{
    $myRange = range(0,3);
shuffle($myRange);
return $myRange[0];
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
    echo '<img class="card" src="IMG/cards/';
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
    global $playerNames;
    
    $highScore = max($playerScores);
    $winnerCount = 0;
    $winners = [];
    for($i = 0; $i < 4; $i++)
    {
        if($playerScores[$i] == $highScore)
        {
            $winners[] = $playerNames[$i];
            $winnerCount++;
        }
    }
    if($winnerCount == 1)
    {
        echo $winners[0];
        echo ' wins';
    }
    else {
        for($i = 0; $i < $winnerCount; $i++)
        {
            if($i == $winnerCount - 1)
            {
                echo 'and ';
                echo $winners[$i];
                echo ' are tied for winner';
            }
            else
            {
                echo $winners[$i];
                echo ', ';
            }
        }
    }
}
// This method should display the profile picture and info for a the player: $playerNames[$i]
function displayPlayerInfo($d)
{
    global $playerNames;
    //ADDED PLAYER PICS
    echo '<img src = "/Labs/Lab3/IMG/';
    echo $playerNames[$d];
    echo '.png">';
    //TODO: finish this method
    echo $playerNames[$d];
    
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
            
            // If this score "busts" or is greater than 42, we give the player
            // a negative score.
            if($score > 42)
            {
                $score = 42 - $score;
            }
            //randomizes the characters order
          $d = RanPlayer();
            // Save the score
            $playerScores[$d] = $score;
            
            // display the player info for this player
            displayPlayerInfo($d);
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
