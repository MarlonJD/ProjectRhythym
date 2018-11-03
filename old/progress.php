<?php
$myfile = fopen("progress.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("progress.txt"));
fclose($myfile);
?>