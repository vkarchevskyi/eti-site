#!/bin/bash
[ ! -d "vendor" ] && composer -n install
composer dump-autoload -o

php artisan migrate

php artisan optimize:clear
php artisan config:cache
php artisan optimize

npm install && npm run build
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
