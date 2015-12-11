<?php
/**
 * Inits database and user objects
 */
require 'src/autoloader.php';

$name = substr(preg_replace('/[^a-z\d]/i', '', __DIR__), -30);
session_name($name);
session_start();

$databaseDetails = array();
$databaseDetails['dsn']            = 'mysql:host=Localhost;dbname=Movie;';
$databaseDetails['username']       = 'root';
$databaseDetails['password']       = '';
$databaseDetails['driver_options'] = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");

$database = new CDatabase($databaseDetails);
$user = new CUser($database);
