# pageRetrievalCounterPHP

Autor: Project4Dimensions

pageRetrievalCounterPHP (prcp.php) é um pequeno script de PHP para contar o número de acessos a uma página web.

## Porque foi desenvolvido o pageRetrievalCounterPHP?

O objetivo do pageRetrievalCounterPHP é avançar o desenvolvimento deste algoritmo PHP e aumentar a sua utilidade, fornecendo ajuda e explicando o script em várias línguas, juntamente com as referências relevantes para o manual oficial PHP.

## Como usar o pageRetrievalCounterPHP

O método simples é colocar `prcp.php` na mesma pasta do seu ficheiro (por exemplo, index.php). Editar este ficheiro. Coloque o cursor onde o número de contador deve aparecer e insira o seguinte:  
`<?php include "prcp.php"; prcp(); ?>`

O algoritmo cria um ficheiro para armazenar o número de contador. Exceto para o sufixo, este ficheiro tem quase o mesmo nome de seu ficheiro (por exemplo, index.num).

Se "err" aparece em vez de um número, isso indica um problema ao criar um ficheiro para armazenar o número. Criar o ficheiro manualmente. Se o ficheiro é chamado "index.php", o arquivo para armazenar o número deve ser nomeado "index.num". Este ficheiro requer permissões de leitura e escrita.

Os clientes de FTP, como FileZilla, podem alterar as permissões no servidor da web, mas este pôde ser impossível. No entanto, muitas empresas de hospedagem na web têm painéis de controle para fazer isto (consulte os seguintes links de internet).

https://www.shorttutorials.com/control-panel/change-file-permissions.html  
https://ticket.aruba.it/kb/a155/variazione-permessi-delle-cartelle-tramite-chmod-o-script.aspx  

## Páginas da web que usam pageRetrievalCounterPHP

http://www.ccsp.it/web/santuarios2016/santuarios2016ENG.php

## Explicação do script

```
<?php  
// Project4Dimensions: pageRetrievalCounterPHP (prcp)  
// https://github.com/Project4Dimensions/pageRetrievalCounterPHP

// isto define uma função denominada prcp()  
function prcp()  
{

    // isto gera um nome para o ficheiro  
    $filename = basename($_SERVER['SCRIPT_FILENAME'], ".php") . ".num";  

    // verificar se o ficheiro existe  
    if (file_exists($filename)) {  

        // verifique se o conteúdo do ficheiro é um número inteiro  
        // se o conteúdo do ficheiro não é um inteiro, configura a variável $num = 1  
        if (intval(file_get_contents($filename)) === 0) {  
            $num = 1;

        // se o conteúdo do ficheiro é um número inteiro, obter o conteúdo do ficheiro  
        // configura a variável $num = o conteúdo do ficheiro + 1  
        } else {
            $num = intval(file_get_contents($filename)) + 1;  
        }  

    // se o ficheiro não existe, configura a variável $num = 1  
    } else {
        $num = 1;  
    }  

    try {

        // desativar as mensagens de erro do PHP  
        error_reporting(0);  

        // verificar se é possível criar o ficheiro ou gravar nela  
        if (file_put_contents($filename, $num, LOCK_EX) === FALSE) {  

            // Se o ficheiro não pode ser criado ou gravado,  
            // gerar uma mensagem de "err"  
            throw new Exception("err");  

        // se é possível criar o ficheiro ou gravar nela,  
        // gravar a variável $num para o ficheiro  
        } else {  

            // o sinalizador LOCK_EX impede a gravação simultânea para o ficheiro  
            file_put_contents($filename, $num, LOCK_EX);  

            // exibir o número inteiro armazenado na variável $num  
            echo strval($num);  
        }  

    // se não é possível criar o ficheiro ou gravar nela,  
    // exibir a mensagem de  "err"  
    } catch (Exception $e  
        echo $e->getMessage();  
    }  
}  
?>
```

## Referências

PHP Group. 2016. “PHP: include - Manual.” Acessado em 6 de janeiro.  http://php.net/manual/pt_BR/function.include.php.  
`// exemplo:`  
`include "prcp.php"; // copiar um script guardada num ficheiro externo`  

PHP Group. 2016. “PHP: Funções definidas pelo usuário - Manual” Acessado em 6 de janeiro.  http://php.net/manual/pt_BR/functions.user-defined.php.  
`// exemplo:`  
`function foo ()`  
`{`  
`    echo "Ola mundo!";`  
`}`

PHP Group. 2016. “PHP: $_SERVER - Manual” Acessado em 6 de janeiro.  http://php.net/manual/pt_BR/reserved.variables.server.php.  
`// exemplo:`  
`// reproduzir o caminho absoluto do script atualmente em execução.`  
`echo $_SERVER['SCRIPT_FILENAME'];`

