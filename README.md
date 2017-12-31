# kechirase-los-lobos
Combining tsugi and the IMS Global rating app into a single docker-compose deploy.

### for development purposes. use in production at your own risk

### what it is

Mini ecosystem

pull in rating and tsugi

create separate config for tsugi to avoid keys/passwords going to github

dockerize it all for easy setup/distribution

initialize rating
### Requirements
Local machine must have:
- Docker
- Docker Compose
- Git


### Install
`git clone https://github.com/profmikegreene/kechirase-los-lobos`  
`cd kechirase-los-lobos`  
`sh install.sh`  
Open http://localhost at the two ports you set in .env (7777 and 6666 by default)

shouldn't have to do this since it's being done on the container
`docker run --rm -v $(pwd)/app:/app composer:latest install`

### dbtest.php
If something funky is going on, copy the /dbtest.php file into either tsugi/www or rating/www and access it to see if you're having db connection issues

### todo
- [ ] remove need to run extra composer command
- [ ] delete config.sh from rating and tsugi ??
- [ ] programmatically finish tsugi db config
- [ ] programmatically config a rating

### How I made it
1. git init
2. create .ignore folder and .gitignore
3. create docker-compose.yml
4. create the three dockerfiles with base images
5. pass docker-compose variables to tsugi/config.php
