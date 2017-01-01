# _Hair Salon_

#### By: _Zachary Hedgepeth_

## Description

_Web application designed for a hair salon to list, edit, and delete stylists and their clients_

## Setup/Installation Requirements

* _Navigate to the directory where you would like your project to reside_

* _Open your terminal and execute: git clone https://github.com/ZHedgepeth/Hair-Salon-PHP_

* _Navigate to the main directory of the project "Hair-Salon-PHP" and in the terminal execute this command: composer install_

* _Open MAMP and select preferences then set Hair-Salon-PHP as the Document Root_

* _Navigate to the "web" directory in Hair-Salon-PHP and execute this command in the terminal: php -S localhost:8000_

* _To view the site open your browser and type http://localhost:8000 to view the project_

## MySQL Commands:
* _CREATE DATABASE hair_salon;_
* _USE hair_salon;_
* _CREATE TABLE stylists (stylist_name VARCHAR (255), id serial PRIMARY KEY);_
* _CREATE TABLE clients (client_name VARCHAR (255), stylist_id INT, id serial PRIMARY KEY);_

## Known Bugs

_Timezone error_

## Support and Contact Details

_Contact me at: Zhedgepeth1124@gmail.com_

## Technologies Used

* _MAMP_
* _twig_
* _silex_
* _phpunit_

### License
_Epicodus License   Copyright (c) 2016 Zachary Hedgepeth_
