#!/bin/bash

docker build -t z720.net . 
docker rm -f z720.net
docker run -d --name z720.net -v ${PWD}:/var/www -p 8080:80 z720.net