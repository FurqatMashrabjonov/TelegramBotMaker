<?php

namespace App\Helpers\Telegram;

class ComponentFiller
{


    public function message($args)
    {
        return fillMessageComponent($args);
    }

    public function command($command, $main)
    {

        $content = implode(SPACES_BETWEEN__LOOP, $main);

        return fillCommandComponent(['command' => $command, 'main' => $content]);
    }

    public function chatAction($args)
    {
        return fillChatActionComponent($args);
    }

    public function templateWithArray($main): string
    {
        return fillerTemplateWithArray($main);
    }
}
