# CAR MAKER
## _Back-End API Practical Test_


You will need to build a simple car maker website. The website will include a login page and a car maker page. The Car Maker page should be able to create and delete the car’s manufacturer, type, and color. Lastly, the Car Maker page should be able to create a car that can select an existing manufacturer, type, and color along with the car name.

## Instructions

1. Clone the repository ```https://github.com/ruelrule05/carmaker-be.git```
2. Copy example .env file ```cp .env.example .env```
3. Run command ```composer install```
4. Run command ```npm install && npm run dev```
5. Run command ```php artisan key:generate```
6. Update ```.env``` file
   - Database connection settings
   ```
   DB_CONNECTION=mysql
   DB_DATABASE=<db_name | car_maker>
   DB_USERNAME=<db_user | root>
   DB_PASSWORD=<db_password | [blank]>
   ```
7. Run command ```php artisan migrate:fresh```
8. Run command ```php artisan db:seed --class=UserSeeder```
9. Start the server by running the command ```php artisan serve```

Username and Password
```
Username: name@company.com
Password: 123Password_
```