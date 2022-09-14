
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
- run apps
```
    php artisan serve
```