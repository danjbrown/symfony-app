Symfony 4 Start Application

Clone the repository

Install the application
```
composer install\
```

Managing CSS

Install Webpack Encore
```
yarn add @symfony/webpack-encore --dev
yarn add webpack-notifier --dev
```

Run Encore and recompile files when changed
```
 ./node_modules/.bin/encore dev --watch
```

Run the app
```
Run the app: php -S 127.0.0.1:8000 -t public
```

Load the app in a browser at http://127.0.0.1:8000/index