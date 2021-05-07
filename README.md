# Eco calling - A web template for ecological awakenings

[![Laravel Continuous Integration](https://github.com/simtrami/eco-calling/actions/workflows/integrate.yml/badge.svg)](https://github.com/simtrami/eco-calling/actions/workflows/integrate.yml)
[![Laravel Continuous Deployment](https://github.com/simtrami/eco-calling/actions/workflows/deploy.yml/badge.svg)](https://github.com/simtrami/eco-calling/actions/workflows/deploy.yml)

[Demo website](https://eco-calling.simtrami.net)

## Development

This project uses the [Laravel](https://laravel.com/) framework. Please, refer to the documentation version 8.x for
contributing to the project.

### Environment

In order to test the code, you will need to comply with the
requirements [here](https://laravel.com/docs/8.x/installation#server-requirements). For setting up your environment
quickly, consider using [Valet](https://laravel.com/docs/8.x/valet)
if you are on MacOS, or [Homestead](https://laravel.com/docs/8.x/homestead) otherwise. You will only require
the [PHP CLI](https://www.php.net/downloads) (≥v7.3)
and the [Composer executable](https://getcomposer.org/download/).

You will also need NodeJS and Yarn installed in your development environment. If you chose to use Homestead, you have
nothing to do. Otherwise, install NodeJS according to your system's best practices and refer
to [Yarn's documentation](https://classic.yarnpkg.com/en/docs/install) to install it.

### Getting started

If you are new to using Laravel, consider taking the time to familiarize with the framework concepts. There are
plentiful of resources on the subjects, the most important being
the [official documentation](https://laravel.com/docs/8.x)
and the [Laracasts video guides](https://laracasts.com/topics/laravel).

Once you have cloned the repository, install the project's dependencies and compile the assets for your environment.

```bash
git clone https://github.com/simtrami/eco-calling
cd eco-calling
composer install
yarn install
yarn dev
```

The application's environment parameters must be set in the `.env` file in the project root directory. If you don't have
this file, just copy `.env.example` into `.env` and generate a new key.

```bash
php -r "file_exists('.env') || copy('.env.example', '.env');"
php artisan key:generate
```

The default parameters are set to work within a Homestead environment. You must at least change the database parameters
to suit your own environment. The [Laravel database documentation](https://laravel.com/docs/8.x/database#configuration)
gives out them most common configurations as examples.

Then, execute the database migrations and start the development server.

```bash
php artisan migrate
php artisan serve
```

### Working with assets

If you are going to edit CSS and Javascript files, keep in mind that you will have to compile them with Laravel Mix if
you want to see your changes. You can use the _watch_ script to automatically run compilation everytime you save a
modification.

```bash
mix watch
```

The browser sync feature is activated when in a development environment. It will refresh your page everytime you save
changes in the watched files. You can configure this behaviour in the `webpack.mix.js` file.

Learn more in the [Laravel documentation](https://laravel.com/docs/8.x/mix) and
the [Mix documentation](https://laravel-mix.com/docs/6.0).

### Testing

You can run tests using the `php artisan test` command or via the PHPUnit executable with `vendor/bin/phpunit`. They
will automatically use the settings defined in the `phpunit.xml` file located in the project root. If you are on
Homestead, make sure to run the tests inside the Vagrant box as you might encounter database connection issues
otherwise.

For anything regarding testing, please refer to
the [Laravel testing documentation](https://laravel.com/docs/8.x/testing).

## Production

I recommend using a PaaS such as [Clever Cloud](https://www.clever-cloud.com) or the
combo [Laravel Forge](https://forge.laravel.com) + any cloud provider, as configuring and maintaining a server is a
full-time job.

Here is an example of an update script for a Forge deployment

```shell
cd /home/forge/eco-calling.simtrami.net
git pull origin main
composer install --no-interaction --prefer-dist --optimize-autoloader
yarn install --non-interactive --pure-lockfile --force --production=false
yarn run production

( flock -w 10 9 || exit 1
    echo 'Restarting FPM...'; sudo -S service php-fpm reload ) 9>/tmp/fpmlock

if [ -f artisan ]; then
    php artisan migrate --force
fi
```
