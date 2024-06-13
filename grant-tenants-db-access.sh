#!/usr/bin/env bash

mysql --user=root --password="$MYSQL_ROOT_PASSWORD" <<-EOSQL
    SELECT '[TENANT_ACCESS] Granting tenants databases privileges to $MYSQL_USER user.' AS '';
    GRANT ALL PRIVILEGES on *.* to '$MYSQL_USER'@'%';
    FLUSH PRIVILEGES;
EOSQL
