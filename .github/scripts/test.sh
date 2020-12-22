#!/bin/bash
touch storage/basicis.db &&
composer doctrine orm:schema-tool:create &&
echo APP_ENV=dev > .env.test &&
echo DB_DRIVER=pdo_sqlite > .env.test &&
echo DB_PATH=storage/basicis.db > .env.test &&
composer phpcs
composer test
rm storage/basicis.db