PHP Group. 2016. “PHP: basename - Manual.” Acessado em 6 de janeiro.  http://php.net/manual/pt_BR/function.basename.php  
`// exemplo:`  
`// reproduzir nome de ficheiro atual sem seu sufixo`  
`basename($_SERVER["SCRIPT_FILENAME"], ".php")`

PHP Group. 2016. “PHP: file-exists - Manual.” Acessado em 6 de janeiro.  http://php.net/manual/pt_BR/function.file-exists.php
`// exemplo:`  
`// verificar se existe um ficheiro`  
`echo file_exists("index.num") // 1 (i.e., existe index.num);`

PHP Group. 2016. “PHP: Introdução - Manual” Acessado em 6 de janeiro.  http://php.net/manual/en/language.variables.basics.php  
`// exemplo:`  
`// configura a variável $num é igual a 1`  
`$num = 1;`

PHP Group. 2016. “PHP: file-get-contents - Manual.” Acessado em 6 de janeiro.  http://php.net/manual/pt_BR/function.file-get-contents.php  
`// exemplo:`  
`// lê todo o conteúdo de um ficheiro para uma string`  
`$num = file_get_contents("index.num");`

PHP Group. 2016. “PHP: intval - Manual.” Acessado em 6 de janeiro.  http://php.net/manual/pt_BR/function.intval.php  
`// exemplo:`  
`// retorna o valor inteiro da variável`  
`echo intval('042'); // 42`

PHP Group. 2016. “PHP: Operadores de Incremento/Decremento - Manual.” Acessado em 6 de janeiro.  http://php.net/manual/pt_BR/language.operators.increment.php  
`// exemplo:`  
`// ++$a pré-aumenta $a por um, e em seguida, retorna $a`  
`$a = 5;`  
`echo "Deve ser 6: " . ++$a;`

PHP Group. 2016. “PHP: file-put-contents - Manual.” Acessado em 6 de janeiro.  http://php.net/manual/pt_BR/function.file-put-contents.php  
`// exemplo:`  
`// isto é idêntico a chamar sucessivamente fopen(), fwrite() e fclose()`  
`file_put_contents($filename, $num, LOCK_EX);`

PHP Group. 2016. “PHP: strval - Manual” Acceduto 6 gennaio.  http://php.net/manual/pt_BR/function.strval.php
`// exemplo:`  
`// converter um número para texto`  
`strval(5);`

PHP Group. 2016. “PHP: error-reporting - Manual” Acessado em 6 de janeiro.  http://php.net/manual/pt_BR/function.error-reporting.php
`// exemplo:`  
`// desativar o todos os relatórios de erro`  
`error_reporting(0);`

PHP Group. 2016. “PHP: Operadores de Comparação - Manual” Acessado em 6 de janeiro.  http://php.net/manual/pt_BR/language.operators.comparison.php
`// exemplo:`  
`// $a === $b (verdadeiro se $a é igual a $b)`  
`file_put_contents($filename, $num, LOCK_EX) === FALSE`

PHP Group. 2016. “PHP: Exceções - Manual” Acessado em 6 de janeiro.  http://php.net/manual/pt_BR/language.exceptions.php  
`// exemplo:`  
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

PHP Group. 2016. “PHP: getcwd - Manual.” Acessado em 6 de janeiro.  http://php.net/manual/pt_BR/function.getcwd.php  
`// exemplo:`  
`// retorna um caminho como /var/www/http/alguma/pasta`  
`echo getcwd();`

PHP Group. 2016. “PHP: is-writable - Manual” Acessado em 6 de janeiro.  http://php.net/manual/pt_BR/function.is-writable.php  
`// exemplo:`  
`if (is_writable('ficheiro.txt')) {`  
`    echo 'É gravável';`  
`} else {`  
`    echo 'Não é gravável';`  
`}`

PHP Group. 2016. “PHP: chmod - Manual” Acessado em 6 de janeiro.  http://php.net/manual/pt_BR/function.chmod.php  
`// exemplo:`  
`chmod("/alguma_pasta/algum_ficheiro", 0777);`  

PHP Group. 2016. “PHP: mkdir - Manual” Acessado em 6 de janeiro.  http://php.net/manual/pt_BR/function.mkdir.php  
`// exemplo:`  
`mkdir("caminho/alguma_pasta");  // modo padrão é 0777`

University of Chicago, The. 2010. “Chicago-Style Citation Quick Guide.” *The Chicago Manual of Style Online*. http://www.chicagomanualofstyle.org/tools_citationguide.html.
