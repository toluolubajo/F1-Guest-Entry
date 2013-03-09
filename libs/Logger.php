<?php

class Logger
{

    const LOGGER_FILE = '../var/debug.log';

    public function log($message)
    {
        try {
            if ($message) {
                $message = date("Y-m-d H:i:s") . '  ' . $message;
                $handle = fopen(self::LOGGER_FILE, 'a');
                fwrite($handle, $message);
                fclose($handle);
            }
        } catch (Exception $e) {
            var_dump($e);
        }
    }

}
