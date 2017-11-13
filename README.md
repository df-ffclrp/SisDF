# Sistema de Gestão de Chamados Técnicos - SisDF

**Autor:** André Luiz Girol

Sistema com o intuito de gerenciar chamados técnicos para os setores do Departamento de Física - FFCLRP
 
## Tecnologias utilizadas
 
Sistema desenvolvido utilizando as tecnologias abaixo:

* CodeIgniter
* Bootstrap
* SB Admin2
* Font Awesome

Procedimentos para deploy:

 - Montar um servidor MySQL e criar usuário com permissões de root 
 - Copiar arquivo SQL/db_config-sample.sh para SQL/db_config.sh e colocar dados 
   do mysql
 - Configurar arquivos application/config/config.php e application/config/database.php,
   copiando modelos da pasta application/config-sample.
 - Importar dumps de teste: ./setup.sh sample
 - Na pasta www subir um localserver PHP: php7.0 -S localhost:8888
