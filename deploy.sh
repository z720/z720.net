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
echo "------- Update running dependencies"
php composer install
echo "------- Clear template cache:"
rm -rvf ./cache/twig/??

cd $ORI
pwd