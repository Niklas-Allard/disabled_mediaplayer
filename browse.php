<?php
if (isset($_GET['folder'])) {
    $folder = basename($_GET['folder']); // Schutz vor Directory Traversal
    $directory = './assets/' . $folder;

    if (is_dir($directory)) {

        require "movie_or_audio.php";

        if (movie_or_audio($diretory) == "movie") {



        };

    };

    else {
        
        
    
    }
} else {
    echo "<p>Kein Ordner ausgewählt.</p>";
}
?>