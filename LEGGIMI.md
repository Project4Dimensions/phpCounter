
# pageRetrievalCounterPHP

Uno script PHP breve per contare i casi di richiamo di pagine web

Autore e compilatore: Project4Dimensions


Come usare pageRetrievalCounterPHP.php
--------------------------------------

I file dell'applicazione pageRetrievalCounterPHP:

  pageRetrievalCounterPHP.num (memorizza un numero intero crescente)  
  pageRetrievalCounterPHP.php (PHP script)  
  pageRetrievalCounterPHP.txt (una breve manuale)

Installare i file dell'applicazione pageRetrievalCounterPHP in qualche cartella

Modificare un file PHP (ad esempio, index.php); copiare e incollare il seguente:
<span>  
    «Project4Dimensions pageRetrievalCounter»  
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

Il file pageRetrievalCounterPHP.num ba bisogno di autorizzazioni per leggere e scrivere.

Client FTP come FileZilla possono modificare le autorizzazioni sul server web, ma  imprese di web hosting potrebbe non permettere questo.

Tuttavia, tali società di web hosting probabilmente hanno pannelli di controllo per fare questo (vedi link sotto).

https://www.shorttutorials.com/control-panel/change-file-permissions.html

https://ticket.aruba.it/kb/a2103/change-folder-permissions-by-using-chmod-or-scripts.aspx?translation-detect=false

https://ticket.aruba.it/kb/a155/variazione-permessi-delle-cartelle-tramite-chmod-o-script.aspx


Per i sistemi OS X e GNU/Linux, le autorizzazioni possono essere modificate come segue::  
    Aprite un terminale (OS X » Applications » Utilities » Terminal)  
    $ cd . # passare alla cartella in cui è stata installata l'applicazione
    $ chmod  0666 pageRetrievalCounterPHP.num  


Pagine Web utilizzando pageRetrievalCounterPHP
----------------------------------------------

http://www.ccsp.it/web/santuarios2016/santuarios2016ENG.php


Più informazione
----------------

Vedere le seguenti pagine del sito PHP:

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
