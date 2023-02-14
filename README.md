# TRI7 Backend API

[Codeigniter 4 Rest API (CRUD) ](https://github.com/deepfaith/tri7-exam)

[Project Requirements](https://super7tech.com/web_developer_exam_sr/)

The architecture follows a modular design for scalability and managing large scale apps.

----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://codeigniter.com/user_guide/installation/index.html)

Clone the repository

    git clone https://github.com/deepfaith/tri7-exam.git

Switch to the repo folder

    cd tri7-exam-main

Install all the dependencies using composer

    composer update
    composer install

Modify the .env file

    .env

Configure Database, Environment, JWT Token (**Set the variables in .env**)

    #--------------------------------------------------------------------
    # DATABASE
    #--------------------------------------------------------------------
    
    database.default.hostname = db
    database.default.database = tri7
    database.default.username = root
    database.default.password = root
    database.default.DBDriver = MySQLi

    #--------------------------------------------------------------------
    # ENVIRONMENT
    #--------------------------------------------------------------------
    
    CI_ENVIRONMENT = development

    #--------------------------------------------------------------------
    # JWT
    #--------------------------------------------------------------------
    JWT_SECRET = 'tri7app'

Run the database migrations (**Set the database connection in .env before migrating**)

    php spark migrate

Run Database Seeder To Create admin user

    php spark db:seed EmployeeSeeder
    php spark db:seed UserSeeder

Start the local development server

    php spark serve

You can now access the server at http://localhost:8000


**TL;DR command list**

    git clone https://github.com/deepfaith/tri7-exam.git
    cd tri7-exam-main
    composer update
    composer install
    Configure .env variables

**Make sure you set the correct database connection information before running the migrations** [Environment variables](#Installation)

    php spark migrate

    php spark db:seed EmployeeSeeder
    php spark db:seed UserSeeder

    php spark serve

The api can be accessed at [http://localhost:8000/api](http://localhost:8000/api).

## API Specification
You can also import the postman collection used in this project thru this [link](http://localhost:8000/api).


> [Full API Spec](https://github.com/deepfaith/tri7-exam/tree/main/app/Libraries/Api)

----------

## Dependencies

- [firebase/php-jwt](https://github.com/firebase/php-jwt) - A simple library to encode and decode JSON Web Tokens (JWT) in PHP, conforming to RFC 7519.
