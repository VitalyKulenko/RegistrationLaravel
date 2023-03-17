# Readme

This application allows you to register participants in a virtual conference.
Below instructions for connecting a database, creating tables and an administrator in the database, updating the style and libraries, starting the project

## Install PHP, Composer, Node.js, NPM and MariaDB

- To check your PHP version, type "php -v" on the command line
- If PHP is not installed, type "sudo apt update" and then "sudo apt install php8.1 php8.1-cli php8.1-common php8.1-mbstring php8.1-gd php8.1-intl php8.1-xml php8.1-mysql php8.1-zip php8.1-xsl php8.1-curl" on the command line
- After installation, check your PHP version again

- To check your Composer version, type "composer -v" on the command line
- If Composer is not installed, type "sudo apt install curl git unzip", then "curl –sS https://getcomposer.org/installer | php" and then "sudo mv composer.phar /usr/local/bin/composer" on the command line
- After installation, check your Composer version again

- To check your Node.js version, type "node --version" on the command line
- To check your NPM version, type "npm --version" on the command line
- If Node.js and NPM is not installed, type "curl -fsSL https://deb.nodesource.com/setup_18.x | sudo -E bash -" and then "sudo apt install nodejs" on the command line
- After installation, check your Node.js and NPM version again

- To check your MariaDB version, type "mariadb --version" on the command line
- If MariaDB is not installed, type "sudo apt install mariadb-server" and then "sudo systemctl enable --now mariadb.service" on the command line
- After installation, check your MariaDB version again

## Install packages

- To install packages, type "npm i" on the command line

## Pull up dependencies

- To pull up dependencies, type "composer install" on the command line

## Connect to DB

- To connect to DB fill in the .env file fields "DB_CONNECTION", "DB_HOST", "DB_PORT", "DB_DATABASE", "DB_USERNAME", "DB_PASSWORD"

## Run DB

- To run DB, type "sudo /etc/init.d/mysql start" on the command line and enter password

## Run migrations

- To run migrations, type "php artisan migrate" on the command line
- To cancel a migration, type "php artisan migrate:rollback --step=5" on the command line, where --step=5 is the batch number. To undo all migrations, don't specify a step

## Run seeding

- To run seeding, type "php artisan db:seed" on the command line

## Update styles and libraries

- To update styles and libraries, type "npm run build" on the command line

## Create a symbolic link from public/storage to storage/app/public

- To create a symbolic link, type "php artisan storage:link" on the command line

## Run project

- To run the project, type "php artisan serve" on the command line