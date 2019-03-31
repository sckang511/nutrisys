<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Nutrisys

This is a Laravel app that helps people track their daily nutrition.

## Contributing

Thank you for contributing to Nutrisys project. Please take note of the following:
1. Please make sure your PHP version is 7.1 or higher (ideally 7.3). This project uses Laravel 5.5.0 LTS.
2. Please make sure that the database is as specified in config/database.php (especially charset and collation).
3. Please make commits as frequently as possible with detailed messages.
4. Please make sure the code is functional before you push your commits to the master.
5. Please check for permission on making changes of files that are not isolated.

## Set Up

1. Clone this project to your web server directory.
2. On the terminal, inside the project directory, run 'composer install' to get all the dependencies of this project
3. Copy to create file .env from .env.example. Please make sure your database credentials are as specified.
4. On the terminal, inside the project directory, run 'php artisan migrate' to migrate the laravel database specifications to your local database.  Make sure to create a database for it to migrate to (i.e. nutrisys)!
5. Lastly, run 'php artisan key:generate' to generate a key for your project.
6. You are now ready to contribute!


## Testing

* Laravel provides a tool called tinker that allows easy interaction with the database.
* In order to create a large amount of mock data into the database you can use factory in tinker.

1. From your project, run 'php artisan tinker'
2. Create factory using the following syntax: factory(App\[Model]::class, [number])->create();
3. For example, to create 20 data entries of new users: factory(App\User::class, 20)->create();
4. I have created the models so that it creates entries with random attributes while obeying foreign key constraints.
5. You can see/modify the implementation of factories in database/factories/ 


## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
