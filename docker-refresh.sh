#!/bin/bash
echo `date` > build
docker build -t z720.net:dev .
docker rm -f z720.net > /dev/null || echo "🤷‍‍"
docker run -d --name z720.net -v ${PWD}:/var/www -p 8080:80 z720.net:dev && echo "👍" || echo "😭"
