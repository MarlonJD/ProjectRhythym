<?php
error_reporting(-1);
// include your composer dependencies
require_once 'vendor/autoload.php';

$client = new Google_Client();
$client->setApplicationName("Client_Library_Examples");
$client->setDeveloperKey("AIzaSyCzZg9Y3pALSSQrIuE_oEjr4cc6T1o38Ac");

$service = new Google_Service_Drive($client);

 //Insert a file
 $file = new Google_Service_Drive_DriveFile();
 $file->setName(uniqid().'.jpg');
 $file->setDescription('A test document');
 $file->setMimeType('image/jpeg');

 $data = file_get_contents('a.jpg');

 $createdFile = $service->files->create($file, array(
       'data' => $data,
       'mimeType' => 'image/jpeg',
       'uploadType' => 'multipart'
     ));

 print_r($createdFile);
