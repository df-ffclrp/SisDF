# Sistema de Gestão de Chamados Técnicos - SisDF

**Autor:** André Luiz Girol

Sistema com o intuito de gerenciar chamados técnicos para os setores do Departamento de Física - FFCLRP
 
## Tecnologias utilizadas
 
Sistema desenvolvido utilizando as tecnologias abaixo:

* CodeIgniter
* Bootstrap
* SB Admin2
* Font Awesome

## Procedimentos para deploy em ambiente dev (testado em Ubuntu Server 16.04):

Dependências básicas de PHP e MySQL:

    apt-get install php php-xml php-intl php-mbstring php-gd php-mysql mysql-server

Criar usuário com permissões de root no mysql:

    mysql -p
    GRANT ALL PRIVILEGES ON *.* TO 'admin'@'%' IDENTIFIED BY 'admin';

Arquivo de configuração para import do banco de dados de exemplo, 
copiar e editar o arquivo com as informações corretas:

    cp SQL/db_config-sample.sh SQL/db_config.sh 

Copiar arquivos de configuração do CI modelos:

    cp application/config-sample/config.php application/config/config.php
    cp application/config-sample/database.php application/config/databse.php

Editar config.php e alterar ao menos o *base_url*, por exemplo:

    $config['base_url'] = 'http://localhost:8888';

No database.php editar ao menos os seguintes parâmetros:

    'hostname' => 'localhost',
    'username' => 'admin',
    'password' => 'admin',
    'database' => 'sisdf',
    
Rodar script que importar dump de exmeplo: 

    ./setup.sh sample

Na pasta www, subir um local server PHP: 

    php -S localhost:8888

Para testar, acessar por exemplo com usuário 400 e senha 123.

