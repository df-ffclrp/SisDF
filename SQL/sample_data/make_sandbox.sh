#!/bin/bash

source config.sh

echo "Realizando dump de: $remote_host de $remote_database";

mysqldump -h$remote_host --user $remote_user -p$remote_pass $remote_db > sisdf_replicate.sql

echo "Reimportando dados localmente"

mysql -h$dev_host --user $dbuser -p$dbpass $dev_database < sisdf_replicate.sql

# future implement
#mysql -u root -pmy_password -D DATABASENAME -e "UPDATE `database` SET `field1` = '1' WHERE `id` = 1111;" > output.txt
