#!/bin/bash
project_name=$1

if [ ! -d "./projects" ]
then
    mkdir "./projects"
fi

if [ ! -d "./projects/$project_name" ]
then
    mkdir "./projects/$project_name"
fi

cd "./projects/$project_name"
php artisan october:up
php artisan october:passwd
ln -s ../../dest/plugins ./
ln -s ../../dest/themes ./
php artisan october:up
php artisan cache:clear
