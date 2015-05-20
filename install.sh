#!/bin/bash

BRANCH=$1

pwd
git clone -b $BRANCH https://github.com/z720/z720.net.git
curl -sS https://getcomposer.org/installer | php
mv composer.phar composer

./deploy.sh
