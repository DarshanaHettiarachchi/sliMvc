<?php
namespace Core;

class Error
{
   
    public static function errorHandler($level, $message, $file, $line)
    {
    
        if (error_reporting() !== 0) { //to keep @ operator working
            throw new \ErrorException($message, 0, $level, $file, $line);
        }
    }

    public static function exceptionHandler($exception)
    {
        echo "<h1>Fatel Eror</h1>";
        echo "<p>Uncaught Exception: " . get_class($exception) . "</P>";
        echo "<p>Message: " . $exception->getMessage() . "</P>";
        echo "<p>Stack Trace: <pre>" . $exception->getTraceAsString()
            . "</pre></P>";
        echo "<p>Thrown In: " . $exception->getFile() . " (On Line "
            . $exception->getLine() . ")</P>";
    }
}
