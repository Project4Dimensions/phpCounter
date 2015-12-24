<?php
$file = "pageRetrievalCounterPHP.num";
    $current = file_get_contents($file);
    $current = intval($current);
    // Write contents to a file
    // using the LOCK_EX flag to prevent anyone else writing to the file at the same time
    file_put_contents($file, ++$current, LOCK_EX);
    echo file_get_contents($file);

// How to use pageRetrievalCounterPHP.php: see pageRetrievalCounterPHP.txt
?>
