<?php

$host = 'localhost:3307';
$username = 'root';
$password = '0000';
$dbname = 'gamedb';

$link = new mysqli($host, $username, $password);
if (!$link) {
    die('Could not connect: ' . $link->connect_error);
}

$link->select_db($dbname);
