<?php


require_once "vendor/autoload.php";

try {


    $bot = new \TelegramBot\Api\Client('857979679:AAE7Wiw7juvL4bi_r4nUzUgTRX2s6oupgLs');


    $bot->command('ping', function ($message) use ($bot) {

        $bot->sendMessage($message->getChat()->getId(), 'nimadur');
    });


    $bot->command('start', function ($message) use ($bot) {
        $chat_id = $message->getChat()->getId();

        $keyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup(
            [
                [
                    ['text' => 'aaa', 'callback_data' => 'https://core.telegram.org'],
                    ['text' => 'bbb', 'callback_data' => 'https://core.telegram.org'],
                    ['text' => 'ccc', 'callback_data' => 'https://core.telegram.org'],
                ],
                [
                    ['text' => 'aaa', 'callback_data' => 'https://core.telegram.org'],
                    ['text' => 'bbb', 'callback_data' => 'https://core.telegram.org'],
                ],
            ]
        );

        $bot->sendMessage($chat_id, 'addddddddddddd', null, false, null, $keyboard);


    });


    $bot->setMyCommands([
        [
            "command" => 'start',
            "description" => "BOshlash"
        ],
        [
            "command" => 'ping',
            "description" => 'Pong'
        ]
    ]);

    $bot->run();

} catch (\TelegramBot\Api\Exception $e) {
    echo file_put_contents('error.log', $e->getMessage());
}
