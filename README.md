## About Project

Projects purpose is to search among partners either by status, country and state or by text in company name or address (each of them will result indipendent search results).

## Running the Project

Project is written in Laravel and therefore Laravel standart steps are required to run project:
Clone the project:
```
git clone https://github.com/idzidzishvili/netwrix.git
```

Navigate to downloaded folder
```
cd netwrix
```

Install composer
```
composer install
```

Generate .env file from .env.example and edit database name in it
```
cp .env.example .env
```

Generate key in .env file 
```
php artisan key:generate
```

Generate database tables and seed data in
```
php artisan migrate
php artisan db:seed
```

Install npm and build assets
```
npm install
npm run build
```

Finally run project
```
php artisan serve
```

This will start new php development server usually to the following address: [http://127.0.0.1:8000/](http://127.0.0.1:8000)
