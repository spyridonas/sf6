FROM registry.hub.docker.com/library/php:8.1-cli-alpine

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN wget https://github.com/symfony-cli/symfony-cli/releases/latest/download/symfony-cli_linux_amd64.tar.gz -O sf.tar.gz && \
    tar -zxf sf.tar.gz symfony && \
    mv symfony /usr/local/bin/symfony && \
    chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions @composer gd curl pdo pdo_mysql mbstring intl zip bcmath simplexml soap xdebug && \
    apk add --no-cache fish grep git openssh &&  \
    chown -R 1000:1000 /var/www

WORKDIR /var/www

CMD ["symfony","server:start","--port=80","--no-tls"]

EXPOSE 80 443
