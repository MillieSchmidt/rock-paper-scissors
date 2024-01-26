<?php
    if (!isset($_GET['who']) || strlen($_GET['who']) < 1) {
        die("Name parameter missing.");
    }

    if (isset($_POST['logout'])) {
        header('Location: index.php');
        return;
    }

    $names = array('Rock', 'Paper', 'Scissors');
    $human = isset($_POST['human']) ? $_POST['human'] : -1;
    $computer = rand(0, 2); // 0 = rock 1 = paper 2 = scissors

    function check($human, $computer) {
        if ($human == $computer) {
            return "Tie.";
        } elseif ($human == 2 && $computer == 0) {
            return "You lose!"; 
        } elseif ($human == 0 && $computer == 2) {
            return "You win!";
        } elseif ($human < $computer) {
            return "You lose!";
        } elseif ($human > $computer) {
            return "You win!";
        }
    }    

    $result = check($human, $computer);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Rock, Paper, Scissors</title>
        <link rel="stylesheet" href="./css/game.css">
    </head>
    <body>
        <div id="the_game">
            <h1>Rock, Paper, Scissors</h1>
            <?php
                echo "<p><b>Welcome, ".htmlentities($_GET['who']).".</b></p>";
            ?>

            <form method="post">
                <select name="human">
                    <option value="-1">Select</option>
                    <option value="0">Rock</option>
                    <option value="1">Paper</option>
                    <option value="2">Scissors</option>
                    <option value="3">Test</option>
                    <input type="submit" value="play" />
                    <input type="submit" name="logout" value="Logout" />
                </select>
            </form>

            <pre id="result">
            <?php
                if ($human == -1) {
                    echo "Please select a strategy and press 'Play'.";
                } elseif ($human == 3) {
                    for($h=0; $h<3; $h++) {
                        for($c=0; $c<3; $c++) {
                            $r = check($h, $c);
                            echo "Human: $names[$h] Computer: $names[$c] Result: $r<br />";
                        }
                    }
                } else {
                    echo "Your Play: $names[$human] Computer Play: $names[$computer] Result: $result\n";
                }
            ?>
            </pre>
        </div>
    </body>
</html>