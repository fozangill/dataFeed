<?php

class Logger
{
    private $logFile;

    public function __construct($logFile)
    {
        $this->logFile = $logFile;
    }

    public function logError($message): void
    {
        $logMessage = "[" . date("Y-m-d H:i:s") . "] " . $message . "\n";
        file_put_contents($this->logFile, $logMessage, FILE_APPEND);
    }
}

