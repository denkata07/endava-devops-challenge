<?php

// database connection

$host       = "hosname";
$username   = "user";
$password   = "passwd";
$dbname     = "test";
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );