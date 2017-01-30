# pageRetrievalCounter

Author: Project4Dimensions

pageRetrievalCounter (prc.php) is a short PHP script to count web page retrieval instances.

## Why pageRetrievalCounter?

The aim of pageRetrievalCounter is to advance the development of this PHP algorithm and enhance its usefulness by providing help and explaining the script in several languages along with relevant references to the official PHP Manual.

## How to use pageRetrievalCounter

The simple method is to place `prc.php` in the same folder as your file (e.g., index.php). Edit this file. Place the cursor where the counter number should appear and insert the following:  
`<?php include "prc.php"; prc(); ?>`

The algorithm creates a file to store the counter number. Except for the suffix, this file has almost the same name as your file (e.g., index.num).

Should “err” appear instead of a number, it indicates a problem creating a file to store the number. Manually create the file. If your file is “index.php”, the file to store the number must be named “index.num”. This file requires read and write permissions.

FTP clients like FileZilla can change permissions on a web server, but this may not be possible. Nevertheless, many hosting companies have control panels to do this (see the links below).

https://www.shorttutorials.com/control-panel/change-file-permissions.html  
https://ticket.aruba.it/kb/a2103/change-folder-permissions-by-using-chmod-or-scripts.aspx?translation-detect=false

## Web pages using pageRetrievalCounter

http://www.msabreu.utad.pt/en/index.php

## The script explained

```
<?php  
// Project4Dimensions: pageRetrievalCounter (prc)  
// https://github.com/Project4Dimensions/pageRetrievalCounter

// define a function called prc()  
function prc()  
{

    // generate a file name  
    $filename = basename($_SERVER['SCRIPT_FILENAME'], ".php") . ".num";  

    // check if the file exists  
    if (file_exists($filename)) {  

        // check if the file contents is an integer  
        // if the file contents is not an integer, set the variable $num = 1  
        if (intval(file_get_contents($filename)) === 0) {  
            $num = 1;

        // if the file contents is an integer, retrieve the file contents  
        // set the variable $num = the file contents + 1  
        } else {
            $num = intval(file_get_contents($filename)) + 1;  
        }  

    // if the file does not exist, set the variable $num = 1  
    } else {  
        $num = 1;  
    }  

    try {

        // turn off PHP error messages  
        error_reporting(0);  

        // check if it is possible to create the file or write to it  
        if (file_put_contents($filename, $num, LOCK_EX) === FALSE) {  

            // if it is not possible to create the file or write to it,  
            // generate an "err" message  
            throw new Exception("err");  

        // if it is possible to create the file or write to it,  
        // write the variable $num to the file  
        } else {  

            // the LOCK_EX flag prevents concurrent writes to the file  
            file_put_contents($filename, $num, LOCK_EX);  

            // display the integer stored in the variable $num  
            echo strval($num);  
        }  

    // if it is not possible to create the file or write to it,  
    // display the "err" message  
    } catch (Exception $e  
        echo $e->getMessage();  
    }  
}  
?>
```

## References

PHP Group. 2016. “PHP: include - Manual” Accessed January 6.  http://php.net/manual/en/function.include.php  
`// example:`  
`include "prc.php"; // copy a script from an external file`  

PHP Group. 2016. “PHP: User-defined functions - Manual” Accessed January 6.  http://php.net/manual/en/reserved.variables.server.php.  
`// example:`  
`function foo ()`  
`{`  
`    echo "Hello world!";`  
`}`

PHP Group. 2016. “PHP: $_SERVER - Manual” Accessed January 6.  http://php.net/manual/en/reserved.variables.server.php.  
`// example:`  
`// reproduce the absolute pathname of the currently executing script`  
`echo $_SERVER['SCRIPT_FILENAME'];`

PHP Group. 2016. “PHP: basename - Manual” Accessed January 6.  http://php.net/manual/en/function.basename.php  
`// example:`  
`// reproduce current script file name without its suffix`  
`echo basename($_SERVER['SCRIPT_FILENAME'], ".php");`

