## Minimal Viable Product

> Prototype application for Cheatsheet management platform.

## Commands

```bash
# install dependencies
composer install
npm install

# install MySQL server and create database named mvp_db
mysql -u root -p
> CREATE DATABASE mvp_db CHARACTER SET utf8 COLLATE utf8_general_ci;

# copy .env.example to .env and fill out the DB_USERNAME and DB_PASSWORD parameter values

# generate application key
php artisan key:generate

# migrate and seed database
php artisan migrate
php artisan db:seed

# run server
php artisan serve

# build and watch in development mode
npm run watch

# build in production mode
npm run prod

# deploy to heroku
heroku login
git add .
git commit -m "comment"
git push heroku master
```

### Production version URL
[https://cheatsheet-mvp.herokuapp.com/](https://cheatsheet-mvp.herokuapp.com/)

### Production version API
[https://cheatsheet-mvp.herokuapp.com/api](https://cheatsheet-mvp.herokuapp.com/api)
e.g. Get all cheatsheets: [https://cheatsheet-mvp.herokuapp.com/api/cheatsheets](https://cheatsheet-mvp.herokuapp.com/api/cheatsheets)
