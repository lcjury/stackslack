<?php
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$DB['host'] = $url["host"];
$DB['user'] = $url["user"];
$DB['pass'] = $url["pass"];
$DB['db'] = substr($url["path"], 1);
?>
