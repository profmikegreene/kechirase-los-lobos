# kechirase-los-lobos
Sets up a dockerized learning technology ecosystem MVP by combining tsugi and the IMS Global rating app into a single docker-compose deploy.

### for development purposes. use in production at your own risk

Once it's up and running you'll have the following containers
* tsugi - FROM php:7.2-apache - default [http://localhost:7777](http://localhost:7777)
* rating - FROM php:7.2-apache - default [http://localhost:7776](http://localhost:7776)
* mysql - FROM mysql:5.7
* phpmyadmin - FROM phpmyadmin:latest - default [http://localhost:7778](http://localhost:7778)

### Requirements
Local machine must have these packages installed:
* Docker
* Docker Compose
* Git

### Install
`git clone https://github.com/profmikegreene/kechirase-los-lobos`  
`cd kechirase-los-lobos`  
`sh install.sh`  

Open http://localhost:7776/admin to finish the rating database configuration  

### dbtest.php
If something funky is going on, copy the /dbtest.php file into either tsugi/www or rating/www and access it to see if you're having db connection issues

### How I made it - for blogging later
1. git init
2. create .ignore folder and .gitignore
3. create docker-compose.yml
4. create the three dockerfiles with base images
5. pass docker-compose variables to tsugi/config.php
