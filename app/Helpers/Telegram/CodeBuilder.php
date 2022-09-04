<?php

namespace App\Helpers\Telegram;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CodeBuilder
{

    protected string $tree;
    protected object $parsed_tree;
    protected ComponentFiller $componentFiller;

    public function __construct($tree)
    {
        $this->tree = $tree;
        $this->parsed_tree = json_decode($tree);
        $this->componentFiller = new ComponentFiller();
    }

    public function get(): void
    {
        echo $this->parsed_tree;
    }

    /**
     * @param $main array
     * @return string
     */
    public function buildTemplate(array $main): string
    {
        return $this->componentFiller->templateWithArray($main);
    }

    public function buildCommands(): bool|int
    {
        $component_commands = [];
        foreach ($this->parsed_tree->commands as $command) {
            $main = [];
            foreach ($command->actions as $action) {
                $main[] = $this->componentFiller->{$action->action}($action->args);
            }
//            print_r($main);
            $component_commands[] = $this->componentFiller->command($command->command, $main);
        }

//        print_r($component_commands);
//        echo $this->buildTemplate($component_commands);
        return file_put_contents(storage_path('app/bot_template/bot.php'), $this->buildTemplate($component_commands));
    }

}
