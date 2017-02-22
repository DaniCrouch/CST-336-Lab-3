<?
$deck = array();
for ($i=1; $i<53; $i++){
    $deck[] =$i;
}
$shuffle[$deck];
print_r($deck);
$card = array_pop($deck);

function displayCardImage(){
    global $deck;
    $suitArray = array("clubs", "diamonds", "hearts", "spades");
    $randomIndex = rand(0,3);
    $randomSuit = $suitArray[$randomIndex];
    echo "<img src='img/cards/$randomSuit/".rand(1,13).".png'/>";
 
$PlayerNames = array("Matthew", "Ester", "Jude", "Ruth");

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
