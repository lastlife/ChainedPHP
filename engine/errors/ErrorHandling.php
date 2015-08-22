<?php
/**
 * User: Paul
 * Date: 23/05/14
 * Time: 1:10
 */

function ErrorHandler($error_num, $error_msg, $error_file, $error_line) {
    throw new ErrorException($error_msg, 0, $error_num, $error_file, $error_line);
}
set_error_handler('ErrorHandler');

function ExceptionHandler(Exception $exception) {
    try {
        echo '<p>There was an error (code <strong>'.$exception->getCode().'</strong>) on file <strong>'.$exception->getFile().'</strong>, line <em>'.
            $exception->getLine().'</em>.<br>Message error:<br><code>'.$exception->getMessage().'</code><p/><br>';
        echo '<pre>'.var_export($exception->getTrace(), true).'</pre>';
    } catch (Exception $e) { }

    // Redirect to error page.
//    header('Location: error.php');
    return true;
}
set_exception_handler('ExceptionHandler');
// Fatal errors: register_shutdown_function(); AND error_get_last();
