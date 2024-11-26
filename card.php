<?php

    function card($item, $current_path) {

        $return = '
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

?>