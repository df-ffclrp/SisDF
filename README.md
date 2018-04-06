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

Clonaro repositório GIT.

Dependências básicas de PHP e MySQL:

    apt-get install php php-xml php-intl php-mbstring php-gd php-mysql mysql-server

Criar usuário com permissões de root no mysql:

    mysql -p
    GRANT ALL PRIVILEGES ON *.* TO 'admin'@'%' IDENTIFIED BY 'admin';
    
Alternativamente pode criar um banco de dados e um usuário pelo phpmyadmin.

Arquivo de configuração para import do banco de dados de exemplo, 
copiar e editar o arquivo com as informações corretas:

    cp SQL/db_config-sample.sh SQL/db_config.sh 

Copiar arquivos de configuração do CI modelos:

    cp www/application/config-sample/config.php www/application/config/config.php
    cp www/application/config-sample/database.php www/application/config/databse.php

Editar config.php e alterar ao menos o *base_url*, por exemplo:

    $config['base_url'] = 'http://localhost:8888';

No database.php editar ao menos os seguintes parâmetros:

    'hostname' => 'localhost',
    'username' => 'admin',
    'password' => 'admin',
    'database' => 'sisdf',
    
Rodar script que importa dump de exmeplo: 

    ./setup.sh sample

Na pasta *www*, subir um local server PHP: 

    php -S localhost:8888
    
Ou configurar o apache para esta aplicação

Criar o arquivo .htaccess
   
    cp www/sample.htaccess www/.htaccess
    
E ajustar o RewriteBase para o seu caminho.

Para testar, acessar por exemplo com Número USP 400 e senha 123.

## Níveis de Acesso de exemplo

Existem inicialmente 4 níveis de acesso cadastrados:

- **Relator** - Somente abre chamados (todos abaixo também)
- **Técnico da seção** - Gerencia chamados de sua seção
- **Gestor da seção** - Vê os chamados da seção
- **Gestor da Unidade** - Vê os chamados de todas as seções

Os usuários de exemplo possuem as seguintes características: 

| Nº USP | Nível de Acesso |
| --------- | --------------------- |
| **500** | Relator |
| **100** | Técnico Manutenção |
| **200** | Técnico Eletrônica |
| **300** | Técnico Mecânica |
| **400** | Técnico Informática |

Para ver o painel dos Gestores de cada seção de atendimento, adicione o 1 como em:

101 - Gestor Manutenção

O Gestor da unidade possui número USP: **1000**

Senhas: **123**



