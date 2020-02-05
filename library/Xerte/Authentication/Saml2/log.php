<?php

global $development;
$development = true;

ini_set('error_reporting', 0);
if ($development) {
    ini_set('error_reporting', E_ALL);
    // Change this to where you want the XOT log file to go;
    // the webserver will need to be able to write to it.
    define('XOT_DEBUG_LOGFILE', '/usr/local/docs/sso/sso.log');
}

/**
 * @param string $string - the message to write to the debug file.
 * @param int $up - how far up the call stack we go to; this affects the line number/file name given in logging
 */
function logToFile($string, $up = 0) {
    global $development;
    if (isset($development) && $development) {
        if (!is_string($string)) {
            $string = print_r($string, true);
        }

        // yes, we really don't want to report file write errors if this doesn't work.

        $backtrace = debug_backtrace();
        if (isset($backtrace[$up]['file'])) {
            $string = $backtrace[$up]['file'] . $backtrace[$up]['line'] . $string;
        }
        $file = '/tmp/debug.log';
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $file = 'c:\debug.log';
        }

        if (defined('XOT_DEBUG_LOGFILE')) {
            $file = XOT_DEBUG_LOGFILE;
        }
        if (!file_exists($file)) {
            @touch($file); // try and create it.
        }


        if (!is_writable($file)) { // fall back to PHP's inbuilt log, which may go to the apache log file, syslog or somewhere else.
            error_log($string);
        } else {
            @file_put_contents($file, date('Y-m-d H:i:s ') . $string . "\n", FILE_APPEND);
        }
    }
}

