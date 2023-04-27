FROM php:8.1.18-cli-alpine3.17

RUN apk add --no-cache oniguruma-dev
# TODO node v18.15.0 npm 9.5.0
RUN apk add --update nodejs npm

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo_mysql

ENV WEB_DOCUMENT_ROOT /app/public
ENV APP_ENV production
ENV APP_DEBUG false
WORKDIR /app
COPY . .

RUN npm install
RUN npm run build

RUN composer install --no-interaction --optimize-autoloader --no-dev

COPY .env.example .env

RUN php artisan key:generate
RUN php artisan config:cache
RUN php artisan event:cache
RUN php artisan route:cache
RUN php artisan view:cache

EXPOSE 8001
CMD php artisan serve --host=0.0.0.0 --port=8001
