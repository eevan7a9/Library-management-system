# Library MS
This is Simple Library Management System. 
is a software used to manage all the books in a library.  This helps to keep the records of whole transactions of the books available in the library
a System that will manage books and users activity.

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

We generate secret key and update composer running the following commands in the terminal/cmd

``` 
php artisan key:generate 

composer update
```

We will add tables to the database we created
```
 php artisan migrate
```

We generate Users and Admin of the application
```
php artisan db:seed
```

## Running the Application

in the terminal/cmd:
``` 
php artisan serve
```
After seeding the database. with php artisan db:seed

you can Login as **Admin**.

email Address:
```
admin@gmail.com
```
password
```
adminpassword
```
You can change the password and email of the **Admin** after you login.
You can chane it at "Account Info"
