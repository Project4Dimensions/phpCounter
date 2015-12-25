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

Il file pageRetrievalCounterPHP.num ha bisogno di autorizzazioni per leggere e scrivere.

Client FTP come FileZilla possono modificare le autorizzazioni sul server web, ma alcune aziende di web hosting potrebbe non permettere questo.

Tuttavia, tali aziende di web hosting probabilmente hanno pannelli di controllo per fare questo (vedi link sotto).

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
    Esempio:  
    $file = file_get_contents("file.txt");  

http://php.net/manual/en/function.intval.php  
    Esempio:  
    echo intval('042'); // 42  

http://php.net/manual/en/language.operators.increment.php  
    ++$a  Pre-increments $a by one, then returns $a  
    Esempio:  
    $a = 5;  
    echo "Dovrebbe essere 6: " . ++$a;

http://php.net/manual/en/function.file-put-contents.php  
    Questo è identico a chiamare in successione fopen(), fwrite() e fclose()  
    Esempio:  
    file_put_contents("file.txt", "Alcuni testi", LOCK_EX);  

http://php.net/manual/en/function.getcwd.php  
    Restituirà una percorso come /var/www/http/qualche/cartella/  
    Esempio:  
    echo getcwd();  

http://php.net/manual/en/function.is-writable.php  
    Esempio:  
    if (is_writable('file.txt')) {  
        echo 'scrivibile';  
    } else {  
        echo 'non scrivibile';  
    }

http://php.net/manual/en/function.chmod.php  
    Esempio:  
    chmod("/qualche_cartella/qualche_file", 0777);  

http://php.net/manual/en/function.mkdir.php  
    Esempio:  
    mkdir("percorso/qualche_cartella");  // la modalità predefinito è 0777
