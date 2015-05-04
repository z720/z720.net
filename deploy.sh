#!/bin/bash

echo $PWD
whoami
git pull
git status
git log --pretty=format:\'%h\' -n 1 > build
echo "Clear template cache:"
rm -rvf ../cache/twig/??
rm -rvf ./cache/twig/??