FROM php:7.2-fpm

LABEL maintainer="lpf260@qq.com"

RUN sed -i "s/archive.ubuntu./mirrors.ustc.edu.cn/g" /etc/apt/sources.list 
RUN sed -i "s/deb.debian.org/mirrors.ustc.edu.cn/g" /etc/apt/sources.list 

RUN apt-get update \
  && apt-get install -y --no-install-recommends cron

RUN docker-php-ext-install pdo_mysql

COPY docker-entrypoint.sh /usr/local/bin/

RUN chmod +x /usr/local/bin/docker-entrypoint.sh

ENTRYPOINT [ "docker-entrypoint.sh" ]

CMD ["php-fpm"]