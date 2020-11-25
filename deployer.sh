#!/bin/bash
project_name=$1
git=$2

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

if [ ${#git} -eq 0 ]
then
    echo "ERROR: Something is wrong with github please try again."
    exit 1
fi

if [ ${#project_name} -eq 0 ]
then
    echo "ERROR: Missing project name. Please try again and set some project name for example [my_project]."
    exit 1
fi

if [ ! -d "./projects" ]
then
    mkdir "./projects"
fi

if [ ! -d "./projects/$project_name" ]
then
    mkdir "./projects/$project_name"
fi

cd "./projects/$project_name"
git clone $git .

composer update
chmod -R 755 ./
chown -R www-data:www-data ./
php artisan october:env
generate_key
