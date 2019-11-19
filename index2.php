<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mini chat</title>
<style>

html {
    height: 100%;
    width: auto;
    background-color: grey;
    color: whitesmoke;
}

.center {
text-align: center;
}

.chat_windows {
    padding: 1em;
    margin: 1em;
    border: 10px solid orange;
    border-radius: 5px;
    height: auto;
    width: 40em;

}

.form {
    padding: 1em;
    margin: 1em;
}

</style>

</head>

<body>

<?php


// Connexion à la BDD
$bdd = new PDO('mysql:host=localhost;dbname=TP_minichat;charset=utf8', 'root', '');


// Define variables wich would be used
$limit = 10;
$sql_line = $bdd->query("SELECT * FROM (
    SELECT * 
    FROM chat 
    ORDER BY id DESC
    LIMIT $limit
  ) AS `table` ORDER by id ASC");


// Selection sql
function sql_selection($bdd, $limit) {
    $sql_line = $bdd->query("SELECT * FROM (
        SELECT * 
        FROM chat 
        ORDER BY id DESC
        LIMIT $limit
        ) AS `table` ORDER by id ASC");
}


// Display messages
function display_messages($sql_line) {
    echo "<div class='chat_windows'>";
    foreach ($sql_line as $donnees) {
        echo "<p><b style='color: orange;'>" . $donnees['pseudo'] . " : " . '</b>' . $donnees['message'] . '</p>';}
    echo '</div>';
}


// increase number of message if clicked
if ( isset( $_POST['moreMessage'] ) )
    {
        $limit += 10;
        sql_selection($bdd, $limit);
        display_messages($sql_line);
    }; 



?>

<!-- Formulaire d'action plus de message-->
<form class="center" action="index2.php" method="post">
    <input type="submit" name="moreMessage" value="Voir plus de message" />
</form>

<!-- Formulaire pseudo message-->
<form method="post" action="minichat_post.php" class="form center">
 <input type="text" name="pseudo" placeholder="Pseudo" value="<?php if (isset($_COOKIE['pseudo'])) {echo $_COOKIE['pseudo'];}?>"/>
 <input type="text" name="message"  placeholder="Message"/>
 <input type="hidden" name="page" value="2">
 <input type="submit" value="Envoyer">
</form>


</body>
</html>