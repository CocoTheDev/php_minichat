<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<?php


$bdd = new PDO('mysql:host=localhost;dbname=TP_minichat;charset=utf8', 'root', '');
$reponse = $bdd->query('SELECT * FROM chat ORDER BY ID DESC');
/*$reponse = $bdd->query(
    SELECT  *
    FROM    chat
    WHERE pseudo = 'testing bot'
    ORDER BY
            ID DESC
    LIMIT 10
    )
    ORDER BY
            ID;
*/
echo "<div style='margin: auto; border: 2px solid black;'>";

if (isset($reponse)) {
while ($donnees = $reponse->fetch()) {
    echo '<p><b>' . $donnees['pseudo'] . " : " . '</b>' . $donnees['message'] . '</p>';
}
}

echo '</div>';


?>
<form method="post" action="minichat_post.php">
 <input type="text" name="pseudo" placeholder="Pseudo"/> <?php if (isset($pseudo)) {echo $pseudo;} ?>
 <input type="text" name="message"  placeholder="Message"/>
 <input type="submit" value="Envoyer">
</form>



    
</body>
</html>