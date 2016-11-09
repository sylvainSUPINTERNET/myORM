<?php
require_once 'conf.php';

global $pdo;
$pdo = new PDO($config['host'],$config['user'],$config['password']);
