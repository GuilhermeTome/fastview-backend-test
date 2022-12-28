# Fastview backend test

Builded with PHP 8.1 and Mysql 8 database

## Local requirements
- docker
- docker compose

## Run

- Clone the repository in your machine
```
git clone git@github.com:GuilhermeTome/fastview-backend-test.git && cd fastview-backend-test
```

- Create a .env file, you can edit EXTERNAL_PORTS to a better fit
```
cp .env.example .env
```

- Start application
```
docker compose up -d --build
```

- Install dependencies
```
docker exec fastview-backend-test-app-1 composer install
```

## Using application

You can access application on ```http://localhost:8080``` with
```
email: rhfast@fastview.com.br
password: password
```
or 
```
email: eduardoosteixeira@gmail.com
password: password
```

## phpMyAdmin

By default phpmyadmin will be on http://localhost:3000, you can use these credentials:
```
host: mysql
user: root
pass: root
```

## External libs used in project
```
"require": {
    "pecee/simple-router": "4.3.7.2",
    "vlucas/phpdotenv": "^5.5",
    "league/plates": "^3.4",
    "catfan/medoo": "^2.1"
},
```
