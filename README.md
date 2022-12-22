# Readme

This application allows you to register participants in a virtual conference.
Below instructions for connecting a database, creating tables and an administrator in the database, updating the style and libraries, starting the project

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

## Run project

- To run the project, type "php artisan serve" on the command line