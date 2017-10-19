<?php

$url = "https://www.facebook.com";
$orignal_parse = parse_url($url, PHP_URL_HOST);
$get = stream_context_create(array("ssl" => array("capture_peer_cert" => TRUE)));
$read = stream_socket_client("ssl://".$orignal_parse.":443", $errno, $errstr, 30, STREAM_CLIENT_CONNECT, $get);
$cert = stream_context_get_params($read);
$certinfo = openssl_x509_parse($cert['options']['ssl']['peer_certificate']);
print_r($certinfo);
 

  function readData($objet){
    foreach ($objet as $key => $value) {
    ?><div><strong><?php echo $key;?> </strong></div><?php

    if (is_array($value) ){
       
        readData($value);
    }else{
        
        if($key == "validTo_time_t"){
         ?><div><label><?php echo $key;?> : </label>  <span><?php echo  date('Y/m/d H:i:s', $value)." val";  ?></span></div><?php $key="";$value = "";
        }else{
        ?><div><label><?php echo $key;?> : </label>  <span><?php echo $value;?></span></div><?php
        }
        if($key == "validFrom_time_t"){
        ?><div><label><?php echo $key;?> : </label>  <span><?php echo date('Y/m/d H:i:s', $value)."  de"; ?></span></div><?php $key = "";$value = "";
        }
    }
   
}
}
readData($certinfo);
