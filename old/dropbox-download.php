<?php
error_reporting(-1);

        $token = '3pJIu5Xud5AAAAAAAAAJHk6DhJIEuzt5tM14jJrp7f3bdIVQmHUryONi9hDh4Ntw'; // oauth token

        $headers = array('Authorization: Bearer '. $token,
            'Dropbox-API-Arg: '.
            json_encode(
                array(
                    "path"=> '/ups/',
                )
            )
        );

        $vars = json_encode(
            array(
                "path"=> '/ups/license.txt'
            )
        );

        $ch = curl_init('https://content.dropboxapi.com/2/files/download_zip');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        //curl_setopt($ch, CURLOPT_POST, 1);
        //curl_setopt($ch, CURLOPT_POSTFIELDS,$vars);  //Post Fields
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        echo $response;
