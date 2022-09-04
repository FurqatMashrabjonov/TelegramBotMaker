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
\$bot->command("{{command}}", function (\$message) use (\$bot){

    {{main}}

});
EOF,

    //Components

    "message" => <<<EOF
\$bot->sendMessage(\$message->getChat()->getId(), "{{message}}");
EOF,

    "chatAction" => <<<EOF
\$bot->sendChatAction(\$message->getChat()->getId(), "{{action}}");
EOF,

    "photo" => <<<EOF
     \$bot->sendPhoto(\$message->getChat()->getId(), "{{photo}}", "{{caption}}");
EOF


];


