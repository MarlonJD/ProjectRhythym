<?php
$json = '{
 "name": "hellotherxe (104).jpg",
 "path_lower": "/ups/hellotherxe (104).jpg", 
 "path_display": "/ups/hellotherxe (104).jpg", 
 "id": "id:iLjskpMAuSEAAAAAAAAmug", 
 "client_modified": "2018-10-25T19:47:25Z", 
 "server_modified": "2018-10-25T19:47:25Z", 
 "rev": "9dfb4d8590", "size": 1858476, 
 "content_hash": "78f7d57fc64018acbeda35795aab65126557be211859ce160590dd2b99b52183"
 }';

 var_dump(json_decode($json));

 $var = json_decode($json, true);
 echo $var['name'];
 