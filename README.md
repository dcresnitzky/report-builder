# Dinamyc Report Builder
Run it using bash script:

```shell script
chmod 744 run.sh 
./run.sh
```
The content of `run.sh` is:
    
```shell script
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
```


After ready, if you use PhpStorm you can run the report request at `./http/report.http`

Otherwise, curl it

```shell script
curl http://localhost:8000/report/1 -H "Accpet: application/json"
``` 