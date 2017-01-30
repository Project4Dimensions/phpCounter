# pageRetrievalCounter

Autore: Project4Dimensions

pageRetrievalCounter (prc.php) è una breve script per contare il numero di accessi a una pagina web.

## Perché è stato sviluppato il pageRetrievalCounter?

L'obiettivo di pageRetrievalCounter è quello di promuovere lo sviluppo di questo algoritmo PHP e migliorare la sua utilità, fornendo aiuto e spiegando il script in diverse lingue insieme ai riferimenti pertinenti al manuale ufficiale di PHP.

## Come usare pageRetrievalCounter

Il metodo più semplice è di inserire il `prc.php` nella stessa cartella come quello del proprio file (ad esempio, index.php). Modificare questo file. Posizionare il cursore in cui il numero del contatore dovrebbe apparire e inserire il seguente:  
`<?php include "prc.php"; prc(); ?>`

L'algoritmo crea un file per memorizzare il numero del contatore. Fatta eccezione per il suffisso, questo file ha quasi lo stesso nome del file (ad esempio, index.num).

Se "err" appare invece di un numero, indica c'era un problema nella creazione di un file per memorizzare il numero. Creare manualmente il file. Se il file si chiama "index.php", il file per memorizzare il numero deve essere denominato "index.num". Questo file richiede permessi di lettura e scrittura.

I client FTP come FileZilla può cambiare i permessi su un server web, ma ciò potrebbe non essere possibile. Nonostante questo, molte aziende di web hosting hanno pannelli di controllo per fare questo (consultate le collegamenti Internet di seguito).

https://www.shorttutorials.com/control-panel/change-file-permissions.html  
https://ticket.aruba.it/kb/a155/variazione-permessi-delle-cartelle-tramite-chmod-o-script.aspx

## Pagine web utilizzando pageRetrievalCounter

http://www.msabreu.utad.pt/en/index.php

## Spiegazione dello script

```
<?php  
// Project4Dimensions: pageRetrievalCounter (prc)  
// https://github.com/Project4Dimensions/pageRetrievalCounter

// definire una funzione chiamata prc()  
function prc()  
{

    // generare un nome di un file  
    $filename = basename($_SERVER['SCRIPT_FILENAME'], ".php") . ".num";  

    // controlla se il file esiste  
    if (file_exists($filename)) {  

        // verificare se il contenuti del file è un numero intero  
        // se il contenuti del file non è un numero intero, impostare la variabile $num = 1  
        if (intval(file_get_contents($filename)) === 0) {  
            $num = 1;

        // se il contenuti del file è un numero intero, ottenere i contenuti del file  
        // impostare la variabile $num = i contenuti del file + 1  
        } else {
            $num = intval(file_get_contents($filename)) + 1;  
        }  

    // il file non esiste, impostare la variabile $num = 1  
    } else {  
        $num = 1;  
    }  

    try {

        // disattivare i messaggi di errore di PHP  
        error_reporting(0);  

        // verificare se è possibile creare il file o scrivere ad esso  
        if (file_put_contents($filename, $num, LOCK_EX) === FALSE) {  

            // se non è possibile creare il file o scrivere ad esso,  
            // generare un messaggio di "err"  
            throw new Exception("err");  

        // se è possibile creare il file o scrivere ad esso,  
        // scrivere la variabile $num al file  
        } else {  

            // l'indicatore LOCK_EX impedisce scritture contemporanee al file  
            file_put_contents($filename, $num, LOCK_EX);  

            // mostrare il numero intero memorizzato nella variabile $num  
            echo strval($num);  
        }  

    // se non è possibile creare il file o scrivere ad esso,  
    // mostrare il messaggio "err"  
    } catch (Exception $e  
        echo $e->getMessage();  
    }  
}  
?>
```

## Referenze

PHP Group. 2016. “PHP: include - Manual” Acceduto 6 gennaio.  http://php.net/manual/en/function.include.php.  
`// esempio:`  
`include "prc.php"; //`  

PHP Group. 2016. “PHP: User-defined functions - Manual” Acceduto 6 gennaio.  http://php.net/manual/en/reserved.variables.server.php.  
`// esempio:`  
`function foo ()`  
`{`  
`    echo "Ciao mondo!";`  
`}`

