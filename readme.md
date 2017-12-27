## Minimal Viable Product

> Prototype application for Cheatsheet management platform.

## Commands

```bash
# install dependencies
composer install
npm install

# migrate and seed database
php artisan migrate:install --seed

# build and watch in development mode
npm run app

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
