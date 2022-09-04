<?php

require_once "vendor/autoload.php";

try {

    $bot = new \TelegramBot\Api\Client("857979679:AAFzdqivd4AQCf9RoOXHugYjaBvHf44dMTc");

    $bot->command("hello", function ($message) use ($bot){

    $bot->sendChatAction($message->getChat()->getId(), "typing");
    $bot->sendMessage($message->getChat()->getId(), "Hello world!!!");

});
    $bot->command("furqat", function ($message) use ($bot){

    $bot->sendChatAction($message->getChat()->getId(), "upload_photo");
         $bot->sendPhoto($message->getChat()->getId(), "https://media.baamboozle.com/uploads/images/38415/1586344885_576331", "SENDING PHOTOOOOO");
    $bot->sendMessage($message->getChat()->getId(), "rasm jonatiwwwwwwww");
    $bot->sendMessage($message->getChat()->getId(), "keldiiiiiiiii");

});

    $bot->run();

} catch (\TelegramBot\Api\Exception $e) {
    echo file_put_contents('error.log', $e->getMessage());
}