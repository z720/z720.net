#!/bin/bash

if [ -z "$BRANCH" ]
then
  BRANCH="master"
fi

pwd
echo "------- Install $BRANCH"
git clone -b $BRANCH https://github.com/z720/z720.net.git .
echo "------- Install Composer"
curl -sS https://getcomposer.org/installer | php
mv composer.phar composer

echo "-------- Deploy"
./deploy.sh