PHP Group. 2016. “PHP: file-exists - Manual” Accessed January 6.  http://php.net/manual/en/function.file-exists.php  
`// example:`  
`// check if a file exists`  
`echo file_exists("index.num") // 1 (i.e., index.num exists);`

PHP Group. 2016. “PHP: Basics - Manual” Accessed January 6.  http://php.net/manual/en/language.variables.basics.php  
`// example:`  
`// sets the variable $num equals 1`  
`$num = 1;`

PHP Group. 2016. “PHP: file-get-contents - Manual” Accessed January 6.  http://php.net/manual/en/function.file-get-contents.php  
`// example:`  
`// reads entire file into a string`  
`$num = file_get_contents("index.num");`

PHP Group. 2016. “PHP: intval - Manual” Accessed January 6.  http://php.net/manual/en/function.intval.php  
`// example:`  
`// get the integer value of a variable`  
`echo intval("042"); // 42`

PHP Group. 2016. “PHP: Incrementing/Decrementing Operators - Manual” Accessed January 6.  http://php.net/manual/en/language.operators.increment.php  
`// example:`  
`// ++$a pre-increments $a by one, then returns $a`  
`$a = 5;`  
`echo "Should be 6: " . ++$a;`

PHP Group. 2016. “PHP: file-put-contents - Manual” Accessed January 6.  http://php.net/manual/en/function.file-put-contents.php  
`// example:`  
`// this is identical to successively calling fopen(), fwrite() and fclose()`  
`file_put_contents($filename, $num, LOCK_EX);`

PHP Group. 2016. “PHP: strval - Manual” Accessed January 6.  http://php.net/manual/en/function.strval.php  
`// example:`  
`// convert a number to text`  
`strval(5);`

PHP Group. 2016. “PHP: error-reporting - Manual” Accessed January 6.  http://php.net/manual/en/function.error-reporting.php
`// example:`  
`// turn off all error reporting`  
`error_reporting(0);`

PHP Group. 2016. “PHP: Comparison Operators - Manual” Accessed January 6.  http://php.net/manual/en/language.operators.comparison.php
`// example:`  
`// $a === $b (TRUE if $a is identical to $b)`  
`file_put_contents($filename, $num, LOCK_EX) === FALSE`

PHP Group. 2016. “PHP: Exceptions - Manual” Accessed January 6.  http://php.net/manual/en/language.exceptions.php  
`// example:`  
`try {`  
`    if (file_put_contents($filename, $num, LOCK_EX) === FALSE) {`  
`        throw new Exception("err");`  
`    } else {`  
`        file_put_contents($filename, $num, LOCK_EX);`  
`        echo strval($num);`  
`    }`  
`} catch (Exception $e) {`  
`    echo $e->getMessage();`  
`}`

PHP Group. 2016. “PHP: getcwd - Manual” Accessed January 6.  http://php.net/manual/en/function.getcwd.php  
`// example:`  
`// returns a path like /var/www/http/some/directory`  
`echo getcwd();`

PHP Group. 2016. “PHP: is-writable - Manual” Accessed January 6.  http://php.net/manual/en/function.is-writable.php  
`// example:`  
`if (is_writable("index.num")) {`  
`    echo "Writable";`  
`} else {`  
`    echo "Not writable";`  
`}`

PHP Group. 2016. “PHP: chmod - Manual” Accessed January 6.  http://php.net/manual/en/function.chmod.php  
`// example:`  
`chmod("/somedir/somefile", 0777);`

PHP Group. 2016. “PHP: mkdir - Manual” Accessed January 6.  http://php.net/manual/en/function.mkdir.php  
`// example:`  
`mkdir("path/somedir");  // mode is 0777 by default`

University of Chicago, The. 2010. “Chicago-Style Citation Quick Guide.” *The Chicago Manual of Style Online*. http://www.chicagomanualofstyle.org/tools_citationguide.html.
