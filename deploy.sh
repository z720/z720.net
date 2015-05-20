#!/bin/bash

ORI=`pwd`
DIR=$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )

cd $DIR
pwd
whoami
echo "------- Update site"
git pull
git status
echo "------- Flag version/revision"
git log --pretty=format:\'%h\' -n 1 > build
cat build
echo "------- Update running dependencies"
php composer install
echo "------- Clear template cache:"
rm -rvf ./cache/twig/??
echo "------- Restore location"
cd $ORI
pwd