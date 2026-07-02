<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soccer Positions Quiz (Personality)</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
<div class="container">

    <h1>Soccer Position Quiz!</h1>

    <p>Answer each questions that will determine which positions suites you</p>

    <form action="output.php" method="POST">

        <h2>Basic Info</h2>

            <label>Name: </label>
            <input type="text" name="name" required>

            <label>Email: </label>
            <input type="email" name="email" required>
            
            <p>Gender: </p>
            <input type="radio" id="male" name="gender" value="Male">
            <label for="male">Male</label>

            <input type="radio" id="female" name="gender" value="Female">
            <label for="female">Female</label>

            <input type="radio" id="other" name="gender" value="Other">
            <label for="other">Other</label>

            <label>Date of Birth:</label>
            <input type="date" name="dob" required>

            <label>Street Address:</label>
            <input type="text" name="address" required>

<hr>

<?php

$questions = [
"I enjoy being the person everyone can rely on in stressful situations.",
"I like the strong/physical side of the game (shoulder to shoulder battles, slide tackling).",
"I'd rather defend or stop a goal than score one.",
"I like facing players one on one.",
"I am not okay with running nonstop for the entire game.",
"I am willing to do work that often goes unnoticed to help my team.",
"I'd rather finish opportunities than create them for others.",
"I'd rather shine in a few defining moments than be involved in every play.",
"I do not like having the ball often.",
"I want to be the loudest player on the field.",
"I love using speed and quick movements to beat people.",
"I am not okay sacrificing my own stats.",
"I love being in the middle of the action rather than waiting on the side.",
"I enjoy communicating and organizing players."
];

$options = [
-2 => "Strongly Disagree",
-1 => "Disagree",
0 => "Neutral",
1 => "Agree",
2 => "Strongly Agree"
];

foreach ($questions as $i => $question) {

    echo "<div class='question'>";
    echo "<h3>Question ".($i+1)."</h3>";
    echo "<p>$question</p>";

    foreach($options as $value => $text){
        echo "<label>";
        echo "<input type='radio' name='q$i' value='$value' required> $text";
        echo "</label><br>";
    }

    echo "</div>";
}

?>

<br>
<input type="submit" value="See Position!">

</form>
</div>
</body>
</html>