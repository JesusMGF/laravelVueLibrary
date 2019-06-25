Project about library in Laravel and VueJS

Steps to install:
1º.- Download files
2º.- npm install
3º.- php composer install
4º.- php artisan key:generate
5º - Create a database
6º.- Rename .env.example to .env and fill in with your database credentials (database name, username and password):
        + DB_DATABASE=
        + DB_USERNAME=
        + DB_PASSWORD=
7º.- php artisan passport:install
8º.- php artisan migrate --seed
9º.- npm run dev
10º.- Open localhost/project folder/public or create a virtualhost to this address

To test:
Email: toomla@example.com
Pass: 12345678