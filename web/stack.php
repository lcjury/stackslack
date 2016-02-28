<?php
require('command.php');
class Stack extends Command
{
    function commandHelp()
    {
        return "help message";
    }
    function commandShow($key)
    {
        $result = mysqli_query($this->link, "SELECT `value` FROM stack WHERE `key` = '$key' ORDER BY `id` DESC LIMIT 10;");
        if ($result->num_rows == 0)
            $response = "Empty Stack \r\n";
        $max_size = 0;
        while ($row = $result->fetch_row())
        {
            $max_size = max($max_size, strlen($row[0]));
            $response .= $row[0]."\r\n";
        }
        $result->close();

        $separator = '+'.str_repeat('-', $max_size*1.3).'+';
        $response = $separator."\r\n".$response.$separator;
        return $response;
    }
    function commandPush($key, $value)
    {
        if ($key == "" || $value == "")
            return "Syntax Error";
        mysqli_query($this->link, "INSERT INTO stack values (null,'$key','$value')");
        return $this->commandShow($key);
    }
    function commandPop($key)
    {
        if ($key == "")
            return "Syntax Error";
        mysqli_query($this->link, "DELETE FROM stack WHERE `id` = (SELECT * FROM (SELECT MAX(id) FROM stack WHERE `key` = '$key') AS S)");
        return $this->commandShow($key);
    }
}
?>
