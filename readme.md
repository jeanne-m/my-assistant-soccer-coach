## My Assistant Soccer Coach

My Assistant Soccer Coach is a web application built on Laravel. It automatically generates a practice plan that aligns with the age group and principle of play of your choice, all in just three clicks.

## Laravel PHP Framework

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Requirements

* Apache Web Server
* PHP version 5.6 or above
* MySQL

## Installation

1. Deploy the project code on your web server

   ```
   git clone https://github.com/anthemred/my-assistant-soccer-coach myasc
   ```

2. Install `composer` if necessary
3. Run `composer update` in the root of your project 
   
   Note: If you are running on a shared server, you may need to use `composer install` instead

4. Create a `.env` file based on the `.env.example` file in the root of your project
5. If you are running a development environment, set `APP_ENV` to `local` and `APP_DEBUG` to `true`
6. Run `php artisan key:generate`
7. You can create your own database tables or run `php artisan migrate`
8. To see what data should look like in the database run `php artisan db:seed`
9. Point your web server to serve from the public directory `(myasc/public)`

### License

My Assistant Soccer Coach is open-sourced software licensed under the [GNU Public License](http://opensource.org/licenses/gpl-license.php)
