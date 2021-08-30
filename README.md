# Laravel Challenge

## Installation

Clone the repo: ``` git clone https://github.com/edmondzahiti/pharmacy_management.git ```

```cd``` into the folder generated

Run ```copy .env.example .env``` and after that update database credentials in ```.env``` file

Execute commands as below:

```sh 
composer install
php artisan key:generate
php artisan migrate --seed
php artisan serve
```
