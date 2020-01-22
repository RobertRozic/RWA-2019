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


## Kreiranje modela

    php artisan make:model Car -mcr

-m = Migracija

-c = Controller

-r = Resource


## Deploy na studentski server

1. Logirati se na studenti.sum.ba posluzitelj

    Username: fsreXXYYYY
    Password: csgiditalYYYY 
    
    *( XX broj grupe, YYYY godina)
    
2. Unutar vasega foldera odraditi git clone projekta s githuba, npr.

        git clone https://github.com/RobertRozic-SUM/RWA-2019.git

3. Napraviti link sa public foldera projecta na vas public folder na posluzitelju

        ln -s /home/fsreXXYYYY/ime-projekta/public/  /home/fsreXXYYYY/public
        
    *Ukoliko naredba javi da file vec postoji, odradite:
    
        rm -rf ~/public
        
     Pa zatim prethodnu naredbu
            
4. Unutar foldera aplikacije pokrenuti

        composer install
   
   Za instalaciju composer paketa

5. Zatim podesiti .env file

    Primjer kopiramo u .env file

        cp .env.example .env
        
    Podesimo bazu
       
        DB_DATABASE=fsreXXYYYY
        DB_USERNAME=fsreXXYYYY
        DB_PASSWORD=csdigitalYYYY

    Generiramo key aplikacije
    
        php artisan key:generate

6. Podesimo permisije

        chgrp -R www-data storage bootstrap/cache
        chmod -R ug+rwx storage bootstrap/cache
    
7. Unutar routes/web.php podesiti root link

        URL::forceRootUrl('https://studenti.sum.ba/projekti/fsre/YYYY/gX');

8. U app/Providers/AppServiceProvider.php u boot funckiju dodati

         public function boot()
            {
        
                if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&  $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
                     \URL::forceScheme('https');
                }
            }
##### Aplikacija bi trebala biti dostupna na linku

https://studenti.sum.ba/projekti/fsre/YYYY/gX


## Tinker

    php artisan tinker
