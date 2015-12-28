# pageRetrievalCounterPHP

Una breve programma per contare il numero di accessi a una pagina web  
Autore e compilatore: Project4Dimensions

## Perché è stato sviluppato il pageRetrievalCounterPHP?

L'obiettivo del pageRetrievalCounterPHP è quello di fornire spiegazioni e riferimenti chiari in diverse lingue, in modo da migliorare l'utilità dell'algoritmo PHP.

## Come usare pageRetrievalCounterPHP

I file essenziali del pageRetrievalCounterPHP:
```
  pageRetrievalCounterPHP.num (memorizzare un numero intero crescente)  
  pageRetrievalCounterPHP.php (il programma PHP)  
```

Installare i file dell'applicazione pageRetrievalCounterPHP in qualche cartella  
Modificare un file PHP (ad esempio, index.php); copiare e incollare il seguente:
```
<span>  
    «Project4Dimensions pageRetrievalCounter»  
    <?php  
    $file = "pageRetrievalCounterPHP.num";  
        $attuale = file_get_contents($file);  
        $attuale = intval($attuale);  
        // Scrivere il contenuto in un file  
        // il flag, “LOCK_EX”, impedisce la scrittura simultanea su un file  
        file_put_contents($file, ++$attuale, LOCK_EX);  
        echo file_get_contents($file);  
    ?>  
</span>
```

Il file, “pageRetrievalCounterPHP.num”, ha bisogno di autorizzazioni per leggere e scrivere.

I client FTP, come FileZilla, possono modificare le autorizzazioni sul server web, ma alcune aziende di web hosting potrebbe non permettere questo. Tuttavia, tali aziende di web hosting probabilmente hanno pannelli di controllo per fare questo (vedere i link qui sotto).

https://www.shorttutorials.com/control-panel/change-file-permissions.html  
https://ticket.aruba.it/kb/a155/variazione-permessi-delle-cartelle-tramite-chmod-o-script.aspx

Per i sistemi OS X e GNU/Linux, le autorizzazioni possono essere modificate come segue:  
Aprite un terminale (OS X » Applicazioni » Utilità » Terminale)  
```
$ cd .  # passare alla cartella in cui è stata installata l'applicazione
$ chmod 0666 pageRetrievalCounterPHP.num
```

## Pagine Web utilizzando pageRetrievalCounterPHP

http://www.ccsp.it/web/santuarios2016/santuarios2016ENG.php

## Referenze

http://php.net/manual/en/function.file-get-contents.php  
`// esempio:`  
`$file = file_get_contents("file.txt");`

http://php.net/manual/en/function.intval.php  
`// esempio:`  
`echo intval('042'); // 42`

http://php.net/manual/en/language.operators.increment.php  
`// esempio:`  
`// ++$a pre-aumento $a per uno, e poi torna $a`  
`$a = 5;`  
`echo "Dovrebbe essere 6: " . ++$a;`

http://php.net/manual/en/function.file-put-contents.php  
`// esempio:`  
`// questo è identico a chiamare in successione fopen(), fwrite() and fclose()`  
`file_put_contents("file.txt", "Alcuni testi", LOCK_EX);`

http://php.net/manual/en/function.getcwd.php  
`// esempio:`  
`// restituisce un percorso come questo: /var/www/http/qualche/cartella`  
`echo getcwd();`

http://php.net/manual/en/function.is-writable.php  
`// esempio:`  
`if (is_writable('file.txt')) {`  
`    echo 'E 'modificabile';`  
`} else {`  
`    echo 'Non è modificabile';`  
`}`

http://php.net/manual/en/function.chmod.php  
`// esempio:`  
`chmod("/qualche_cartella/qualche_file", 0777);`  

http://php.net/manual/en/function.mkdir.php  
`// esempio:`  
`mkdir("percorso/qualche_cartella");  // la modalità di default è 0777`
