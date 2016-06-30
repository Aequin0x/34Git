<?php 

$file = fopen("texte.txt", "r");
var_dump(fread($file, filesize('texte.txt')));
fclose($file);
 

?>