<?php
class Command
{
    function setLink($link)
    {
        $this->link = $link;
    }
    function isCommand($command)
    {
        return method_exists(get_class($this), 'command'.ucfirst($command));
    }
    function __invoke($arguments)
    {
        $command = array_shift($arguments);
        if (!$this->isCommand($command))
            return "Syntax Error: Command not found.";
        return call_user_func_array([$this,'command'.ucfirst($command)], $arguments);
    }
}
?>
