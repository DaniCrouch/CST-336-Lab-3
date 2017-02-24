<?php
$deck = array();
$playerNames = array("Matthew", "Ruth", "Ester", "Jude");
$playerScores = array(0,0,0,0);
$deckValues = array();
$suitArray = array("clubs", "diamonds", "hearts", "spades");
$deckSuits = array();
$card_types = array('A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J','Q','K');

//make these global
global $deck;
global $deckValues;
global $deckSuits;
global $playerScores;

// initialize deck
for ($i = 1; $i < 53; $i++){
    //true means this card is in the deck
    //we will set these to false when we grab a random card
    $deck[] = true;
}
//print_r($deck);

// initalize deckValues and deckSuits
for ($i = 0;$i < 4;$i++)
{
    for ($j=1; $j<13; $j++){
        $deckValues[] = $j;
        $deckSuits[] = $suitArray[$i];
    }
}

//get the index of a random card that is still in the deck
function popRandCard(){
    $r=rand(0,51);
    while(!$deck[$r]){$r=rand(0,51);}
    $deck[$r]=false;
    return $r;
}
//displays a card image based on its index in the deck
function displayCardImage($i){
    echo "<img class='card' src='img/cards/$deckSuites[$i]/$deckValues[$i].png'/>";
}

//gets a set of cards drawn by the player
function getHand()
{
    $hand = array();
    $sum = 0;
    while (sum < 37)
    {
        $c = popRandCard();
        $sum += $deckValues;
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
    $highScore = max($playerScores);
    $winnerCount = 0;
    $winners = [];
    for($i = 0; $i < 4; $i++)
    {
        if($playerScores == $highScore)
        {
            $winners[] = $playerNames[$i];
            $winnerCount++;
        }
    }
    if($winnerCount == 1) echo $winners[0] + ' wins';
    else {
        for($i = 0; $i < $winnerCount; $i++)
        {
            if($i == $winnerCount - 1) echo 'and ' +$winners[$i] + ' are tied for winner';
            else echo $winners[$i] + ', ';
        }
    }
}

// This method should display the profile picture and info for a the player: $playerNames[$i]
function displayPlayerInfo($i)
{
    //TODO: finish this method
    echo $playerNames[$i];
}

// This method should display a score based on $score
function displayScore($score)
{
    //TODO: finish this method
    echo $score;
}

// function displayWinners()
// {
// This method for displaying winners is not abstract enough.
// There is no need to define players as variables in the code
// There is also no reason that each case needs to be explicitly written out,
// see the code above if you don't know what I mean.
//     $winner = max(array($Matthew, $Ester, $Jude, $Ruth));
//     switch($winner)
//     case "$Matthew":
//         if ($Matthew==$Ester&&$Matthew==$Ruth&&$Matthew==$Jude)
//         {echo "It is a four way tie";}
//         else if ($Matthew==$Ester&&$Matthew==$Ruth&&$Matthew!=$Jude)
//         {echo "It is a three way tie between Matthew, Ester, and Ruth";}
//          else if ($Matthew==$Ester&&$Matthew!=$Ruth&&$Matthew==$Jude)
//         {echo "It is a three way tie between Matthew, Ester, and Jude";}
//          else if ($Matthew!=$Ester&&$Matthew==$Ruth&&$Matthew==$Jude)
//         {echo "It is a three way tie between Matthew, Jude, and Ruth";}
//          else if ($Matthew==$Ester&&$Matthew!=$Ruth&&$Matthew!=$Jude)
//         {echo "It is a tie between Matthew and Ester";}
//          else if ($Matthew!=$Ester&&$Matthew==$Ruth&&$Matthew!=$Jude)
//         {echo "It is a tie between Matthew and Ruth";}
//          else if ($Matthew!=$Ester&&$Matthew!=$Ruth&&$Matthew==$Jude)
//         {echo "It is a tie between Matthew and Jude";}
//         else{
//             echo "Matthew wins";
//         }
//         break;
//     case "$Ruth":
//          else if ($Ruth==$Ester&&$Ruth!=$Matthew&&$Ruth==$Jude)
//         {echo "It is a three way tie between Ruth, Ester, and Jude";}
//          else if ($Ruth==$Ester&&$Ruth!=$Matthew&&$Ruth!=$Jude)
//         {echo "It is a tie between Ruth and Ester";}
//          else if ($Ruth!=$Ester&&$Ruth!=$Matthew&&$Ruth==$Jude)
//         {echo "It is a tie between Ruth and Jude";}
//         else{
//             echo "Ruth wins";
//         }
//         break;
//     case "$Ester":
//          else if ($Ruth!=$Ester&&$Ester!=$Matthew&&$Ester==$Jude)
//         {echo "It is a tie between Ester and Jude";}
//         else{
//             echo "Ester wins";
//         }
//         break;
//     case "$Jude":
//         else{
//             echo "Jude wins";
//         }
//         break;
// }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Silverjack Game </title>
    </head>
    <body>
    </body>
</html>
