# pageRetrievalCounterPHP

Um pequeno programa de PHP para contar casos de acesso a uma página web  
Autor e compilador: Project4Dimensions

## Porque foi desenvolvido o algoritmo? pageRetrievalCounterPHP?

O objetivo do pageRetrievalCounterPHP é fornecer explicações e referências claras em várias línguas, a fim de melhorar a utilidade do algoritmo PHP.

## Como usar o pageRetrievalCounterPHP.php

Os ficheiros essenciais (do tipo texto simples) do pageRetrievalCounterPHP:  
```
pageRetrievalCounterPHP.num (para armazenar um número inteiro crescente)
pageRetrievalCounterPHP.php (um programa de PHP)
```

Instale os ficheiros do pageRetrievalCounterPHP em alguma pasta.  
Editar um ficheiro PHP (por exemplo, index.php); copie e cole o seguinte:  
```
<span>
    «Project4Dimensions pageRetrievalCounter»
    <?php
        $ficheiro = "pageRetrievalCounterPHP.num";
        $atual = file_get_contents($ficheiro);
        $atual = intval($atual);
        // escreve o conteúdo em um ficheiro
        // o sinalizador “LOCK_EX” impede a escrita simultânea a um ficheiro
        file_put_contents($ficheiro, ++$atual, LOCK_EX);
        echo file_get_contents($ficheiro);
    ?>
</span>
```

O ficheiro, “pageRetrievalCounterPHP.num”, requer permissões de leitura e escrita.

Os clientes de FTP, como FileZilla, pode alterar as permissões no servidor da web, mas algumas empresas de hospedagem na web pode não permitir isso. No entanto, muitas empresas de hospedagem na web têm painéis de controle para fazer isso (consulte os links abaixo).

https://www.shorttutorials.com/control-panel/change-file-permissions.html  
https://ticket.aruba.it/kb/a155/variazione-permessi-delle-cartelle-tramite-chmod-o-script.aspx  

Para sistemas do Mac OS X e GNU / Linux, isto pode ser conseguido da seguinte forma:  
Abra um terminal (Mac OS X » Aplicativos » Utilidades » Terminal)  
```
$ cd .  # mude para a pasta onde foi instalado pageRetrievalCounterPHP
$ chmod 0666 pageRetrievalCounterPHP.num
```

## Páginas da Web que usam pageRetrievalCounterPHP

http://www.ccsp.it/web/santuarios2016/santuarios2016ENG.php

## Referências

http://php.net/manual/en/function.file-get-contents.php  
`// exemplo:`    
`$ficheiro = file_get_contents("ficheiro.txt");`

http://php.net/manual/en/function.intval.php  
`// exemplo:`    
`echo intval('042'); // 42`

http://php.net/manual/en/language.operators.increment.php  
`// exemplo:`    
`// ++$a pré-aumenta $a por um, e em seguida, retorna $a`  
`$a = 5;`  
`echo "Deve ser 6: " . ++$a;`

http://php.net/manual/en/function.file-put-contents.php  
`// exemplo:`  
`// isso é idêntico a chamar sucessivamente fopen(), fwrite() e fclose()`  
`file_put_contents("ficheiro.txt", "Algum texto", LOCK_EX);`

http://php.net/manual/en/function.getcwd.php  
`// exemplo:`  
`// retorna um caminho como /var/www/http/alguma/pasta`  
`echo getcwd();`

http://php.net/manual/en/function.is-writable.php  
`// exemplo:`  
`if (is_writable('ficheiro.txt')) {`  
`    echo 'E gravável';`  
`} else {`  
`    echo 'Não é gravável';`  
`}`

http://php.net/manual/en/function.chmod.php  
`// exemplo:`  
`chmod("/alguma_pasta/algum_ficheiro", 0777);`  

http://php.net/manual/en/function.mkdir.php  
`// exemplo:`  
`mkdir("caminho/alguma_pasta");  // modo padrão é 0777`
