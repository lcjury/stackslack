<?php 
header('Content-Type: application/json');
require('config.php');
require('stack.php');


$stack = new Stack();
$link = mysqli_connect($DB['host'], $DB['user'], $DB['pass'], $DB['db']);
$stack->setLink($link);
$args = explode(" ",$_POST['text']);
$response = $stack($args);

$data = array(
    'response_type' => 'in_channel',
    'text' => $response,
    'username' => 'stack_bot',
    'channel' => '#'.$_POST['channel_name']
);
echo json_encode($data);
?>
