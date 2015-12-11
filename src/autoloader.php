<?php
/**
 * Default exception handler.
 *
 */
function myExceptionHandler($exception)
{
    echo "Flork: Uncaught exception: <p>" . $exception->getMessage()
            . "</p><pre>" . $exception->getTraceAsString(), "</pre>";
}
set_exception_handler('myExceptionHandler');


/**
 * Autoloader for classes.
 *
 */
function myAutoloader($class)
{
    $path = "src/{$class}/{$class}.php";
    if (!is_file($path)) {
        throw new Exception("Classfile '{$class}' does not exists.");
    }
        include($path);
}
spl_autoload_register('myAutoloader');

function dump($array)
{
    echo "<pre>" . htmlentities(print_r($array, 1)) . "</pre>";
}
