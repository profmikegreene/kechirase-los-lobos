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

echo "apache2-foreground"
# from https://github.com/docker-library/php/blob/fd8e15250a0c7667b161c34a25f7916b01f72367/7.2/stretch/apache/docker-php-entrypoint
# first arg is `-f` or `--some-option`
if [ "${1#-}" != "$1" ]; then
	set -- apache2-foreground "$@"
fi

exec "$@"