<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

How to Install the Project
* Download a zip of the project, unzip it into your LaravelProjects folder or wherever you run your homestead environment.
* Go into your 'Homestead.yaml' file and add the following - map: alpha.films to: /home/vagrant/WAF/MyLaravelProjects/AlphaFilms/public
* In the database part of the yaml file add - reels_and_meals
* Access your hosts file by running notepad as admin, click on open file and navigate to C:\Users\clare\WAF\MyLaravelProjects\AlphaFilms\app\Http\Controllers\Admin
* While in the hosts file add the url of your site there For example: 127.0.0.1 alpha.films
* Copy the 'example.env' and name it '.env'
* Open the .env file and set the DB_DATABASE to the database you created in the Homestead.yaml file and set the username and password to the necesssary credentials.
Then refresh the Homestead environment with vagrant reload --provision. Go into the Homestead environment using vagrant up and vagrant ssh. Once in the Homestead environment, cd into your application folder and run these following commands:
composer install
npm install After that migrate and seed the database using php artisan migrate --seed Once that done initialise, add and commit to Git
- git init
- git add .
- git commit -am 'Initial commit
You may need to create the db for reels_and_meals manually in phpMyAdmin if it doesnt automatically generate
All depencies needed should be installed but if recombee is not working correctly run:
composer require recombee/php-api-client
