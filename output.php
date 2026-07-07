
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results!!!!!</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include "header.php"; ?>
    <p>
<a href="https://atdpsites.berkeley.edu/validate/">
Validate page
</a>
</p>
    <?php
require "functions.php";

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo "<p class='error'>Complete the Quiz first</p>";
   exit(); // we wanna avoid everything bc the entire page is based on 
}

$name = trim($_POST["name"] ?? "");
$email = trim($_POST["email"] ?? "");
$gender = $_POST["gender"] ?? "";
$dob = $_POST["dob"] ?? "";
$address = trim($_POST["address"] ?? "");

if ($name == "" || $email == "" || $dob == "" || $address == "" || ($gender != "Male" && $gender != "Female" && $gender != "Other")) {
    echo "<p class='error'>Invalid submission</p>";
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<p class='error'>Invalid email</p>";
    exit();
}
$answers = [];
for ($i = 0; $i < 14; $i++) {
    $answer = $_POST["q".$i] ?? "";

    if ($answer == -2 || $answer == -1 || $answer == 0 || $answer == 1 || $answer == 2) {
        $answers[] = (int)$answer;
    } else {
        echo "<p class='error'>Invalid Answer</p>";
        exit();
    }
}


$scores = calculatePosition($answers);
$positions = array_keys($scores);
$main = $positions[0];
$secondary = getSecondary($scores);

?>
<div class="container">
<h1>Your Soccer Position</h1>
<h2><?= $main ?></h2>

<p><?= getDescription($main) ?></p>

<?php

if($secondary != ""){
    echo "<h3>Secondary Trait</h3>";
    echo "<p>You also showed some good qualties of a <strong>$secondary</strong>.</p>";
    <p><?= getDescription($secondary) ?></p>
}

?>

<hr>

<h2>Your Information, (that we arent stealing shh)</h2>

<p><strong>Name:</strong> <?= htmlspecialchars($_POST["name"]) ?></p>
<p><strong>Email:</strong> <?= htmlspecialchars($_POST["email"]) ?></p>
<p><strong>Gender:</strong> <?= htmlspecialchars($_POST["gender"]) ?></p>
<p><strong>Date of Birth:</strong> <?= htmlspecialchars($_POST["dob"]) ?></p>
<p><strong>Street Address:</strong> <?= htmlspecialchars($_POST["address"]) ?></p>

</div>




</body>

</html>