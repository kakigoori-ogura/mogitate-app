#「もぎたて」商品管理アプリ

##環境構築  
cd mogitate-app  
docker compose up -d  
docker compose exec app composer install  
cp .env.example .env  
php artisan key:generate  
docker compose exec app php artisan migrate  
docker compose exec app php artisan db:seed

##使用技術

- PHP 8.5.3
- Laravel 12.56.0
- MySQL 8.4.8
- Docker 28.3.2
- Docker Compose

##ER図

## URL

- 開発環境：http://localhost
  http://localhost/items/create
