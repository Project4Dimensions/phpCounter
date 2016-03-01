<?php
// Project4Dimensions: pageRetrievalCounterPHP
// https://github.com/Project4Dimensions/pageRetrievalCounterPHP

function prcp()
{
    $filename = basename($_SERVER['SCRIPT_FILENAME'], ".php") . ".num";

    if (file_exists($filename)) {
        if (intval(file_get_contents($filename)) === 0) {
            $num = 1;
        } else {
            $num = intval(file_get_contents($filename)) + 1;
        }
    }else {
        $num = 1; 
    }

    try {
        error_reporting(0);
        if (file_put_contents($filename, $num, LOCK_EX) === FALSE) {
            throw new Exception("err");
        } else {
            file_put_contents($filename, $num, LOCK_EX);
            echo strval($num);
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>