PHP Group. 2016. “PHP: $_SERVER - Manual” Acceduto 6 gennaio.  http://php.net/manual/en/reserved.variables.server.php.  
`// esempio:`  
`// riprodurre il percorso assoluto dello script attualmente in esecuzione`  
`echo $_SERVER['SCRIPT_FILENAME'];

PHP Group. 2016. “PHP: basename - Manual” Acceduto 6 gennaio.  http://php.net/manual/en/function.basename.php  
`// esempio:`  
`// riprodurre attuale nome del file script senza il suo suffisso`  
`echo basename($_SERVER['SCRIPT_FILENAME'], ".php");`

PHP Group. 2016. “PHP: file-exists - Manual” Acceduto 6 gennaio.  http://php.net/manual/en/function.file-exists.php
`// esempio:`  
`// controllare se un file esiste`  
`echo file_exists("index.num") // 1 (cioè, index.num esiste);`

PHP Group. 2016. “PHP: Basics - Manual” Acceduto 6 gennaio.  http://php.net/manual/en/language.variables.basics.php  
`// esempio:`  
`// imposta la variabile $num è uguale a 1`  
`$num = 1;`

PHP Group. 2016. “PHP: file-get-contents - Manual” Acceduto 6 gennaio.  http://php.net/manual/en/function.file-get-contents.php  
`// esempio:`  
`// legge tutto il file in una sequenza`  
`$num = file_get_contents("index.num");`

PHP Group. 2016. “PHP: intval - Manual” Acceduto 6 gennaio.  http://php.net/manual/en/function.intval.php  
`// esempio:`  
`// ottenere il valore intero da una variabile`  
`echo intval("042"); // 42`

PHP Group. 2016. “PHP: Operatori di incremento/decremento - Manual” Acceduto 6 gennaio.  http://php.net/manual/it/language.operators.increment.php  
`// esempio:`  
`// ++$a pre-aumento $a per uno, e poi torna $a`  
`$a = 5;`  
`echo "Dovrebbe essere 6: " . ++$a;`

PHP Group. 2016. “PHP: file-put-contents - Manual” Acceduto 6 gennaio.  http://php.net/manual/en/function.file-put-contents.php  
`// esempio:`  
`// questo è identico a chiamare in successione fopen(), fwrite() and fclose()`  
`file_put_contents($filename, $num, LOCK_EX);`

PHP Group. 2016. “PHP: strval - Manual” Acceduto 6 gennaio.  http://php.net/manual/en/function.strval.php
`// esempio:`  
`// convertire un numero in testo`  
`strval(5);`

PHP Group. 2016. “PHP: error-reporting - Manual” Acceduto 6 gennaio.  http://php.net/manual/en/function.error-reporting.php
`// esempio:`  
`// disattivare tutti i report degli errori`  
`error_reporting(0);`

PHP Group. 2016. “PHP: Operatori di confronto - Manual” Acceduto 6 gennaio.  http://php.net/manual/it/language.operators.comparison.php
`// esempio:`  
`// $a === $b (TRUE se $a è uguale a $b)`  
`file_put_contents($filename, $num, LOCK_EX) === FALSE`

PHP Group. 2016. “PHP: Exceptions - Manual” Acceduto 6 gennaio.  http://php.net/manual/en/language.exceptions.php  
`// esempio:`  
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

PHP Group. 2016. “PHP: getcwd - Manual” Acceduto 6 gennaio.  http://php.net/manual/en/function.getcwd.php  
`// esempio:`  
`// restituisce un percorso come questo: /var/www/http/qualche/cartella`  
`echo getcwd();`

PHP Group. 2016. “PHP: is-writable - Manual” Acceduto 6 gennaio.  http://php.net/manual/en/function.is-writable.php  
`// esempio:`  
`if (is_writable('file.txt')) {`  
`    echo 'E 'modificabile';`  
`} else {`  
`    echo 'Non è modificabile';`  
`}`

PHP Group. 2016. “PHP: chmod - Manual” Acceduto 6 gennaio.  http://php.net/manual/en/function.chmod.php  
`// esempio:`  
`chmod("/qualche_cartella/qualche_file", 0777);`  

PHP Group. 2016. “PHP: mkdir - Manual” Acceduto 6 gennaio.  http://php.net/manual/en/function.mkdir.php  
`// esempio:`  
`mkdir("percorso/qualche_cartella");  // la modalità di default è 0777`

University of Chicago, The. 2010. “Chicago-Style Citation Quick Guide.” *The Chicago Manual of Style Online*. http://www.chicagomanualofstyle.org/tools_citationguide.html.
