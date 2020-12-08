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

yes | cp -rf ../../dest/themes/. ./themes
yes | cp -f ../../dest/README.md ./
yes | cp -f ../../dest/.copy_gitignore ./.gitignore
chmod -R 755 ./
chown -R www-data:www-data ./
php artisan october:env

# Rainlab packages
php artisan plugin:install rainlab.user
php artisan plugin:install rainlab.builder
php artisan plugin:install rainlab.googleanalytics
php artisan plugin:install rainlab.location
php artisan plugin:install rainlab.pages
php artisan plugin:install rainlab.sitemap
php artisan plugin:install rainlab.translate
php artisan plugin:install rainlab.blog
# Other packages
php artisan plugin:install abwebdevelopers.imageresize
php artisan plugin:install anandpatel.seoextension
php artisan plugin:install benfreke.menumanager
php artisan plugin:install bennothommo.meta
php artisan plugin:install offline.gdpr
php artisan plugin:install offline.sitesearch
php artisan plugin:install panakour.translate
php artisan plugin:install pikanji.agent
# Powerseo has a bug
# php artisan plugin:install suresoftware.powerseo
php artisan plugin:install vojtasvoboda.twigextensions
php artisan plugin:install zakir.imagecropper

php artisan october:update
php artisan october:up

yes | cp -rf ../../dest/plugins/. ./plugins/

php artisan october:update
php artisan october:up
