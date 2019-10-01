
# Installation

### With Docker

Start this simple application, you need to do following steps:

- Run from the project root:

```
docker-compose build
docker-compose up -d
docker-compose run php composer install
```
- Open [http://localhost:8001/api/payment/transaction](http://localhost:8001/api/payment/transaction);

### Alternative

If you have PHP7.2, you can just run from project root:

```
composer install
php bin/console server:start 127.0.0.1:8001
```

- Open [http://localhost:8001](http://localhost:8001);

Also, you may use any other way to start the application you're used to (with Apache, nginx, etc).
