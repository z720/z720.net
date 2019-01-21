#!/bin/bash
set -e
echo `date +%F_%H%M%S` > build
set D=`date +%F_%H%M%S`
docker build --build-arg "SOURCE_BRANCH=local-$D" -t z720.net:dev .
docker rm -f z720.net > /dev/null || echo "🤷‍‍"
docker run -d --name z720.net -v ${PWD}:/var/www -p 8080:80 z720.net:dev && echo "👍" || echo "😭"
