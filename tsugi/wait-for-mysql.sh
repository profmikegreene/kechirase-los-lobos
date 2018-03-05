#!/bin/bash

echo "Waiting for mysql"

until mysql -h${MYSQL_HOST} -P3306 -u${MYSQL_USER} --password=${MYSQL_PASSWORD} &> /dev/null
do
  printf "."
  sleep 1
done

echo -e "\nmysql ready"

echo "Running tsugi config"
php config.php

echo "Starting Apache"
docker-php-entrypoint