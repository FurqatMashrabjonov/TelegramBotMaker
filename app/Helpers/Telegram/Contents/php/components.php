<?php

return [

    //main template
    "template" => <<<EOF
<?php

require_once "vendor/autoload.php";

try {

    \$bot = new \TelegramBot\Api\Client("{{token}}");

    {{main}}

    \$bot->run();

} catch (\TelegramBot\Api\Exception \$e) {
    echo file_put_contents('error.log', \$e->getMessage());
}
EOF,

    //command template
    "command" => <<<EOF
\$bot->onCommand("{{command}}", function (\$message) use (\$bot){

    {{main}}

});
EOF,

    //Components

    "message" => <<<EOF
\$bot->sendMessage(\$message->chat->id, "{{message}}", null, false, null);
EOF,

    "chatAction" => <<<EOF
\$bot->sendChatAction(\$message->chat->id, '{{action}}');
EOF,


];


