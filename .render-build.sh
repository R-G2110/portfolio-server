#!/usr/bin/env bash

# Install dependencies
composer install --no-dev --optimize-autoloader

# Run migrations
php artisan migrate --force
