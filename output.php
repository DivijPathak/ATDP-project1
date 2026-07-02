<?php
require "functions.php";
$answers = [];
for($i = 0; $i < 14; $i++){
    $answers[] = $_POST["q".$i];
}

$scores = calculatePosition($answers);
$positions = array_keys($scores);
$main = $positions[0];
$secondary = getSecondary($scores);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results!!!!!</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
<h1>Your Soccer Position</h1>
<h2><?= $main ?></h2>

<p><?= getDescription($main) ?></p>

<?php

if($secondary != ""){
    echo "<h3>Secondary Trait</h3>";
    echo "<p>You also showed some good qualties of a <strong>$secondary</strong>.</p>";
}

?>

<hr>

<h2>Your Information, (that we arent stealing shh)</h2>

<p><strong>Name:</strong> <?= $_POST["name"] ?></p>
<p><strong>Email:</strong> <?= $_POST["email"] ?></p>
<p><strong>Gender:</strong> <?= $_POST["gender"] ?></p>
<p><strong>Date of Birth:</strong> <?= $_POST["dob"] ?></p>
<p><strong>Street Address:</strong> <?= $_POST["address"] ?></p>

</div>

</body>

</html>