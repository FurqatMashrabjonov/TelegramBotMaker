<?php

class ComponentBuilder
{

    public function message($chat_id, $text){
        return fillMessageComponent(['message' => $text, 'chat_id' => $chat_id]);
    }

}
