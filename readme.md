Project about library in Laravel and VueJS

Steps to install:

<ul>
    <li>1º.- Download files</li>
    <li>2º.- npm install</li>
    <li>3º.- php composer install</li>
    <li>4º.- php artisan key:generate</li>
    <li>5º - Create a database</li>
    <li>6º.- Rename .env.example to .env and fill in with your database credentials (database name, username and password):</li>
        <ul>
            <li>+ DB_DATABASE=</li>
            <li>+ DB_USERNAME=</li>
            <li>+ DB_PASSWORD=</li>
        </ul>
    <li>7º.- php artisan passport:install</li>
    <li>8º.- php artisan migrate --seed</li>
    <li>9º.- npm run dev</li>
    <li>10º.- Open localhost/project folder/public or create a virtualhost to this address</li>
</ul>

To test:

<ul>
    <li>Email: toomla@example.com</li>
    <li>Pass: 12345678</li>
</ul>