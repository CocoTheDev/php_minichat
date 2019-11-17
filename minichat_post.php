<?php
header('Location: index.php');
// La ligne du dessus permet une redirection invisible pour l'utilisateur, elle doit être placée absolument tout en haut du code



$host = "localhost";
$dbname = "TP_minichat";
$root = "root";
$password = "";

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect($host, $root, $password, $dbname);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$pseudo = htmlspecialchars(mysqli_real_escape_string($link, $_REQUEST['pseudo']));
$message = htmlspecialchars(mysqli_real_escape_string($link, $_REQUEST['message']));
 
// Attempt insert query execution
$sql = "INSERT INTO chat (pseudo, message) VALUES ('$pseudo', '$message')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

?>