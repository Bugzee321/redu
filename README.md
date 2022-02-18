# Jumia Test
## Installation guide
- Clone the repo`https://github.com/Bugzee321/redu`
- Navigate to the project `cd redu/`
- Build Docker Image `docker-compose up --build -d`
- Install dependencies `docker-compose exec app composer install`
- Run Migrations `docker-compose exec app php artisan migrate`
- Open `http://localhost:8000/` on the browser and check the application
