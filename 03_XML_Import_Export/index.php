<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Importing XML DATA</h1><br>
    <?php
        $xml = simplexml_load_file("cricketXml.xml");
        foreach($xml->player as $player){
            echo "<h2>Player : ".$player->playername." </h2>";
            echo "<h3>Player : ".$player->role." </h3>";
            echo "<br>";
        }
    ?>
</body>
</html>