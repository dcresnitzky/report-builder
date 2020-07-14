#!/bin/bash

if [ ! -f ".env" ]; then
  cp .env-example .env
fi
if [ ! -f "src/.env" ]; then
  cp src/.env.example src/.env
fi

chmod -R 755 src/storage

docker-compose up -d

docker-compose exec -u laradock workspace composer install

docker-compose exec -u laradock workspace php artisan migrate:fresh --seed
