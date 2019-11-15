# RWA Laravel v6.0 2019

**Potrebno**
- Xampp ( Apace, MySql, PHP, Pearl)
- Composer
- NPM


##### Kreirati bazu "rwa" na localhost/phpmyadmin

#### Kreiranje projekta

`composer create-project --prefer-dist laravel/laravel rwa`

####.env file

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
#####ili
`npm run watch` // automatski osvjezava promjene css/js
