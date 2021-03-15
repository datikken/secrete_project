#!/bin/bash

#To setup project locally: bash /shell/post_clone.sh --local
echo

if [[ ${1} -eq "--local" ]]
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan migrate
    php artisan storage:link
then
    COMPOSER_MEMORY_LIMIT=-1 composer-php7.4 install
    cp .env.prod .env
    php7.4 artisan key:generate
    php7.4 artisan migrate:fresh
    php7.4 artisan storage:link
    ln -s public public_html
fi

echo '*** Setup is done. To fireup project run: php artisan serve'
