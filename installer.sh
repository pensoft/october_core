#!/bin/bash
project_name=${1:-myoctober}
tmp_dir=$(mktemp -d -t ci-XXXXXXXXXX)
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
rm -rf "./projects/$project_name/plugins/" "./projects/$project_name/themes/"
ln -s "dest/*" "./projects/$project_name/"
