# ixionlegrandmonarque

## Requirements :

php 7.2
node.js
yarn
git
composer
docker ( or other database manager )

## install :
```
git clone https://github.com/programgames/ixionlegrandmonarque.git
docker-compose up
composer install
setup your .env file
yarn install
yarn encore dev
php bin/console doctrine:migrations:migrate
php bin:console server:start
```
If some problems appears : 

composer fix-recipes
