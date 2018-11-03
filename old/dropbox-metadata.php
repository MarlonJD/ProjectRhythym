<?php
error_reporting(-1);

        $token = '3pJIu5Xud5AAAAAAAAAJHk6DhJIEuzt5tM14jJrp7f3bdIVQmHUryONi9hDh4Ntw'; // oauth token

        $headers = array('Authorization: Bearer '. $token,
            "Content-Type: application/json"
        );

        $vars = json_encode(
            array(
                "path"=> '/ups/license.txt'
            )
        );

        $ch = curl_init('https://api.dropboxapi.com/2/files/get_metadata');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$vars);  //Post Fields
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        echo $response;
