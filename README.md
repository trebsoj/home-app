
# home-app

## Development mode
sudo apt install php php-xml php-mysql composer

cp .env.exemple .env

php artisan key:generate

composer install
composer global require laravel/installer

./vendor/bin/sail up

## Production deployment
cp .env.exemple .env

docker-compose up -d

docker-compose exec app php artisan config:cache

docker-compose exec app php artisan route:cache

docker-compose exec app php artisan view:cache

docker-compose exec app php artisan cache:clear

docker-compose exec app composer install --optimize-autoloader --no-dev

docker-compose exec app php artisan key:generate

docker-compose exec app php artisan migrate


