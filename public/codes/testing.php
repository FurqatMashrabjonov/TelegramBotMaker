<?php

require_once "vendor/autoload.php";

try {

    $bot = new \TelegramBot\Api\Client("1234:fdFSDFSDFSDFSDWGGWEGSDHD");

    $bot->onCommand("hello", function ($message) use ($bot){

    $bot->sendChatAction($message->chat->id, 'typing');
    $bot->sendMessage($message->chat->id, "Hello world!!!", null, false, null);

});
    $bot->onCommand("furqat", function ($message) use ($bot){

    $bot->sendChatAction($message->chat->id, 'upload_photo');
    $bot->sendMessage($message->chat->id, "FURQATTTTTTTTTTTTT", null, false, null);

});

    $bot->run();

} catch (\TelegramBot\Api\Exception $e) {
    echo file_put_contents('error.log', $e->getMessage());
}