#!/bin/bash
touch storage/basicis.db &&
composer doctrine orm:schema-tool:create &&
echo APP_ENV=dev > .env &&
echo DB_DRIVER=pdo_sqlite > .env &&
echo DB_PATH=storage/basicis.db > .env &&
composer test
rm storage/basicis.db