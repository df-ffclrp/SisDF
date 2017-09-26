#!/bin/bash

source config.sh

echo "Recriando banco de dados...";

mysql --user $dbuser -p$dbpass < ../sisdf_create.sql

echo "Reimportando dados de exemplo..."

mysql --user $dbuser -p$dbpass < batch_insert_sample.sql
