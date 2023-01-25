# Openclassrooms-Project-06-Snowtricks

[![Codacy Badge](https://app.codacy.com/project/badge/Grade/1ccbfe99d0844347a24a4eabc1313dec)](https://www.codacy.com/gh/if-web-dev/Openclassrooms-Project-06-Snowtricks/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=if-web-dev/Openclassrooms-Project-06-Snowtricks&amp;utm_campaign=Badge_Grade)

We present project 6 of the PHP/Symfony application developer course. Develop from A to Z the SnowTricks community website. A website
which we can post Snowboard Tricks image, videos, tricks descriptions and comments.

## To start

This project was developed with PHP 8.1, it integrates the bootstrap, jquery, fontawesome libraries.

### Prerequisites

- A machine with at least PHP 8.1.
- Composer
- Symfony CLI

### Installation

- Clone or download the repository
- Duplicate and rename the `.env` file to `.env.local` and modify the necessary information and choose your database (`APP_ENV`, `APP_SECRET`, ...)
- Install the dependencies with `symfony composer install --optimize-autoloader`
- Run migrations with `symfony console doctrine:migrations:migrate --no-interaction`
- Add default datasets with `symfony console doctrine:fixtures:load --no-interaction`
- To send emails, configure your mailer dns in the `env.local` file

## Startup

- Locally run your database
- Run the app with `symfony serve -d`

## Made with

* [Bootstrap](https://getbootstrap.com/) - Framework CSS (front-end)
* [Fontawesome](https://fontawesome.com/icons) - Icon Libarary (front-end)
* [JQuery](https://jquery.com/) - Framework Js (front-end)
* [Composer](https://getcomposer.org/) - Dependancy manager
* [Visual Studio code](https://code.visualstudio.com/) - Code editor

## Author

* **Ishake FOUHAL** _alias_ [@IF-WEB-DEV](https://github.com/if-web-dev)


