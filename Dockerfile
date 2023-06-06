FROM node:lts as node 
COPY . /var/app
WORKDIR /var/app
RUN npm i
RUN npm run production

FROM richarvey/nginx-php-fpm:3.1.5
COPY . .

# Image config
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel config
ENV APP_ENV production
ENV APP_DEBUG true
ENV LOG_CHANNEL stderr

RUN php artisan migrate:fresh

COPY --from=node /var/app/public/js /var/www/html/public/js
COPY --from=node /var/app/public/css /var/www/html/public/css

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

CMD ["/start.sh"]