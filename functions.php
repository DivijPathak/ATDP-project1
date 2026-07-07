<?php

function calculatePosition($answers){
    $scores = [
        "Goalkeeper" => 0,
        "Defender" => 0,
        "Midfielder" => 0,
        "Winger" => 0,
        "Striker" => 0
    ];

    // Q 1
    $scores["Goalkeeper"] += $answers[0];
    $scores["Defender"] += $answers[0];
    $scores["Midfielder"] += $answers[0];

    // Q 2
    $scores["Defender"] += 2 * $answers[1];
    $scores["Striker"] += $answers[1];
    $scores["Winger"] -= $answers[1];

    // Q 3
    $scores["Goalkeeper"] += 2 * $answers[2];
    $scores["Defender"] += 2 * $answers[2];
    $scores["Striker"] -= $answers[2];

    // Q 4
    $scores["Winger"] += 2 * $answers[3];
    $scores["Striker"] += $answers[3];
    $scores["Defender"] -= $answers[3];
    $scores["Goalkeeper"] -= $answers[3];

    // Q 5
    $scores["Goalkeeper"] += 2 * $answers[4];
    $scores["Defender"] -= $answers[4];
    $scores["Midfielder"] -= 2 * $answers[4];
    $scores["Winger"] -= 2 * $answers[4];
    $scores["Striker"] -= $answers[4];

    // Q 6
    $scores["Defender"] += 2 * $answers[5];
    $scores["Midfielder"] += 2 * $answers[5];
    $scores["Striker"] -= $answers[5];

    // Q 7
    $scores["Striker"] += 3 * $answers[6];
    $scores["Midfielder"] -= 3 * $answers[6];

    // Q 8
    $scores["Striker"] += 2 * $answers[7];
    $scores["Midfielder"] -= 2 * $answers[7];
    $scores["Defender"] += $answers[7];
    $scores["Goalie"] += $answers[7];

    // Q 9
    $scores["Goalkeeper"] += $answers[8];
    $scores["Defender"] += $answers[8];
    $scores["Striker"] += $answers[8];
    $scores["Midfielder"] -= 2 * $answers[8];

    // Q 10
    $scores["Goalkeeper"] += 2 * $answers[9];
    $scores["Defender"] += $answers[9];

    // Q 11
    $scores["Winger"] += 3 * $answers[10];
    $scores["Striker"] += $answers[10];
    $scores["Goalkeeper"] -= $answers[10];

    // Q  12
    $scores["Striker"] += 2 * $answers[11];
    $scores["Winger"] += $answers[11];
    $scores["Defender"] -= $answers[11];
    $scores["Goalkeeper"] -= $answers[11];

    // Q 13
    $scores["Midfielder"] += 3 * $answers[12];
    $scores["Goalkeeper"] -= 2 * $answers[12];
    $scores["Striker"] -= $answers[12];

    // Q 14
    $scores["Goalkeeper"] += 2 * $answers[13];
    $scores["Defender"] += 2 * $answers[13];
    $scores["Midfielder"] += $answers[13];

    arsort($scores); // decsending order
    return $scores;
}

function getDescription($position){
    switch($position){

        case "Goalkeeper":
            return "You are reliable and calm under pressure, and always ready to protect your team";

        case "Defender":
            return "You are very strong, fearless, and ready/willing to do the dirty work to stop opponents";

        case "Midfielder":
            return "You control play and your team by connecting everyone together by being involved. Your stamina is exceptional";

        case "Winger":
            return "You are exciting and fast by creating opportunties taking players one on one. You are a speedy fellow";

        case "Striker":
            return "You are confident and strong when taking shots, and always looking to score a goal";
    }
}

function getSecondary($scores){ // for close seconds

    $positions = array_keys($scores);
    $values = array_values($scores);

    if($values[0] - $values[1] <= 3){
        return $positions[1];
    }

    return "";
}

?>