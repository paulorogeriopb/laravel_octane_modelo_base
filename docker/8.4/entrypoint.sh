#!/bin/bash
set -e

# Cores
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m' # No Color

log() {
    echo -e "${GREEN}[ENTRYPOINT]${NC} $1"
}

warn() {
    echo -e "${YELLOW}[ENTRYPOINT]${NC} $1"
}

error() {
    echo -e "${RED}[ENTRYPOINT]${NC} $1"
}

# Ajustar permissões
log "Ajustando permissões..."
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache || true



# 🔥 Iniciar Octane somente se não tiver rodando
OCTANE_PORT=${APP_PORT:-8000}
if lsof -i :$OCTANE_PORT -sTCP:LISTEN >/dev/null 2>&1; then
    warn "Octane já está rodando na porta $OCTANE_PORT, não vou iniciar outro."
else
    log "Iniciando Laravel Octane na porta $OCTANE_PORT..."
    exec php artisan octane:start --server=swoole --host=0.0.0.0 --port=$OCTANE_PORT
fi
