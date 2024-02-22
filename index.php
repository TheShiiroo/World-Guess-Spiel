<?php
session_start();

// Array von Städten
$world_cities = array(
    "London", 
    "Paris", 
    "Berlin", 
    "New York", 
    "Tokyo", 
    "Rome", 
    "Sydney", 
    "Moscow", 
    "Dubai", 
    "Beijing"
);

// Überprüfen, ob die Session bereits gestartet wurde und eine Stadt ausgewählt wurde
if (!isset($_SESSION['city'])) {
    // Wenn nicht, wähle eine zufällige Stadt aus dem Array
    $_SESSION['city'] = $world_cities[array_rand($world_cities)];
}

// Überprüfen, ob das Formular abgeschickt wurde
if(isset($_POST['submit'])) {
    $guess = $_POST['city_guess'];
    // Überprüfen, ob die vermutete Stadt korrekt ist
    if($guess == $_SESSION['city']) {
        echo "<p>Glückwunsch! Du hast die Stadt richtig erraten: " . $_SESSION['city'] . "</p>";
        // Die Session löschen, um ein neues Spiel zu starten
        unset($_SESSION['city']);
    } else {
        echo "<p>Leider falsch. Versuche es erneut!</p>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>World Guess Spiel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        p {
            color: #666;
        }
        form {
            text-align: center;
        }
        input[type="text"] {
            padding: 10px;
            width: 70%;
            border-radius: 4px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>World Guess Spiel</h2>
        <p>Errate die Stadt:</p>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="text" name="city_guess" placeholder="Stadt eingeben" required>
            <br>
            <input type="submit" name="submit" value="Erraten">
        </form>
    </div>
</body>
</html>