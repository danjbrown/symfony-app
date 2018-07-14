# Symfony 4 Starter Application

1. Clone the repository

2. Install the application
```
composer install
yarn install
```

3. Run Webpack Encore to recompile the CSS files when they are changed
```
 ./node_modules/.bin/encore dev --watch
```

4. Run the application
```
php -S 127.0.0.1:8000 -t public
```

5. Load the application in a browser at http://127.0.0.1:8000/index

# Managing CSS

The application comes with Webpack Encore installed via yarn install, but it could also be installed manually
```
yarn add @symfony/webpack-encore --dev
yarn add webpack-notifier --dev
```