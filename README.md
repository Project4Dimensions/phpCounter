# pageRetrievalCounterPHP

A short PHP script to count web page retrieval instances  
Author and compiler: Project4Dimensions

## Why pageRetrievalCounterPHP

The aim of pageRetrievalCounterPHP is to provide clear explanations and references in several languages, so as to enhance the usefulness of the PHP algorithm.


## How to use pageRetrievalCounterPHP

Essential pageRetrievalCounterPHP plain text files:
```
pageRetrievalCounterPHP.num (stores an incremental integer)
pageRetrievalCounterPHP.php (PHP script)
```

Install the pageRetrievalCounterPHP files in some folder.  
Edit a PHP file (e.g., index.php); copy and paste the following:
```
<span>  
    «Project4Dimensions pageRetrievalCounter»  
    <?php  
    $file = "pageRetrievalCounterPHP.num";  
        $current = file_get_contents($file);  
        $current = intval($current);  
        // write contents to a file  
        // the LOCK_EX flag prevents concurrent writing to a file  
        file_put_contents($file, ++$current, LOCK_EX);  
        echo file_get_contents($file);  
    ?>  
</span>
```

pageRetrievalCounterPHP.num needs read and write permissions.

FTP clients like FileZilla can change permissions on a web server but some web hosting companies may not allow this. Nevertheless, many hosting companies have control panels to do this (see links below).

https://www.shorttutorials.com/control-panel/change-file-permissions.html  
https://ticket.aruba.it/kb/a2103/change-folder-permissions-by-using-chmod-or-scripts.aspx?translation-detect=false

For OS X and GNU/Linux systems, this can be achieved as follows:  
Open a terminal (OS X » Applications » Utilities » Terminal)
```
$ cd . # change to where pageRetrievalCounterPHP was installed  
$ chmod  0666 pageRetrievalCounterPHP.num 
```

## Web pages using pageRetrievalCounterPHP

http://www.ccsp.it/web/santuarios2016/santuarios2016ENG.php

## References

http://php.net/manual/en/function.file-get-contents.php  
`// example:`  
`$file = file_get_contents("file.txt");` 

http://php.net/manual/en/function.intval.php  
`// example:`  
'echo intval('042'); // 42`

http://php.net/manual/en/language.operators.increment.php  
`// example:`  
`// ++$a pre-increments $a by one, then returns $a`  
`$a = 5;`  
`echo "Should be 6: " . ++$a;`

http://php.net/manual/en/function.file-put-contents.php  
'// example:`  
`// this is identical to successively calling fopen(), fwrite() and fclose()`  
`file_put_contents("file.txt", "Some text", LOCK_EX);`

http://php.net/manual/en/function.getcwd.php  
`// example:`  
`// returns a path like /var/www/http/some/directory`  
`echo getcwd();`

http://php.net/manual/en/function.is-writable.php  
`// example:`  
`if (is_writable('file.txt')) {`  
`    echo 'Writable';`  
`} else {`  
`    echo 'Not writable';`  
`}`

http://php.net/manual/en/function.chmod.php  
`// example:`  
`chmod("/somedir/somefile", 0777);`  

http://php.net/manual/en/function.mkdir.php  
`// example:`  
`mkdir("path/somedir");  // mode is 0777 by default`  
