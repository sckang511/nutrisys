<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## NutriSYS

## Contributing

Thank you for contributing to Nutrisys project. Please take note of the following:
1. Please make sure your PHP version is 7 or higher. This project uses Laravel 5.5.0 LTS.
2. Please make sure that the database is as specified in config/database.php (especially charset and collation).
3. Please make commits as frequently as possible with detailed messages.
4. Please make sure the code is functional before you push your commits to the master.
5. Please check for permission on making changes of files that are not isolated.

## Set Up

1. Clone this project to your web server directory.
2. On the terminal, inside the project directory, run 'composer install' to get all the dependencies of this project
3. Copy to create file .env from .env.example. Please edit the database credentials to ones of your local database.
4. Change the first line of .env file to 'APP_NAME=Nutrisys'
5. Please name the database 'nutrisys' as a convention of this project.
6. On the terminal, inside the project directory, run 'php artisan migrate' to migrate the laravel database specifications to your local database.
7. Lastly, run 'php artisan key:generate' to generate a key for your project.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
