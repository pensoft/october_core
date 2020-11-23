#!/bin/bash
project_name=${1:-myoctober}
tmp_dir=$(mktemp -d)
git=$2

if [ ! -d "./projects" ]
then
    mkdir "./projects"
fi

composer create-project october/october $tmp_dir

if [ ${#git} -gt 0 ]
then
    git clone $git "./projects/$project_name"
fi

cp -r "$tmp_dir/." "./projects/$project_name/"
rm -rf "$tmp_dir"
cd ./projects/$project_name/
php artisan october:install
rm -rf "./plugins/" "./themes/"
ln -s ../../dest/plugins ./
ln -s ../../dest/themes ./
yes | cp -f ../../dest/README.md ./
chmod -R 755 ./
chown -R www-data:www-data ./
php artisan october:env
php artisan october:update
php artisan october:up
