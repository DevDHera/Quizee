# Quizee

Quizee is an Online Examination Platform developed on top of [TiNY PHP MVC](https://github.com/DevDHera/TiNY-PHP-MVC) framework.

Following are few unique features of **Quizee**.

- Support for multiple user roles.
- Easy to manage admin portal.
- Dynamic quiz creation for supervisors.
- Initiative quiz system for users.

## Getting Started

Getting started with `Quizee` is easy. Just clone the repo and work your magic :sparkles:.

1. Clone the repo.

```sh
git clone https://github.com/DevDHera/Quizee.git
```

2. Change the configs under `app/config/config.php`.

```php
<?php
    // DB Params
    define('DB_HOST', '__YOUR_HOST__');
    define('DB_PORT', '__YOUR_PORT__');
    define('DB_USER', '__YOUR_USER__');
    define('DB_PASS', '__YOUR_PASSWORD__');
    define('DB_NAME', '__YOUR_DB_NAME__');
    // App Root
    define('APPROOT', dirname(dirname(__FILE__)));
    // URL Root
    define('URLROOT', '__YOUR_URL_ROOT__');
    // Site Name
    define('SITENAME', '__YOUR_SITENAME__');
```

3. Change the Dir name under `public/.htaccess`

```sh
<IfModule mod_rewrite.c>
    Options -Multiviews
    RewriteEngine On
    RewriteBase /<YOUR_DIRECTORY>/public
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^(.+)$ index.php?url=$1 [QSA,L]
</IfModule>
```

### Prerequisites

- Apache Server
- PHP 5.6+
- MySQL

Install [XAMPP](https://www.apachefriends.org/index.html) for quickstart.

### Installing

Under documenting by the Author :scroll:.

## Running the tests

Under documenting by the Author :scroll:.

## Deployment

Under documenting by the Author :scroll:.

## Built With

- [PHP](https://www.php.net/) - The scripting language.
- [TiNY PHP MVC](https://github.com/DevDHera/TiNY-PHP-MVC) - The web framework.
- [Bootstrap](https://getbootstrap.com/) - The CSS framework.

## Contributing

Please read [CODE_OF_CONDUCT.md](https://github.com/DevDHera/Quizee/blob/master/CODE_OF_CONDUCT.md) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

Under documenting by the Author :scroll:.

## Authors

- **Devin Herath** - _Initial work_ - [DevD Hera](https://github.com/DevDHera)

See also the list of [contributors](https://github.com/DevDHera/Quizee/graphs/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE](https://github.com/DevDHera/Quizee/blob/master/LICENSE) file for details

## Acknowledgments

- [PurpleBooth](https://github.com/PurpleBooth) for this awesome README template :heart:
