<?php


use App\Helpers\Telegram\ComponentFiller;

const SPACES_BETWEEN_LOOP = PHP_EOL . '    ';

function componentFiller(): ComponentFiller
{
    return new ComponentFiller();
}

function componentBuilder(): ComponentBuilder
{
    return new ComponentBuilder();
}

function getTemplates()
{
    return require 'Helpers/Telegram/Contents/php/components.php';
}

function fillMessageComponent($args)
{
    return filler($args, 'message');
}

function fillCommandComponent($args)
{
    return filler($args, 'command');
}

function fillChatActionComponent($args)
{
    return filler($args, 'chatAction');
}

function fillPhotoComponent($args){
    return filler($args, 'photo');
}

/////////////////////////////////////////////////////////////////////
function filler($args, $component_name)
{
    $component = getTemplates()[$component_name];
    echo $component;
    foreach ($args as $key => $arg) {
        $tmp = explode("{{{$key}}}", $component);
        $component = $tmp[0] . $arg . $tmp[1];
    }
    return $component;

}
/////////////////////////////////////////////////////////////////////

function fillTemplate($args){
    return filler($args, 'template');
}

function fillerTemplateWithArray($main): string
{
    $component = fillTemplate(['token' => '857979679:AAFzdqivd4AQCf9RoOXHugYjaBvHf44dMTc']);
    $main = implode(SPACES_BETWEEN_LOOP, $main);
    $tmp  = explode('{{main}}', $component);
    return $tmp[0] . $main . $tmp[1];
}
