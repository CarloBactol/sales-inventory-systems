# Project Setup

0. Clone the project from Github or download zip.file || https://github.com/CarloBactol/Sales-Inventory-System
1. Make sure you already have xampp install on your machine || https://www.apachefriends.org/download.html
2. Make sure you already have composer install on your machine || https://getcomposer.org/download/
3. Run composer install in the project root
4. Create Key || php artisan key:generate
5. Create a new MySQL database named inventory_system
6. Copy the .env.example file to a new file called .env
7. Fill out the corresponding database values in the .env file
8. Run php artisan migrate and seed in the project root
