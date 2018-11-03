<?php
// upload.php
session_start();
$my_file = $_FILES['my_file'];
$file_path = $my_file['tmp_name']; // temporary upload path of the file
//$file_name = $_POST['name']; // desired name of the file

$fp = fopen($file_path, 'rb');
$size = filesize($file_path);

        $token = '3pJIu5Xud5AAAAAAAAAJHk6DhJIEuzt5tM14jJrp7f3bdIVQmHUryONi9hDh4Ntw'; // oauth token

        $headers = array('Authorization: Bearer '. $token,
            'Content-Type: application/octet-stream',
            'Dropbox-API-Arg: '.
            json_encode(
                array(
                    "path"=> "/ups/hellotherxe.jpg",
                    "mode" => "add",
                    "autorename" => true,
                    "mute" => false
                )
            )

        );

        $ch = curl_init('https://content.dropboxapi.com/2/files/upload');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_PUT, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_NOPROGRESS, false);
        curl_setopt($ch, CURLOPT_PROGRESSFUNCTION, 'progressCallback');
        curl_setopt($ch, CURLOPT_BUFFERSIZE, 64000);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_INFILE, $fp);
        curl_setopt($ch, CURLOPT_INFILESIZE, $size);
        
        $response = curl_exec($ch);
        echo $response;
        curl_close($ch);
        fclose($fp);


        function progressCallback ($resource, $download_size, $downloaded_size, $upload_size, $uploaded_size)
        {
            static $previousProgress = 0;
            
            if ( $upload_size == 0 )
                $progress = 0;
            else
                $progress = round( $uploaded_size * 100 / $upload_size );
            
            if ( $progress > $previousProgress)
            {
                $previousProgress = $progress;
                $fp = fopen( 'progress.txt', 'w' );
                fputs( $fp, "$progress" );
                fclose( $fp );
            }
            elseif ($progress == 100)
            {
                $_SESSION["progress"] = true;
            }
        }