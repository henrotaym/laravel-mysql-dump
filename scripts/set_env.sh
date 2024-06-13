#!/bin/bash

append() {
  echo $1=$2 >> .env
}

true > .env && \
append UID $(id -u) && \
append GID $(id -g) && \
append DB_CONNECTION mysql && \
append DB_HOST laravel-mysql-dump && \
append DB_PORT 3306 && \
append DB_DATABASE testing && \
append DB_PASSWORD password && \
append DB_USERNAME sail