#megvalósítás - nulladik fázis - a környezet létrehozása

aliases
cdwww
composer create-project --prefer-dist laravel/laravel laravel-xml-2-persons
cd laravel-xml-2-persons

php -v
#PHP 8.2.0 (cli) (built: Dec  6 2022 15:31:23) (ZTS Visual C++ 2019 x64)

php artisan -V
#Laravel Framework 10.43.0

mysql -V
#version 	8.0.31

mysql -u root -p
create database laravel_xml_2_persons;
ctrl-c 

#(setting up .env database connection variables)

#creating empty repository on Github

#creating delopment.sh (this file) copied from command line

#creating initial README.md

git init
git add .
git status
git commit -m "initial commit - phase 0"
git branch -M main
git remote add origin https://github.com/gerzsony/laravel-xml-2-persons.git
git push -u origin main


# megvalósítás 1. fázis - xml létrehotása és berakása a Repo -ba

touch "persons.xml"
#edit it

git status
git add .
git status
git commit -m "persons.xml file added - first task in original description"
git push

# megvalósítás 2. fázis - adattáblák létehozása 

#remove unnecessary files from /database/migrations

composer remove laravel/sanctum
composer update

#create new tables
php artisan make:model Person --migration
php artisan make:model Log --migration

#edit migration data models
php artisan migrate:fresh

git status
git rm "database/migrations/2014_10_12_000000_create_users_table.php"
git rm "database/migrations/2014_10_12_100000_create_password_reset_tokens_table.php"
git rm "database/migrations/2019_08_19_000000_create_failed_jobs_table.php"
git rm "database/migrations/2019_12_14_000001_create_personal_access_tokens_table.php"

git add .
git status
git commit -m "database migration added - original description point 2, 4"
git push

#megvalósítás 3. fázis - xml feltöltéssel kapcsolatos teendők

mkdir "resources/views/persons"
mkdir "resources/views/logs"
touch "resources/views/persons/create.blade.php"
touch "resources/views/persons/index.blade.php"
touch "resources/views/logs/index.blade.php"
touch "resources/views/base.blade.php"

php artisan make:controller PersonController --resource
php artisan make:controller LogController --resource

#edit xml uploding related routes, views and controllers

git status
git add .
git commit -m "xml processor (controller, view, menu, blade modifications) added - original description point 3-6"
git push


#megvalósítás negyedik fázis - logs és persons rekordok megjelenítője, egyéb simogatások

touch "resources/views/persons/show.blade.php"

#edit some blades and controllers

git status
git add .
git commit -m "Logs and Persons views added - original description point 7. Contact data, project descriptions added. Create sql added."
git push