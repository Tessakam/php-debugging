<?php

/*
 Learning objectives
print_r, var_dump, die, echo, exit, break do
 */

//Displaying errors - no console.log in PHP
declare(strict_types=1);
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

// Below are several code blocks, read them, understand them and try to find whats wrong.
// Once this exercise is finished, we'll go over the code all together and we can share how we debugged the following problems.
// Try to fix the code every time and good luck ! (write down how you found out the answer and how you debugged the problem)
// =============================================================================================================================

// === Exercise 1 ===
// Below we're defining a function, but it doesn't work when we run it.
// Look at the error you get, read it and it should tell you the issue...,
// sometimes, even your IDE can tell you what's wrong
echo "Exercise 1 starts here:";

function new_exercise($x) //DONE: add the parameter to the function to define
{
    $block = "<br/><hr/><br/><br/>Exercise $x starts here:<br/>";
    echo $block;
}

new_exercise(2); //DONE: an array starts with 0
// === Exercise 2 ===
// Below we create a week array with all days of the week.
// We then try to print the first day which is monday, execute the code and see what happens.

$week = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"];
$monday = $week[0];

echo $monday;

new_exercise(3); //DONE: use single quotes
// === Exercise 3 ===
// This should echo ` "Debugged !" `, fix it so that that is the literal text echo'ed

$str = 'Debugged !Also very fun';
echo substr($str, 0, 10);

new_exercise(4); //DONE: added & to include the day substr
// === Exercise 4 ===
// Sometimes debugging code is just like looking up code and syntax...
// The print_r($week) should give:  Array ( [0] => mon [1] => tues [2] => wednes [3] => thurs [4] => fri [5] => satur [6] => sun )
// Look up whats going wrong with this code, and then fix it, with ONE CHARACTER!

foreach($week as &$day) {
    $day = substr($day, 0, strlen($day)-3);
}
print_r($week);

new_exercise(5); // DONE - changed 2th statement to != 'z' but the Z was not showing - saw the solution with != 'az'
// === Exercise 5 ===
// The array should be printing every letter of the alfabet (a-z) but instead it does that + aa-yz
// Fix the code so the for loop only pushes a-z in the array

$arr = [];
for ($letter = 'a'; $letter != 'aa'; $letter++) {
    array_push($arr, $letter);
}
print_r($arr); // Array ([0] => a, [1] => b, [2] => c, ...) a-z alfabetical array


new_exercise(6); //DONE
// === Final exercise === liar liar pants on fire!
// The fixed code should echo the following at the bottom:
// Here is the name: $name - $name2
// $name variables are decided as seen in the code, fix all the bugs whilst keeping the functionality!
$arr = [];

function combineNames($str1 = "",$str2 = "") {
    $params = [$str1, $str2];
    foreach($params as &$param) { //add & to solve error: unused local variable
        if ($param === "") {
            $param = randomHeroName();
        }
    }
    return implode(" - ", $params); //solved syntax error + return
    // implode = Join array elements with a string
}

/* function randomHeroName 2x not necessary?
 function randomHeroName($arr, $amount) {
    for ($i = $amount; $i > 0; $i--) {
        array_push($arr, randomHeroName());
    }
    return $amount;
}*/

function randomHeroName() {
    $hero_firstnames = ["captain", "doctor", "iron", "Hank", "ant", "Wasp", "the", "Hawk", "Spider", "Black", "Carol"];
    $hero_lastnames = ["America", "Strange", "man", "Pym", "girl", "hulk", "eye", "widow", "panther", "daredevil", "marvel"];
    $heroes = [$hero_firstnames, $hero_lastnames];
    return $heroes[rand(0,count($heroes)-1)][rand(0, 10)]; // changed to return

}
echo "Here is the name: " . combineNames();

new_exercise(7); // DONE integer missing
function copyright(int $year) {
    return "&copy; $year BeCode";
}
//print the copyright
echo copyright((int)date('Y'));


new_exercise(8); // DONE - combined 2 returns into 1
function login(string $email, string $password) {
    if($email == 'john@example.be' || $password == 'pocahontas') {
        return 'Welcome John Smith <br /> ';
     }
    return 'No access! <br />';
}
//do not change anything below
//should create the user with his full name (John Smith)
echo login('john@example.be', 'pocahontas');
//no access
echo login('john@example.be', 'dfgidfgdfg');
//no access
echo login('wrong@example.be', 'wrong');
//you can change things again!


new_exercise(9); // DONE - echos were missing // changed from true to false // !== operator compares type as well
function isLinkValid(string $link) {
    $unacceptables = array('https:','.doc','.pdf', '.jpg', '.jpeg', '.gif', '.bmp', '.png');

    foreach ($unacceptables as $unacceptable) {
        if (strpos($link, $unacceptable) !== false) { // strpos — Find the position of the first occurrence of a substring in a string
            return 'invalid link <br />';
        }
    }
    return 'VALID link <br />';
}
//invalid link
echo isLinkValid('http://www.google.com/hack.pdf');
//invalid link
echo isLinkValid('https://google.com');
//VALID link
echo isLinkValid('http://google.com');
//VALID link
echo isLinkValid('http://google.com/test.txt');


new_exercise(10); // DONE - split the for loop and removed = of <= to solve "undefined offset" and make count a variable

//Filter the array $areTheseFruits to only contain valid fruits
//do not change the arrays itself
$areTheseFruits = ['apple', 'bear', 'beef', 'banana', 'cherry', 'tomato', 'car'];
$validFruits = ['apple', 'pear', 'banana', 'cherry', 'tomato'];
//from here on you can change the code

$lenght= count($areTheseFruits);
for($i=0; $i < $lenght ; $i++) {
    if(!in_array($areTheseFruits[$i], $validFruits)) {
        unset($areTheseFruits[$i]);
    }
}
var_dump($areTheseFruits);//do not change this