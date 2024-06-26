<?php

use JetBrains\PhpStorm\NoReturn;

/**
 * Class ExceptionHandler
 *
 * Handles exceptions and errors, logs details, and renders error pages.
 */
class ExceptionHandler {
    /**
     * Handles the given exception or error.
     *
     * @param Exception|Error $exception The exception or error to handle.
     * @param string $message The optional message to display to the user.
     *
     * @return void
     */
    #[NoReturn]
    public static function handleException(Exception|Error $exception, string $message = ''): void {
        // Log exception details
        self::logDetails($exception);
        
        // Render the error page
        
        header('Location: ' . BASE_URL . "/error/display/?message=" . urlencode($message));
//        $errorController = new ErrorController();
//        $errorController->display($message);
        
        // Terminate the application gracefully
        exit();
    }
    
    /**
     * Logs details of the given exception or error.
     *
     * @param Exception|Error $exception The exception or error to log.
     *
     * @return void
     */
    protected static function logDetails(Exception|Error $exception): void {
        $exceptionDetails = [
            'message' => $exception->getMessage(),
            'code' => $exception->getCode(),
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            'trace' => $exception->getTraceAsString()
        ];
        
        // Format and send exception details to the log file
        error_log(implode(PHP_EOL, $exceptionDetails));
    }
}
