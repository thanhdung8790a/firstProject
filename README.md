# firstProject
Dự án làm bằng Laravel version 5.6

Install xampp with php version >= 7.2

Clone the project repository by running the command below if you use SSH

git clone git@github.com:thanhdung8790a/firstProject.git

If you use https, use this instead

git clone https://github.com/thanhdung8790a/firstProject.git

After cloning,run:

composer install
composer update

Duplicate .env.example and rename it .env

Then run:

php artisan key:generate

And finally, start the application:

php artisan serve

and visit http://localhost:8000 to see the application in action.
