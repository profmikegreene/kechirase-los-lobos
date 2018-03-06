# kechirase-los-lobos
Sets up a dockerized learning technology ecosystem MVP by combining tsugi and the IMS Global rating app into a single docker-compose deploy.

### for development purposes. use in production at your own risk

### Requirements
Local machine must have:
- Docker
- Docker Compose
- Git


### Install
`git clone https://github.com/profmikegreene/kechirase-los-lobos`  
`cd kechirase-los-lobos`  
`sh install.sh`  
Open http://localhost:7777/admin/upgrade.php to finish the tsugi database configuration  
Open http://localhost:7776/admin to finish the rating database configuration  



### dbtest.php
If something funky is going on, copy the /dbtest.php file into either tsugi/www or rating/www and access it to see if you're having db connection issues

### todo
* remove need to run extra composer command
    - should be able to that via `docker run --rm -v $(pwd):/app composer:latest install`
* delete config.sh from rating and tsugi ??
- [x] programmatically finish tsugi db config
* programmatically config a rating
* what to do with google login
* do we need ip addressing still?

### How I made it - for blogging later
1. git init
2. create .ignore folder and .gitignore
3. create docker-compose.yml
4. create the three dockerfiles with base images
5. pass docker-compose variables to tsugi/config.php
