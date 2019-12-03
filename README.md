# RWA Laravel v6.0 2019

**Potrebno**
- Xampp ( Apace, MySql, PHP, Pearl)
- Composer
- NPM


##### Kreirati bazu "rwa" na localhost/phpmyadmin

#### Kreiranje projekta

`composer create-project --prefer-dist laravel/laravel rwa`

#### .env file

`DB_DATABASE=rwa // Ime vase baze`

`DB_USERNAME=root`

`DB_PASSWORD=`

#### Naredbe za kreiranje laravel AUTH

`composer require laravel/ui`

`php artisan ui vue --auth`

`php artisan migrate`

#### NPM

`npm install`


`npm run dev` // Dev za debug nacin rada
##### ili
`npm run watch` // automatski osvjezava promjene css/js

#### Migrcija za role

`php artisan make:migration add_role_to_users_table`

#### Middleware admin
https://laracasts.com/discuss/channels/general-discussion/create-middleware-to-auth-admin-users?page=0

`php artisan make:middleware IsAdmin`


##### Ogranicavanje rute
2 nacina

1. Zastita rute direktno
 
    routes/web.php

        Route::middleware('auth', 'admin')->get('/home', 'HomeController@index');

2. Zastita u kontroleru

    app/Http/Controllers/HomeController.php

        public function __construct() {
            $this->middleware(['auth', 'admin']);
        }
