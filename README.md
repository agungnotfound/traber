
## Prerequisite
- Composer
- PHP 7.3 or above
- MySQL 

## Setup Apps
- clone the repository 
```
    git clone https://github.com/agungnotfound/traber.git
```
- run composer install
```
    composer install
```
- copy template adminlte to public folder
```
    php artisan vendor:publish --tag=public --force
```
- run migration create database on your local
- copy file .env-example and rename to .env
- set config on .env like database name
- run migration database
```
    php artisan migrate
```
- run init database on seed class
```
    php artisan db:seed
```
- run apps
```
    php artisan serve
```
