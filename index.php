<?php 

// Pour ouvrir, lire et fermer un fichier //

$file = fopen("texte.txt", "r");
var_dump(fread($file, filesize('texte.txt')));
fclose($file);
 
// Pour ecrire dans un fichier //

// r = read
// w+ = ecrire et remplace le texte
// a = ecrire à la fin du fichier en ecriture seul
// a+ = ecrire à la fin du fichier en ecriture seule + lecture du fichier

$file = fopen('texte.log', "a");
fwrite($file, date("Y-m-d H:i:s")." : Le script à été ouvert\r\n");
fclose($file);

// Fonction equivalentes

echo file_get_contents('texte.log'); // equivalent de fopen>fread>fclose

?>