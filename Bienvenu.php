<?php
if (isset($_GET['delete'])){
    $lineToDelete = intval($_GET['delete']);
    $line = file('data.txt' , FILE_IGNORE_NEW_LINES);
    unset($lines[$lineToDelete]);
    file_put_contents('data.txt', implode('\n', $lines));
    header("Location: Bienvenu.php");
    exit();
}

?>

<html>
    <head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "style.css">
        
    </head>
<body>

   <h1>Informations : </h1> 

<table>
    <thead>
    <tr>
        <th>Prenom/Nom</th>
        <th>Email</th>
    </tr>
    </thead>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);

        // Enregister informations 
        $data = "$name, $email\n";
        file_put_contents('data.txt' , $data, FILE_APPEND);
    
    }

    // display enregistred informatios 
    if (file_exists('data.txt')){
        $lines = file('data.txt');
        foreach ($lines as $line){
            $row = explode(',', trim($line));
            echo "<tr>";
            foreach ($row as $cell){
                echo "<td>" . htmlspecialchars($cell) . "</td>";
            }
            echo "</tr>";
        }
    }

    ?>


</table>

<button onclick="window.history.back()">Reture</button>

</body>
</html>