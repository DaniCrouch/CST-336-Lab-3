<?
$deck = array();
for ($i=1; $i<53; $i++){
    $deck[] =$i;
}
$shuffle[$deck];
print_r($deck);
$card = array_pop($deck);

$PlayerNames = array("Matthew", "Ester", "Jude", "Ruth");
$card_types = array('A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J','Q','K');

function displayCardImage(){
    global $deck;
    $suitArray = array("clubs", "diamonds", "hearts", "spades");
    $randomIndex = rand(0,3);
    $randomSuit = $suitArray[$randomIndex];
    echo "<img src='img/cards/$randomSuit/".rand(1,13).".png'/>";

function getHand()
{
}
function displayHand()
{
}
function displayWinners()
{
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Silverjack Game </title>
    </head>
    <body>
      
      
      
    </body>
</html>
