<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordnerkarten</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 15px;
            background-color: #f9f9f9;
        }
        .card img {
            width: 100px;
            height: 100px;
            margin: 10px auto;
        }
        .card h3 {
            font-size: 1.2em;
            margin: 10px 0;
        }
        .card button {
            padding: 10px 20px;
            font-size: 1em;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        .card button:hover {
            background-color: #0056b3;
        }

        .sound {

            display: none;

        }
    </style>
</head> 
<body>

<?php
$directory = './assets'; // Verzeichnis, das die Ordner enthält

// Prüfen, ob das Verzeichnis existiert
if (is_dir($directory)) {

    // Dateien und Ordner auslesen
    $items = scandir($directory);

    foreach ($items as $item) {
        // Nur Ordner anzeigen (ohne "." und "..")
        if ($item !== "." && $item !== ".." && is_dir($directory . "/" . $item)) {
            echo '
            <div class="card" id="'. $item . '">
                
                <h3>' . htmlspecialchars($item) . '</h3>
                <img src="folder-icon.png" alt="Ordner">
                <form action="browse.php" method="get">
                    <input type="hidden" name="folder" value="' . htmlspecialchars($item) . '">
                    <button type="submit">Ordner öffnen</button>
                    <audio class="sound" id="sound' . $item .'" controls> 
                        <source src="sound/' . $item . '.mp3" /> 
                    </audio>
                </form>
            </div> 
            <script>
                const '. $item . '= document.getElementById("'. $item .'");

                '. $item . '.addEventListener("mouseover", function() {

                    const $sound' . $item . ' =  document.getElementById("sound' . $item . '");

                    $sound' . $item . '.play();
                });

            </script>
            ';
        }
    }
} 
else {
    echo "<p>Das Verzeichnis wurde nicht gefunden.</p>";
}
?>

</body>
</html>