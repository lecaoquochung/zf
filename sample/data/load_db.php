<?php
$db = new PDO('sqlite:' . realpath(__DIR__) . '/zf.db');
$fh = fopen(__DIR__ . '/schema.sql', 'r');
while ($line = fread($fh, 4096)) {
    $db->exec($line);
}
fclose($fh);
