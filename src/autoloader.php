<?php
/**
 * Default exception handler.
 */
function myExceptionHandler($exception)
{
    echo "Flork: Uncaught exception: <p>" . $exception->getMessage()
            . "</p><pre>" . $exception->getTraceAsString(), "</pre>";
}
set_exception_handler('myExceptionHandler');


/**
 * Autoloader for classes.
 */
function myAutoloader($class)
{
    $path = "src/{$class}/{$class}.php";
    if (is_file($path)) {
        include $path;
    }
}
spl_autoload_register('myAutoloader');

function dump($array)
{
    echo $array;
    //Comments for validation
    //echo "<pre>" . htmlentities(print_r($array, 1)) . "</pre>";
}
