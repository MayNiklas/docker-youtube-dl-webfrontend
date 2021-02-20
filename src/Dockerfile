ARG ARCH=
FROM ${ARCH}php:7.2-apache

RUN apt-get update && apt-get -y upgrade && \
    apt-get install -y python3-pip ffmpeg 

RUN pip3 install youtube-dl

COPY html/ /var/www/html/

