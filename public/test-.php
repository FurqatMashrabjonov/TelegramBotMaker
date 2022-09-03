<?php

require_once "vendor/autoload.php";

try {

    $bot = new \TelegramBot\Api\Client({{token}});

          $bot->onCommand('hello', function ($message) use ($bot){
    $chat = $message->chat;
    $user = $message->from;
    $text = $message->text;

    hello
});\n   $bot->onCommand('furqat', function ($message) use ($bot){
    $chat = $message->chat;
    $user = $message->from;
    $text = $message->text;

    furqat
});

    $bot->run();

} catch (\TelegramBot\Api\Exception $e) {
    echo file_put_contents('error.log', $e->getMessage());
}