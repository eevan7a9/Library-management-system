# Library MS
This is Simple Library Management System. 
to enhance my knowledge in using the Laravel Framework

## Prerequisites


### COMPOSER
- Install PHP Composer

download Composer here:
>https://getcomposer.org

### NPM

- Install Node

Download Node here:
>https://nodejs.org


### XAMPP

- Install XAMPP
- Run XAMPP
- start MYSQL in the XAMPP Controll Panel

Download XAMPP here:
> https://www.apachefriends.org/download.html

## Installation

In the Project directory, perform the following commands

RUN
```
npm install
composer install
```

- create new file and name it ".env".

- copy the content from ".env.example" and paste it to the newly created ".env".
change the DB_DATABASE, DB_USERNAME, DB_PASSWORD to your setting.

example:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=library_ms
DB_USERNAME=root
DB_PASSWORD=
```
RUN
```
php artisan key:generate
composer update
php artisan migrate
php artisan serve
```
