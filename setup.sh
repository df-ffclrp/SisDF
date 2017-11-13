#!/bin/bash
#
# Script para criar ambiente de desenvolvimento
#

ROOT_PATH=`pwd`
SQL_ROOT=$ROOT_PATH'/SQL/'
DB_CONFIG=$ROOT_PATH'/SQL/db_config.sh'

echo $ROOT_PATH
if ! [ -f $DB_CONFIG ]; then
    echo -e "[ERRO:] Arquivo de configuração não encontrado. \nO arquivo 'db_config-sample.sh' possui instruções de como configurar"
    exit 1
fi
source $DB_CONFIG


case $1 in
	sample)
        echo "[ INSTALANDO DADOS DE EXEMPLO em localhost ]"
        echo "Recriando banco de dados...";
        mysql --user $dev_db_user -h$dev_host -p$dev_db_pass < $SQL_ROOT'sisdf_create.sql'

        echo "Reimportando dados de exemplo..."
        mysql --user $dev_db_user -h$dev_host -p$dev_db_pass < $SQL_ROOT'sample_data/batch_insert_sample.sql'
        
		;;

	sandbox)
        echo "[ IMPORTANDO BASE DE PRODUÇÃO em localhost]"
        echo "Realizando dump de: $remote_host de $remote_db";

        mysqldump -h$remote_host --user $remote_user -p$remote_pass $remote_db > $SQL_ROOT'/sisdf_replicate.sql'

        echo "Reimportando dados de produção localmente"

        mysql -h$dev_host --user $dev_db_user -p$dev_db_pass $dev_database < $SQL_ROOT'/sisdf_replicate.sql'

        # Seta todas as senhas para 123
        echo "Resetando senhas para testes"
        mysql -u$dev_db_user -p$dev_db_pass -D $dev_database < $SQL_ROOT'/sample_data/reset_passwords.sql'

	    ;;
	*)
		echo "Ambientes permitidos: setup.sh { sample | sandbox }"
        exit 1
		;;
esac




