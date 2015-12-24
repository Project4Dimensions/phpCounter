# pageRetrievalCounterPHP

A short PHP script to count web page retrieval instances

Author and compiler: Project4Dimensions


How to use pageRetrievalCounterPHP.php
--------------------------------------

pageRetrievalCounterPHP files:

  pageRetrievalCounterPHP.num (stores incremental integer as plain text)
  pageRetrievalCounterPHP.php (PHP script)
  pageRetrievalCounterPHP.txt (short manual)

Install the pageRetrievalCounterPHP files in some folder.

Edit a PHP file (e.g., index.php); copy and paste the following:
<span>
    Web pageRetrievalCounter:
    <?php
    $file = "pageRetrievalCounterPHP.num";
        $current = file_get_contents($file);
        $current = intval($current);
        // Write contents to a file
        // using the LOCK_EX flag to prevent anyone else writing to the file at the same time
        file_put_contents($file, ++$current, LOCK_EX);
        echo file_get_contents($file);
    ?>
</span>

pageRetrievalCounterPHP.num needs read and write permissions.

FTP clients like FileZilla can change permissions on the web server.

Many hosting companies have control panels to do this (see links below).

https://www.shorttutorials.com/control-panel/change-file-permissions.html
https://ticket.aruba.it/kb/a2103/change-folder-permissions-by-using-chmod-or-scripts.aspx?translation-detect=false

For OS X and GNU/Linux systems, this can be achieved as follows:
    Open a terminal (OS X » Applications » Utilities » Terminal)
    $ cd . # change to where pageRetrievalCounterPHP was installed
    $ chmod  0666 pageRetrievalCounterPHP.num


Web pages using pageRetrievalCounterPHP
---------------------------------------

http://www.ccsp.it/web/santuarios2016/santuarios2016ENG.php


Further information
-------------------

See the following PHP website pages:

http://php.net/manual/en/function.file-get-contents.php
    Example:
    $file = file_get_contents("file.txt");

http://php.net/manual/en/function.intval.php
    Example:
    echo intval('042'); // 42

http://php.net/manual/en/language.operators.increment.php
    ++$a  Pre-increments $a by one, then returns $a
    Example:
    $a = 5;
    echo "Should be 6: " . ++$a;

http://php.net/manual/en/function.file-put-contents.php
    This is identical to successively calling fopen(), fwrite() and fclose()
    Example:
    file_put_contents("file.txt", "Some text", LOCK_EX);

http://php.net/manual/en/function.getcwd.php
    Returns a path like /var/www/http/some/directory
    Example:
    echo getcwd();

http://php.net/manual/en/function.is-writable.php
    Example:
    if (is_writable('file.txt')) {
        echo 'writable';
    } else {
        echo 'not writable';
    }

http://php.net/manual/en/function.chmod.php
    Example:
    chmod("/somedir/somefile", 0777);

http://php.net/manual/en/function.mkdir.php
    Example:
    mkdir("path/somedir");  // mode is 0777 by default
