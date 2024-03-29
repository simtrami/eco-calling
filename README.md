# Eco calling - A web template for ecological awakenings

[![Laravel Continuous Integration](https://github.com/simtrami/eco-calling/actions/workflows/integrate.yml/badge.svg)](https://github.com/simtrami/eco-calling/actions/workflows/integrate.yml)
[![Laravel Continuous Deployment](https://github.com/simtrami/eco-calling/actions/workflows/deploy.yml/badge.svg)](https://github.com/simtrami/eco-calling/actions/workflows/deploy.yml)

[Demo website](https://eco-calling.simtrami.net)  
[![Laravel Forge Site Deployment Status](https://img.shields.io/endpoint?url=https%3A%2F%2Fforge.laravel.com%2Fsite-badges%2F3be9c504-0b12-4892-82d3-112026a3a646%3Fdate%3D1%26commit%3D1&style=flat)](https://forge.laravel.com/servers/448774/sites/1306421)

## Development

This project uses the [Laravel 10](https://laravel.com/) framework with [TailwindCSS 3](https://tailwindcss.com) for styling.
Please, refer to the appropriate documentations for contributing to the project.

### Environment

In order to test the code, you will need to comply with the
requirements [here](https://laravel.com/docs/10.x/installation#server-requirements). For setting up your environment
quickly, consider using [Valet](https://laravel.com/docs/10.x/valet)
if you are on MacOS, or [Homestead](https://laravel.com/docs/10.x/homestead) otherwise. You will only require
the [PHP CLI](https://www.php.net/downloads) (≥v8.1)
and the [Composer executable](https://getcomposer.org/download/) (≥v2.2).

You will also need NodeJS and Yarn installed in your development environment. If you chose to use Homestead, you have
nothing to do. Otherwise, install NodeJS according to your system's best practices and refer
to [Yarn's documentation](https://classic.yarnpkg.com/en/docs/install) to install it.

### Getting started

If you are new to using Laravel, consider taking the time to familiarize with the framework concepts. There are
plentiful of resources on the subjects, the most important being
the [official documentation](https://laravel.com/docs/10.x)
and the [Laracasts video guides](https://laracasts.com/topics/laravel).

Once you have cloned the repository, install the project's dependencies and compile the assets for your environment.

```bash
git clone https://github.com/simtrami/eco-calling
cd eco-calling
composer install
yarn install
yarn run dev
```

The application's environment parameters must be set in the `.env` file in the project root directory. If you don't have
this file, just copy `.env.example` into `.env` and generate a new key.

```bash
php -r "file_exists('.env') || copy('.env.example', '.env');"
php artisan key:generate
```

The default parameters are set to work within a Homestead environment. You must at least change the database parameters
to suit your own environment. The [Laravel database documentation](https://laravel.com/docs/9.x/database#configuration)
gives out them most common configurations as examples.

Then, execute the database migrations and start the development server.

```bash
php artisan migrate
php artisan serve
```

### Working with assets

If you are going to edit CSS and Javascript files, keep in mind that you will have to compile them with [Laravel Vite](https://laravel.com/docs/10.x/vite) if
you want to see your changes. You can use the _vite_ script to automatically run compilation everytime you save a
modification.

```bash
vite
```

The browser sync feature is activated when in a development environment. It will refresh your page everytime you save
changes in the watched files.

Learn more in the [Laravel Vite documentation](https://laravel.com/docs/10.x/vite).

### Testing

You can run tests using the `php artisan test` command or via the PHPUnit executable with `vendor/bin/phpunit`. They
will automatically use the settings defined in the `phpunit.xml` file located in the project root. If you are on
Homestead, make sure to run the tests inside the Vagrant box as you might encounter database connection issues
otherwise.

For anything regarding testing, please refer to
the [Laravel testing documentation](https://laravel.com/docs/10.x/testing).

## Production

I recommend using a PaaS such as [Clever Cloud](https://www.clever-cloud.com) or the
combo [Laravel Forge](https://forge.laravel.com) + any cloud provider, as configuring and maintaining a server is a
full-time job.

### Laravel Forge

Here is an example of an update script for a Forge deployment

```shell
cd /home/forge/eco-calling.simtrami.net
git pull origin main
composer install --no-interaction --prefer-dist --optimize-autoloader
yarn install --non-interactive --pure-lockfile --force --production=false
yarn run build

( flock -w 10 9 || exit 1
    echo 'Restarting FPM...'; sudo -S service php-fpm reload ) 9>/tmp/fpmlock

if [ -f artisan ]; then
    php artisan migrate --force
fi
```

### Clever Cloud

You should first
read [Clever Cloud's documentation for Laravel Projects](https://www.clever-cloud.com/doc/deploy/application/php/tutorials/tutorial-laravel/)
. You will find below some tips and tricks I use on my own apps.

#### Compile front-end files during deployment

In order to build the css and js files during the app's deployment, add a _post_build.sh_ file in the project
(it's in a _clevercloud/_ directory for this example, but you can put it wherever you want).

> ⚠ Make sure to make it executable: `chmod +x post_build.sh`

```shell
#!/bin/bash
# Frontend build
yarn install --non-interactive --pure-lockfile --force --production=false && yarn run build
```

Then add the following variable in your app's environment.

```php
CC_POST_BUILD_HOOK="./clevercloud/post_build.sh"
```

#### Execute migrations before running

You may want your server to automatically execute migrations before running a new update. Then, do just as before, only
in another file called _pre_run.sh_
(it's in a _clevercloud/_ directory for this example, but you can put it wherever you want).

> ⚠ Make sure to make it executable: `chmod +x pre_run.sh`

```shell
#!/bin/bash
# Database migrations
php artisan migrate --force --no-ansi --no-interaction
```

Then add the following variable in your app's environment.

```dotenv
CC_PRE_RUN_HOOK="./clevercloud/pre_run.sh"
```

#### Automatically generate the sitemap

This app comes with the excellent [spatie/laravel-sitemap](https://github.com/spatie/laravel-sitemap) plugin. By
executing the artisan command `php artisan sitemap:generate`, a _sitemap.xml_ file will be generated into the _public/_
folder for the bots to better crawl your site.

In order to automatically execute it from the server after an update, add this variable in your app's environment.

```dotenv
CC_RUN_SUCCEEDED_HOOK="php artisan sitemap:generate"
```

#### Fix the security bug when submitting the form

If you want your site to use HTTPS, you will need to add Clever Cloud's reverse proxy IPs to the project's _
TrustProxies.php_ file. Otherwise, the links generated by the app will be in HTTP and your clients' browsers will block
them.

To do so, add in the `__construct` method to the **TrustProxies** class like so.

```php
public function __construct(Repository $config)
{
    if ($trustedProxies = $_SERVER['CC_REVERSE_PROXY_IPS'] ?? null) {
        $this->proxies = array_merge(['127.0.0.1'], explode(',', $trustedProxies));
    }
    parent::__construct($config);
}
```

