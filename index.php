<?php 

// Pour ouvrir, lire et fermer un fichier //

$file = fopen("texte.txt", "r");
var_dump(fread($file, filesize('texte.txt')));
fclose($file);
 
// Fonction equivalentes pour lire un fichier avec fopen

echo file_get_contents('texte.txt'); // equivalent de fopen>fread>fclose

// Pour ecrire dans un fichier //

// r = read
// w+ = ecrire et remplace le texte
// a = ecrire à la fin du fichier en ecriture seul
// a+ = ecrire à la fin du fichier en ecriture seule + lecture du fichier

$file = fopen('texte.log', "a+");
fwrite($file, date("Y-m-d H:i:s")." : Le script à été ouvert\r\n");
fclose($file);

// Equivalent pour ecrire dans un fichier

$content = file_get_contents("texte.log");
$content .= date("Y-m-d H:i:s")." : Le script à été ouvert\r\n";
file_put_contents("texte.log", $content);

// Pour supprimer un fichier 

// unlink("texte.log");

// Verif qu'un fichier existe ou non
// 'is_file' est un autre equivalent
if(file_exists("texte.log")){
	echo "Le fichier de log existe !";
}else {
	echo "Pas de fichier log";
}

// Verifier si un repertoire existe, sinon on le créer

if(!is_dir('test')){
	mkdir('test');
	echo "Directory created";
}

// Modifier les permissions d'un fichier (sous linux)
/*chmod('texte.txt', 0755);*/

// Deplacer ou renommer un fichier
rename('texte.log', 'test/texte.log');

// Recup le nom du dossier courant
echo __DIR__;
// ou
echo dirname(__FILE__);
// Recup le chemin du fichier courant
echo __FILE__;

// Recup la date de dernière modif d'un fichier
echo date("d/m/Y à H:i:s", filemtime("test/texte.log"));

// Copier un fichier
copy("test/texte.log", "test/texte.log.backup");

?>