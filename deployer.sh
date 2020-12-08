#!/bin/bash
project_name=$1
git=$2

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
