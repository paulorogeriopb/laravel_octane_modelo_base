#!/usr/bin/env bash
rm -f /var/www/html/storage/octane/*.lock
pkill -f "artisan octane:start" || true
exec php /var/www/html/artisan octane:start --server=swoole --host=0.0.0.0 --port=8000 --workers=4 --task-workers=2
