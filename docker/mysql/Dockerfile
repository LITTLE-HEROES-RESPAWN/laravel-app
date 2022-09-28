FROM mysql/mysql-server:8.0
LABEL maintainer="littleheroes <support@littleheroes.jp>"

ENV MYSQL_DATABASE=laravel_app \
    MYSQL_USER=littlehero \
    MYSQL_PASSWORD=secret \
    MYSQL_ROOT_PASSWORD=secret \
    TZ=Asia/Tokyo

COPY ./docker/mysql/my.cnf /etc/my.cnf
RUN chmod 644 /etc/my.cnf