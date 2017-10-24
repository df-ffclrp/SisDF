#!/bin/bash

source config.sh

echo "Realizando dump de: $remote_host de $remote_db";

mysqldump -h$remote_host --user $remote_user -p$remote_pass $remote_db > sisdf_replicate.sql

echo "Reimportando dados localmente"

mysql -h$dev_host --user $dbuser -p$dbpass $dev_database < sisdf_replicate.sql

# Sets all passwords to 123
echo "Resetando senhas para testes"
mysql -u$dbuser -p$dbpass -D $dev_database < reset_passwords.sql
