# Worpress Boilerplate #

This is default boilerplate for working on any wordpress project. The setup is built on docker to streamline setup of wordpress changes. The setup includes wordpress theme is from underscores.me which a basic starter theme for any wordpress. The environment of LAMP Stack is set by Docker. The selection of version of wordpress is made by wordpress docker image. Along with wordpress image, mysql image and phpMyAdmin are used aswell to prevent the hassel of deploying for developers

## Prerequesites ##

Below are the prerequisites required before you begin with the project setup.

### Docker ###
Follow installtion guide from here: https://docs.google.com/document/d/11l3rZKEvBy_Ll3w7Z9PlHaLNePVyTDI0lIRC9KtqLdM/edit?usp=sharing

### NodeJS ###
Windows and Mac: https://nodejs.org/en/download/

Ubuntu: https://nodejs.org/en/download/package-manager/#debian-and-ubuntu-based-linux-distributions-enterprise-linux-fedora-and-snap-packages

## Environment and Directory Configuration ##

The Enviroment of LAMP is created on docker and the repo access of wordpress is limited to theme, plugins and uploads. The wordpress core file are not included in repo as they should not be modified. Docker maps the wordpress locations to respective location in repo

```
./src = wp-content/themes/wordpress-boilerplate
./uploads = wp-content/uploads
./plugins = wp-content/plugins
```
All the Major development is performed in src folder where you theme files are kept. 

Uploads folder is ignored by repo as this folder contains assets that are uploaded by client. If image are not visible just get a copy of assets from production and paste it under uploads folder. 

The plugins folder is ignored by the repo as plugins would increase the bulk of repo and update of plugins would cause conflict in production. If the project requires a custom plugin to be made just follow instructions within plugins/custom-plugin/README.md

The database is saved in `db` folder. whenever docker is ran the database is automatically loaded into MySQL via `db` folder. To make the production database work in local environment dump-localize.sql is added.

## Setup ##

First Clone the repo
```
git clone https://grvsooryen@bitbucket.org/grvsooryen/wordpress-boilerplate.git
```
Start the server using docker
```
docker-compose up -d
```
Note: above command only runs wherever `docker-compose.yml` is located.

To shutdown the server use command below
```
docker-compose down
```

## Migrating a pre-exisiting project ##
Whenever we recieve a project that was already built by third party follow the instuctions below:

1. Make sure the Wordpress Core of that project is not modified. If it is, move the change to theme level before continuing further steps.
2. Copy the existing theme contents to src folder and update the folder name in docker-compose.yml: 
    ``` 
    ./src:/var/www/html/wp-content/themes/{{theme_folder_name}} 
    ```
3. Compare the production and Update .htaccess and wp-config.php as per requirement for development.
4. Check whether the source code of any plugins were modified. If they were, just include them in repository by pasting them in plugin folder and updating them in `.gitignore` file like below.
    ```
    !plugins/{plugin_name}/
    ```
5. Copy the contents of wp-content/uploads folder to uploads folder. `.gitignore` file update is not required.
6. Update the dump.sql with latest production dump.
7. Update the domain name in dump-localize.sql that needs to be replaced.
8. If any further files are required that are outside theme folder, just update the mapping inside `docker-compose.yml` file.

This document should be updated if any changes are made for boilerplate.