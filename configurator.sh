#!/bin/bash
project_name=$1

function generate_key {
    while IFS="" read -r p || [ -n "$p" ]
    do
    if printf '%s' "$p" | grep -Eq '^APP_KEY'; then
        key=$(php artisan key:generate --show)
        echo "APP_KEY=$key" >> .env.copy
        printf '%s\n' "APP_KEY generated and set"
    else
        #printf '%s\n' "$p"
        echo "$p" >> .env.copy
    fi

    done < .env

    cp .env.copy .env
    rm .env.copy
}

if [ ! -d "./projects" ]
then
    mkdir "./projects"
fi

if [ ! -d "./projects/$project_name" ]
then
    mkdir "./projects/$project_name"
fi

cd "./projects/$project_name"
generate_key
php artisan october:up
php artisan october:passwd
php artisan cache:clear
