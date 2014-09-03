#!/bin/bash

echo $PWD
whoami
git pull
git status
git log --pretty=format:\'%h\' -n 1 > build
rm -rf cache/twig/??/