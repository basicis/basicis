#!/bin/bash
touch .env.test &&
echo APP_ENV=dev > .env.test &&
echo DB_DRIVER=pdo_sqlite >> .env.test &&
echo DB_PATH=storage/basicis.db >> .env.test &&

touch storage/basicis.db &&
vendor/bin/doctrine orm:schema-tool:create &&
vendor/bin/phpcs --standard=PSR2 src/ test/ &&
vendor/bin/phpunit --do-not-cache-result --no-logging test &&

rm .env.test &&
rm storage/basicis.db