#!/bin/bash

echo $PWD
whoami
echo "------- Update site"
git pull
git status
echo "------- Flag version/revision"
git log --pretty=format:\'%h\' -n 1 > build
echo "------- Update runnning dependencies"
composer install
echo "------- Clear template cache:"
rm -rvf ../cache/twig/??
rm -rvf ./cache/twig/??