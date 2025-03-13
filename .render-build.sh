#!/usr/bin/env bash
set -e  # Ferma l'esecuzione se un comando fallisce

# Installa le dipendenze PHP
echo "Running Composer install..."
composer install --no-dev --optimize-autoloader

# Esegui le migrazioni (se necessarie)
echo "Running Artisan Migrations..."
php artisan migrate --force
